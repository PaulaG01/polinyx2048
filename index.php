<?php include 'controller.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
    <title>2048</title>
</head>

<body>
<div class="help">
    <h1>Polinyx 2048 game v2.0</h1>
    <div class="help-wrapper">
        <div class="help-img">
            <img src="pict.jpg" alt="">
        </div>
        <div class="help-body">
            <hr>
            <div class="help-title">
                - HELP -
            </div>
            <p>use W A S D to play</p>
            <hr>
            <p>Upd2.0 reset <br>location reload</p>
        </div>
    </div>

</div>
    <div class="wrapper">
        <img src="pic.png" alt="" style="width: 400px; margin-bottom: 10px">
        <div class="map" id="map">
            <?php for($i=0; $i<4; $i++):
                    for($j=0; $j<4; $j++):?>
            <div class="map-item"><?=$_SESSION['map'][$i][$j]?></div>
                    <?php endfor; endfor?>
        </div>
        <button type="submit" id="start">Начать</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js.js"></script>
    
</body>

</html>