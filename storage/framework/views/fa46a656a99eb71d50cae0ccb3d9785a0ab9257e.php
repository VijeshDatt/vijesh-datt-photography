<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/animate.min.css">

    <!-- Styles -->
    <style>
    .body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f5ebe0;
      margin: 0;
    }

    .spinner {
      animation: rotator 1.4s linear infinite;
    }

    @keyframes  rotator {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(270deg);
      }
    }

    .path {
      stroke-dasharray: 187;
      stroke-dashoffset: 0;
      transform-origin: center;
      animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
    }

    @keyframes  colors {
      0% {
        stroke: #2E3192;
      }

      25% {
        stroke: #2E3192;
      }

      50% {
        stroke: #2E3192;
      }

      75% {
        stroke: #2E3192;
      }

      100% {
        stroke: #2E3192;
      }
    }

    @keyframes  dash {
      0% {
        stroke-dashoffset: 187;
      }

      50% {
        stroke-dashoffset: 46.75;
        transform: rotate(135deg);
      }

      100% {
        stroke-dashoffset: 187;
        transform: rotate(450deg);
      }
    }
  </style>
  </head>
  <body style="background-color:#f5ebe0;">
    <div id="app">
      <div class="body">
        <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
          <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
        </svg>
      </div>
    </div>

    <script src="<?php echo e(mix('/js/app.js')); ?>"></script>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\vijesh-datt-photography\resources\views/welcome.blade.php ENDPATH**/ ?>