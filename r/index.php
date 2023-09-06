<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../data/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
  <script src="../data/cdn.canvasjs.com_ga_canvasjs.min.js"></script>
    <style>
        .card {
            margin-bottom: 20px;
        }

        .header-image {
            max-width: 100%;
            height: auto;
        }

        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card.show-body .card-body {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h2 class="text-center mb-4">Perolehan Suara</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Paslon</h5>
                        <div class="row">
                            <!-- Candidate 1 -->
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="../data/img/c1.png" class="card-img-top" alt="Calon 3">
                                    <div class="card-body">
                                        <p>Samuel Mudya<br>Dendra Refra Pramesti</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Candidate 2 -->
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="../data/img/c2.png" class="card-img-top" alt="Calon 3">
                                    <div class="card-body">
                                  <p>Muhammad Beny<br>Mochamad Fateh Alif </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Candidate 3 -->
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="../data/img/c3.png" class="card-img-top" alt="Calon 3">
                                    <div class="card-body">
                                      <p>Nia Ramadhani<br>Christian Nouvendri Situmorang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Your PHP logic to fetch $row["jumlah_suara"] from your data source
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

                        // SQL query to fetch data
                        $sql = "SELECT SUM(jumlah_suara) AS total_suara FROM calon_osis";
                        $result = $conn->query($sql);

                        // Fetch total votes and format it as an array
                        $total_suara = 0;

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $total_suara = $row["total_suara"];
                        }


                        $conn->close();
                        $maxValue = 100;
                        $percentage = ($total_suara / $maxValue) * 100;

                        echo '<h3>Perolehan suara: ' . $total_suara . '/' . $maxValue . ' (' . round($percentage, 2) . '%)</h3>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Persentase suara</h5>
                        <div id="chartContainer" style="height: 434px; width: 100%;"></div>
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
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php
                                    // Your SQL connection code here
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
                                            $dataPoints[] = array(
                                                "label" => $row["nama_calon"],
                                                "y" => $row["jumlah_suara"]
                                            );
                                        }
                                    }

                                    $conn->close();

                                    // Encode the data as JSON
                                    echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
                                    ?>
                }]
            });
            chart.render();
        }
    </script>
</body>

</html>
