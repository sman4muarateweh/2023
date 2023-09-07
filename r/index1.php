<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="8; url='" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../data/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
    <script src="../data/cdn.canvasjs.com_ga_canvasjs.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vote";

  
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    
        $sql = "SELECT SUM(jumlah_suara) AS total_suara FROM calon_osis";
        $result = $conn->query($sql);

        $total_suara = 0;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total_suara = $row["total_suara"];
        }

        $conn->close();
        $maxValue = 700;
        $percentage = ($total_suara / $maxValue) * 100;

        ?>
        <div class="text-center"> 
            <img src="data/img/logo.png" alt="Halo Image" style="max-width: 100%; height: auto;">
            <div>
                <div>
                    <div>
                        <div id="chartContainer" style="height: 390px; width: 100%;"></div><br>
                        <div class="text-center">
                            <?php
                            echo '<p>Perolehan ' . $total_suara . ' suara dari ' . $maxValue . ' pemilih (' . round($percentage, 2) . '%)</p>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                data: [{
                    type: "pie",
                    yValueFormatString: "#,##0 suara",
                    indexLabel: "{label} ({y}) - {percentage}%",
                    dataPoints: <?php

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "vote";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT nama_calon, jumlah_suara FROM calon_osis";
                        $result = $conn->query($sql);
                        $dataPoints = array();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $percentage = ($row["jumlah_suara"] / $total_suara) * 100;
                                $dataPoints[] = array(
                                    "label" => $row["nama_calon"],
                                    "y" => $row["jumlah_suara"],
                                    "percentage" => round($percentage, 2)
                                );
                            }
                        }

                        $conn->close();

            
                        echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
                        ?>
                }]
            });
            chart.render();
        }
    </script>
</body>
</html>
