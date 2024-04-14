<?php
App::import('vendors','tecnickcom/tcpdf');

// 各種設定は app/Vendor/tcpdf/config/tcpdf_config.php で定義
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// 日本語表示のために「小塚ゴシックPro M」を指定
$pdf->SetFont('kozgopromedium');

// ページを追加
$pdf->AddPage();

$html = <<< EOF
<style>
.contents {
    text-align: center;
    font-size: 20px;
}
</style>
<div class="contents">PDFテスト</div>
EOF;

$pdf->writeHTML($html, false, false, false, false, 'L');

// ダウンロード
$pdf->Output('sample.pdf', 'D');
