<?php


// PDFにする内容をHTMLで記述
$html = <<< EOM
<html>
  <head>
    <meta charset="utf-8">
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
      html{
        font-family: ipag;
      }
    </style>
  </head>
  <body>
    <div>this is dompdf sample!</div>
    <div>これはPDFのサンプルです！</div>
  </body>
</html>
EOM;

// PDFの設定～出力
$dompdf = new Dompdf\Dompdf();
$dompdf->loadHtml($html);
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => false));
$dompdf->setOptions($options);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("smaple.pdf", array("Attachment" => 0));
?>
