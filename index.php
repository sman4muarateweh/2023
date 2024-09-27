<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'CustomFont';
            src: url('../data/font.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .popup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .popup-box {
            background-color: white;
            padding: 20px;
            border-radius: 40px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            max-width: 80%;
            opacity: 0;
            transform: scale(0.5);
            transition: opacity 0.5s ease, transform 0.5s ease;
            text-align: center;
        }

        .popup-box.show {
            opacity: 1;
            transform: scale(1);
        }

        .popup-box.fade-out {
            opacity: 0;
            transform: scale(0.5);
        }

        .popup-box a.btn {
            display: block;
            margin-top: 20px;
            border-radius: 40px;
        }
    </style>
</head>
<body>
  <div class="popup-container">
      <div class="popup-box" id="popup">
          <img src="data/img/logo.png" alt="Halo Image" style="max-width: 100%; height: auto;">
          <h3 style="color: black; font-family: 'CustomFont', sans-serif;">Selamat datang di pemilihan OSIS tahun 2024/2025</h3>
          <a href="javascript:void(0);" class="btn btn-primary" id="continueButton" style="font-family: 'CustomFont', sans-serif;">
              <h2 style="color: white; font-family: 'CustomFont', sans-serif; margin: 10px 0;">Klik disini untuk Lanjut</h2>
          </a>
      </div>
  </div>

<script src="x.js"></script>
</body>
</html>
