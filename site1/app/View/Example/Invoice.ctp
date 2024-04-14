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
<<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .table th {
            text-align: left;
            background-color: #f0f0f0;
        }

        .table td {
            text-align: right;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
        }
    </style>
<div class="container">
    <div class="header">
        <h1>見積書</h1>
    </div>

    <table class="table">
        <tr>
            <th>請求先名1</th>
            <td></td>
            <th>見積日付</th>
            <td>2023年04月28日</td>
        </tr>
        <tr>
            <th>請求先名2</th>
            <td></td>
            <th>見積番号</th>
            <td>12345</td>
        </tr>
        <tr>
            <th>自社名1</th>
            <td>株式会社○○</td>
            <th>担当</th>
            <td>山田 太郎</td>
        </tr>
        <tr>
            <th>住所1</th>
            <td>〒100-0001 東京都千代田区千代田1-1-1</td>
            <th></th>
            <td></td>
        </tr>
        <tr>
            <th>住所2</th>
            <td></td>
            <th></th>
            <td></td>
        </tr>
        <tr>
            <th>TEL</th>
            <td>03-1234-5678</td>
            <th>FAX</th>
            <td>03-1234-5679</td>
        </tr>
        <tr>
            <th colspan="4">件名: パソコン販売</th>
        </tr>
        <tr>
            <th colspan="2">商品名</th>
            <th>数量</th>
            <th>単価</th>
            <th>税抜金額</th>
        </tr>
        <tr>
            <td>1</td>
            <td>ノートパソコン</td>
            <td>1</td>
            <td>¥100,000</td>
            <td>¥100,000</td>
        </tr>
        <tr>
            <td>2</td>
            <td>プリンター</td>
            <td>1</td>
            <td>¥20,000</td>
            <td>¥20,000</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td>¥120,000</td>
        </tr>
        <tr>
            <td colspan="4">消費税</td>
            <td>¥9,600</td>
        </tr>
        <tr>
            <td colspan="4">合計</td>
            <td>¥129,600</td>
        </tr>
    </table>

    <div class="total">
        御見積合計金額(税込): ¥129,600
    </div>

    <div class="footer">
        よろしくお願いいたします。
    </div>
</div>
EOF;

$pdf->writeHTML($html, false, false, false, false, 'L');

// ダウンロード
$pdf->Output('sample.pdf', 'D');
?>


