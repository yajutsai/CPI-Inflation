<?php
// API key for BLS API
define('BLS_API_KEY', 'your_api_key_here');

function handleBlsError($seriesData) {
    if (isset($seriesData['error'])) {
        die('Error: ' . $seriesData['error']);
    }
}

function getDateRange() {
    $year = date('Y');
    $month = date('m');
    
    // 計算最新一個月的前一個月
    if ($month == 1) {
        $prev_year = $year - 1;
        $latest_month = 12;
    } else {
        $prev_year = $year;
        $latest_month = $month - 1;
    }
    
    // 計算前前一個月
    if ($latest_month == 1) {
        $prev_prev_year = $prev_year - 1;
        $prev_prev_month = 12;
    } else {
        $prev_prev_year = $prev_year;
        $prev_prev_month = $latest_month - 1;
    }
    
    return [
        'startdate' => '2000-01',  // 固定起始日期
        'enddate' => sprintf("%d-%02d", $prev_year, $latest_month),
        'latest_date' => sprintf("%d-%02d", $prev_year, $latest_month),
        'previous_date' => sprintf("%d-%02d", $prev_prev_year, $prev_prev_month)
    ];
}

function fetchBlsData($seriesIds, $startdate, $enddate, $apiKey = BLS_API_KEY) {
    $query = array(
        'seriesid' => $seriesIds,
        'startdate' => $startdate,
        'enddate' => $enddate,
        'registrationkey' => $apiKey,
        'catalog' => true
    );

    $payload = json_encode($query);

    $url = 'https://api.bls.gov/publicAPI/v2/timeseries/data/';
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n" .
                        "Content-Length: " . strlen($payload) . "\r\n",
            'content' => $payload,
            'ignore_errors' => true
        ),
        'ssl' => array(
            'verify_peer' => true,
            'verify_peer_name' => true
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === false) {
        $error = error_get_last();
        return ['error' => 'Unable to fetch data: ' . ($error['message'] ?? 'Unknown error')];
    }

    $data = json_decode($result, true);
    if (!is_array($data)) {
        return ['error' => 'Invalid JSON response'];
    }

    if ($data['status'] !== 'REQUEST_SUCCEEDED') {
        return ['error' => (isset($data['message'][0]) ? $data['message'][0] : 'Unknown API error')];
    }

    return $data['Results']['series'];
}
?> 