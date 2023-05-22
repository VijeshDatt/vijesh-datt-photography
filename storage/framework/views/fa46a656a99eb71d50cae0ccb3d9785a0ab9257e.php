<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#f5ebe0">
    
    
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/black/apple-touch-icon.png" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/black/favicon-32x32.png" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/black/favicon-16x16.png" media="(prefers-color-scheme: light)">
    
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/white/apple-touch-icon.png" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/white/favicon-32x32.png" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/white/favicon-16x16.png" media="(prefers-color-scheme: dark)">

    
    
    <meta property="og:url" content="/">
    <meta property="og:type" content="website">
    
    <meta property="og:image" content="/assets/images/seo/seo-image-2.jpg">
    <meta property="og:title" content="Vijesh Datt Photography">
    <meta property="og:description" content="Giving the world a small view of what Fiji and the Pacific has to offer.">

    

    <!-- Fonts -->
    
    

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
        stroke: #37251B;
      }

      25% {
        stroke: #37251B;
      }

      50% {
        stroke: #37251B;
      }

      75% {
        stroke: #37251B;
      }

      100% {
        stroke: #37251B;
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
  <script src="https://kit.fontawesome.com/e22a1372af.js" crossorigin="anonymous"></script>

  </head>
  <body style="background-color:#f5ebe0;">
    <div id="app">
      <div class="body">
        <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
          <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
        </svg>
      </div>
    </div>

    
    <script src="/js/app.js"></script>

  </body>
</html>
<?php /**PATH C:\xampp\htdocs\vijesh-datt-photography\resources\views/welcome.blade.php ENDPATH**/ ?>