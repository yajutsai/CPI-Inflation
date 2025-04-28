<?php
require_once 'api/fetch_bls_data.php';
require_once 'ap_item_mapping.php';

// 獲取日期範圍
$dateRange = getDateRange();
$startdate = $dateRange['startdate'];
$enddate = $dateRange['enddate'];
$latestDate = $dateRange['latest_date'];
$previousDate = $dateRange['previous_date'];

// Generate series IDs from $item_code_name_mapping
$seriesIds = [];
$ap_item_mapping = [];
if (isset($item_code_name_mapping) && is_array($item_code_name_mapping)) {
    foreach ($item_code_name_mapping as $item_code => $description) {
        if (preg_match('/^[A-Z]{2}\d{4}$/', $item_code)) {
            $series_id = 'APU0000' . $item_code;
        } elseif (strlen($item_code) == 6 && ctype_digit($item_code)) {
            $series_id = 'APU0000' . $item_code;
        } elseif (strlen($item_code) == 5 && ctype_digit($item_code)) {
            $series_id = 'APU0000' . $item_code . '1';
        } elseif ($item_code === '7471A') {
            $series_id = 'APU00007471A';
        } else {
            continue;
        }
        $seriesIds[] = $series_id;
        $ap_item_mapping[$series_id] = $description ?: 'Unknown';
    }
} else {
    $ap_item_mapping = [
        'APU0000701111' => 'Flour, white, all purpose, per lb. (453.6 gm)',
        'APU0000702111' => 'Breakfast cereal',
        'APU0000703111' => 'Rice, pasta, cornmeal',
    ];
    $seriesIds = array_keys($ap_item_mapping);
}

// Split series IDs into chunks of 50 (BLS API limit)
$seriesChunks = array_chunk($seriesIds, 50);

// Initialize results array
$allResults = [];

// Fetch data for each chunk
$apiKey = '28795f7fc7ad4895b96d84706bf05785';
foreach ($seriesChunks as $chunk) {
    $seriesData = fetchBlsData($chunk, $startdate, $enddate, $apiKey);
    if (isset($seriesData['error'])) {
        die('Error: ' . $seriesData['error']);
    }
    $allResults = array_merge($allResults, $seriesData);
}

// Initialize arrays for increases and decreases
$increases = [];
$decreases = [];
$dataByDate = [];
foreach ($allResults as $series) {
    if (!empty($series['data'])) {
        foreach ($series['data'] as $datum) {
            $datum_date = $datum['year'] . '-' . substr($datum['period'], 1, 2);
            if ($datum_date >= $startdate && $datum_date <= $enddate) {
                $dataByDate[$datum_date][$series['seriesID']] = $datum['value'];
            }
        }
    }
}

// Filter ap_item_mapping to only include series with data in latestDate or previousDate
$filtered_ap_item_mapping = [];
foreach ($ap_item_mapping as $seriesID => $description) {
    if (isset($dataByDate[$latestDate][$seriesID]) || isset($dataByDate[$previousDate][$seriesID])) {
        $filtered_ap_item_mapping[$seriesID] = $description;
    }
}

// Compare the latest date with the previous date
if (isset($dataByDate[$latestDate]) && isset($dataByDate[$previousDate])) {
    foreach ($filtered_ap_item_mapping as $seriesID => $description) {
        $currentValue = $dataByDate[$latestDate][$seriesID] ?? null;
        $previousValue = $dataByDate[$previousDate][$seriesID] ?? null;
        if (is_numeric($currentValue) && is_numeric($previousValue)) {
            $difference = $currentValue - $previousValue;
            if ($difference > 0) {
                $increases[] = [
                    'seriesID' => $seriesID,
                    'description' => $description,
                    'difference' => $difference
                ];
            } elseif ($difference < 0) {
                $decreases[] = [
                    'seriesID' => $seriesID,
                    'description' => $description,
                    'difference' => $difference
                ];
            }
        }
    }
}

// Sort increases and decreases by absolute difference (descending)
usort($increases, function($a, $b) {
    return abs($b['difference']) <=> abs($a['difference']);
});
usort($decreases, function($a, $b) {
    return abs($b['difference']) <=> abs($a['difference']);
});
?>

<!DOCTYPE html>
<html>
<head>
    <title>CPI-Inflation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Consumer Price Index - Average Price Data</h1>
        <h1><?php echo $previousDate . ' - ' . $latestDate; ?></h1>
        
        <p>See which items are more expensive (red) or cheaper (green) to make smarter shopping choices.</p>
    </header>

    <section>
        <div class="legend">
            <span style="color: red;">🔴 Price Up</span> | <span style="color: green;">🟢 Price Down</span>
            <h4 style="color: #888;">🔍 Click to see historical data</h4>
        </div>
   
        <div class="trend-container">
            <div class="trend-block" style="background-color: #edd8d8;">
                <h3>Increases</h3>
                <?php if (empty($increases)): ?>
                    <p>No series with increased values.</p>
                <?php else: ?>
                    <?php foreach ($increases as $item): ?>
                        <div class="trend-item">
                            <a href="item_history.php?seriesID=<?php echo urlencode($item['seriesID']); ?>" target="_blank">
                                <?php echo htmlspecialchars($item['description'] ?? 'Unknown'); ?><br>       
                                <span class="latest-value">Price:  <?php echo htmlspecialchars($dataByDate[$latestDate][$item['seriesID']] ?? 'N/A'); ?></span>
                                <span class="trend-increase"><?php echo htmlspecialchars(sprintf('%+.3f', $item['difference'])); ?></span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="trend-block" style="background-color: #e3e8df;">
                <h3>Decreases</h3>
                <?php if (empty($decreases)): ?>
                    <p>No series with decreased values.</p>
                <?php else: ?>
                    <?php foreach ($decreases as $item): ?>
                        <div class="trend-item">
                            <a href="item_history.php?seriesID=<?php echo urlencode($item['seriesID']); ?>" target="_blank">
                                <?php echo htmlspecialchars($item['description'] ?? 'Unknown'); ?><br>
                                <span class="latest-value">Price: <?php echo htmlspecialchars($dataByDate[$latestDate][$item['seriesID']] ?? 'N/A'); ?></span>
                                <span class="trend-decrease"><?php echo htmlspecialchars(sprintf('%+.3f', $item['difference'])); ?></span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <footer>
        <h3>Data provided by the <a href="https://www.bls.gov" target="_blank">U.S. Bureau of Labor Statistics</a></h3>    
        <h3>Created by Hazel Tsai</h3>
        <h3>Follow me on
            <a class="social-icon" href="https://www.linkedin.com/in/hazel-tsai/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
            <a class="social-icon" href="https://github.com/Hazel-tsai" target="_blank"><i class="fa-brands fa-github"></i></a>
            <a class="social-icon" href="https://www.instagram.com/tsai_yaju_0918" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        </h3>
    </footer>
</body>
</html>