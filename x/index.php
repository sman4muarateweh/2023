<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="18; url='" />
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
        $maxValue = 803;
        $percentage = ($total_suara / $maxValue) * 100;

        ?>
        <div class="text-center">
            <img src="../data/img/logo.png" alt="Halo Image" style="max-width: 50%; height: auto;">
              <h4 class="card-title">2023/2024</h4>


            <div class="row">
                <div class="col-md-8">
                    <div>
                        <div>
                            <div>
                                <div id="chartContainer" style="height: 404px; width: 100%;"></div><br>
                                <div class="text-center">
                                    <?php
                                    echo '<h2>Perolehan ' . $total_suara . ' suara dari ' . $maxValue . ' pemilih (' . round($percentage, 2) . '%)</h2>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Peringkat Berdasarkan perolehan Suara</h4>
                        </div>
                        <div class="card-body">
                          <ul class="list-group">
                <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("terjadi galat: " . $conn->connect_error);
                }

                $sql = "SELECT nama_calon, jumlah_suara, image_url FROM calon_osis ORDER BY jumlah_suara DESC";
                $result = $conn->query($sql);

                $rank = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';


                    echo '<span>' . $rank . '. ' . $row["nama_calon"] . '</span>';
                    echo '<img src="' . $row["image_url"] . '" alt="' . $row["jumlah_suara"] . '" style="max-width: 100%; max-height: 100px;">';
                    echo '</li>';
                    $rank++;
                }

                $conn->close();
                ?>
            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h3>

                </h3>
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


                        $conn = new mysqli($servername, $username, $password, $dbname);

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
