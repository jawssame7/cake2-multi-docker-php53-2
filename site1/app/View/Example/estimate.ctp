<?php
App::import('vendors','tecnickcom/tcpdf');

// 各種設定は app/Vendor/tcpdf/config/tcpdf_config.php で定義
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
//$pdf->SetCreator('Your Company');
//$pdf->SetAuthor('Your Name');
//$pdf->SetTitle('Estimate');
//$pdf->SetSubject('Project Estimate');
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(true, 10);

// 日本語表示のために「小塚ゴシックPro M」を指定
$pdf->SetFont('kozgopromedium');

// ページを追加
$pdf->AddPage();

$html = <<< EOF
<style>
</style>
<div>
  <h2 style="font-weight: normal;">お 見 積 書</h2>
</div>
EOF;

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('estimate.pdf', 'I');
