<!DOCTYPE html>
<html lang="ja">
<head>
    <title>PDF</title>
    <meta charset="utf-8">
    <?php echo $this->Html->charset(); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <style>
        /*@font-face {*/
        /*    font-family: ipag;*/
        /*    font-style: normal;*/
        /*    font-weight: normal;*/
        /*    src: url("../fonts/ipaexg.ttf");*/
        /*}*/
        /*@font-face {*/
        /*    font-family: migmix;*/
        /*    font-style: normal;*/
        /*    font-weight: normal;*/
        /*    src: url("../fonts/migu-1p-regular.ttf") format("truetype");*/
        /*    !*src: url("../fonts/migu-1p-regular.ttf");*!*/
        /*}*/
        /*html {*/
        /*    font-family: 'sans-serif';*/
        /*}*/
    </style>
</head>
<body>
<?php echo $this->fetch('content'); ?>
</body>
</html>
