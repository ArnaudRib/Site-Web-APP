<!DOCTYPE html>
<html>
<?php include '../CreationSlider.php'; ?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="SliderFade.css"/>
    <title>Test Slider</title>
  </head>
  <body>
    <!--SLIDER FADE-->
    <?php $ListImg=[
      "/mysporteam/asset/images/chintoc.jpg",
      "/mysporteam/asset/images/sport.png",
      "/mysporteam/asset/images/sport2.jpg",
      "/mysporteam/asset/images/sport3.jpg"
      ]?>
    <?php CreationSlider($ListImg) ?>

    <script src="SliderFade.js"></script>

  </body>

</html>
