<?php
require_once 'api/fetch_bls_data.php';
require_once 'ap_item_mapping.php';

// Get series ID from URL parameter
$seriesID = isset($_GET['seriesID']) ? $_GET['seriesID'] : null;

if (!$seriesID) {
    die('No series ID provided');
}

// Generate ap_item_mapping from item_code_name_mapping
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
        $ap_item_mapping[$series_id] = $description ?: 'Unknown';
    }
}

// Get item description from mapping
$description = $ap_item_mapping[$seriesID] ?? 'Unknown Item';

// Fetch historical data
$apiKey = '28795f7fc7ad4895b96d84706bf05785';
$startdate = '2000-01';
$enddate = date('Y-m');
$seriesData = fetchBlsData([$seriesID], $startdate, $enddate, $apiKey);

if (isset($seriesData['error'])) {
    die('Error: ' . $seriesData['error']);
}

// Process data
$historicalData = [];
if (!empty($seriesData[0]['data'])) {
    foreach ($seriesData[0]['data'] as $datum) {
        $date = $datum['year'] . '-' . substr($datum['period'], 1, 2);
        $historicalData[$date] = $datum['value'];
    }
}

// Sort data by date (descending for table)
krsort($historicalData); // Sort by date descending for table

// Create separate arrays for chart (ascending order)
$chartLabels = array_keys($historicalData);
$chartValues = array_values($historicalData);
// Reverse for chart to show ascending order
$chartLabels = array_reverse($chartLabels);
$chartValues = array_reverse($chartValues);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Historical Data - <?php echo htmlspecialchars($description); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
</head>
<body>
    <header>
        <h1>Historical Data for<br><?php echo htmlspecialchars($description); ?></h1>
    </header>

    <!-- New Section for Line Chart -->
    <section class="chart-container">
        <canvas id="priceChart" width="100%"></canvas>
        <script>
            const ctx = document.getElementById('priceChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($chartLabels); ?>,
                    datasets: [{
                        label: 'Price (USD)',
                        data: <?php echo json_encode($chartValues); ?>,
                        borderColor: '#1E90FF', // Blue line
                        backgroundColor: 'rgba(30, 144, 255, 0.1)', // Light blue fill
                        borderWidth: 2,
                        pointRadius: 3,
                        pointBackgroundColor: '#1E90FF',
                        fill: false,
                        tension: 0.3 // Slight curve
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date (YYYY-MM)',
                                color: '#2F4F4F'
                            },
                            ticks: {
                                maxTicksLimit: 10, // Limit number of labels
                                color: '#2F4F4F'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Price (USD)',
                                color: '#2F4F4F'
                            },
                            ticks: {
                                color: '#2F4F4F'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#2F4F4F'
                            }
                        }
                    }
                }
            });
        </script>
    </section>

    <section class="table-container">
        <table>
            <tr>
                <th>Date (YYYY-MM)</th>
                <th>Price (USD)</th>
            </tr>
            <tbody>
                <?php if (empty($historicalData)): ?>
                    <tr><td colspan="2">No historical data available.</td></tr>
                <?php else: ?>
                    <?php foreach ($historicalData as $date => $value): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($date); ?></td>
                            <td><?php echo htmlspecialchars($value); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
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