<html>
<head>
    <title>PDF</title>
    <?php
        echo $this->fetch('fonts');
        ?>
    <style>
        @font-face {
            font-family: ipag;
            font-style: normal;
            font-weight: normal;
            src: url("../fonts/ipaexg.ttf");
        }
        @font-face {
            font-family: migmix;
            font-style: normal;
            font-weight: normal;
            src: url("../fonts/migu-1p-regular.ttf") format("truetype");
            /*src: url("../fonts/migu-1p-regular.ttf");*/
        }
        html {
            font-family: migmix;
        }
    </style>
</head>
<body>
    <h1>見積書</h1>
    <p>見積書の内容</p>
</body>
</html>
