
<script type="text/javascript">
  var data = {
    "種別":"請求",
    "番号":"20130930-01",
    "担当者":"山田 太郎",
    "宛先":{
      "名称":"株式会社○○ 御中",
      "郵便番号":"123-1234",
      "住所1":"東京都港具区六本木1-2-3",
      "住所2":"XXビル1F",
      "TEL":"03-1234-5678",
      "FAX":"03-1234-5678"
    },
    "明細":[
      {"品名":"なんかすごいやつ","数量":1,"単位":"個","単価":10000},
    ],
    "備考":"びこう"
  };
</script>
<div class="container">
    <h1 style="text-align:center;"><span class="category">請求|見積</span>書</h1>
    <div class="row">
        <div class="col-md-7 col-xs-7">
            <h2 id="name">株式会社 xx 御中</h2>
            〒<span id="zip">XXX-XXXXX</span><br/>
            <span id="address1">東京都XX区XXXX1-2-3</span><br/>
            <span id="address2">XXビル1F</span><br/>
            TEL:<span id="tel">03-1234-5678</span><br/>
            FAX:<span id="fax">00-0000-0000</span>
        </div>
        <div class="col-md-5 col-xs-5" style="text-align:right;">
            <span id="date">20xx年1月31日</span><br/>
            <span class="category">請求|見積</span>番号 <span id="code">YYYYMMDD-XX</span>
            <h3>xxxxx株式会社</h3>
            〒123-1234<br/>
            東京都港具区六本木1-11-2<br/>
            XXビル1F<br/>
            TEL: 03-1234-5678<br/>
            FAX: 03-1234-5678<br/>
            <br/>
            担当: <span id="person-in-charge">○○ ××</span>
        </div>
    </div>
    <div style="margin-top:2em;"></div>
    <div class="row">
        <div class="col-md-8 col-xs-8">
            <big>下記のとおり御<span class="category">請求|見積</span>申し上げます。</big>
        </div>
        <div class="col-md-4 col-xs-4" style="text-align:right;">
            単位: 円
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th style="width:4em;text-align:right;">項番</th><th>品名</th><th style="width:4em;text-align:right;">数量</th><th style="width:4em;">単位</th><th style="text-align:right;">単価</th><th style="text-align:right;">金額</th>
        </tr>
        </thead>
        <tbody>
        <tr class="row-template">
            <td class="num" style="text-align:right;">N</td><td class="name">PRODUCT NAME</td><td class="qty" style="text-align:right;">NN</td><td class="unit">人日</td><td class="unit-price" style="text-align:right;">XX,000</td><td class="price" style="text-align:right;">XX,000</td>
        </tr>
        <tr>
            <td colspan="3" rowspan="3"><div class="bank"><h4>振込先</h4>三菱東京UFJ銀行 xxxxx支店 普通 123456789 xxxxx(カ<br/>又は<br/>ネット銀行 ひだまり支店 普通 98765454 xxxxx(カ </div><h4>備考</h4></td><td colspan="2">小計</td><td class="minor-total" style="text-align:right;">XX,000</td>
        </tr>
        <tr>
            <td colspan="2">消費税(<span class="tax-rate">5</span>%)</td><td class="vat" style="text-align:right;">XX,000</td>
        </tr>
        <tr>
            <td colspan="2">合計</td><td style="text-align:right;"><big><strong><span class="grand-total">XX,000</span></strong></big></td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
  function addFigure(value) {
    var num = new String(value).replace(/,/g, "");
    while(num != (num = num.replace(/^(-?\d+)(\d{3})/, "$1,$2")));
    return num;
  }

  $(document).ready(function() {
    if (data["種別"] != "請求") { $(".bank").hide(); }
    $("<title>" + data["種別"] + data["番号"] + "</title>").prependTo("head");
    var year = parseInt(data["番号"].substr(0,4));
    var month = parseInt(data["番号"].substr(4,2));
    var day = parseInt(data["番号"].substr(6,2));
    $("span.category").text(data["種別"]);
    // $("#date").text(year+"年"+month+"月"+day+"日");
    $("#code").text(data["番号"]);
    $("#name").text(data["宛先"]["名称"]);
    $("#zip").text(data["宛先"]["郵便番号"]);
    $("#address1").text(data["宛先"]["住所1"]);
    $("#address2").text(data["宛先"]["住所2"]);
    $("#tel").text(data["宛先"]["TEL"]);
    $("#fax").text(data["宛先"]["FAX"]);
    $("#person-in-charge").text(data["担当者"]);

    var rows = Array();
    var total = 0;
    $.each(data["明細"], function(i, value) {
      var row = $("tr.row-template").clone(false);
      row.find("td.num").text("" + (i + 1));
      row.find("td.name").text(value["品名"]);
      row.find("td.qty").text(value["数量"]);
      row.find("td.unit").text(value["単位"]);
      row.find("td.unit-price").text(addFigure(value["単価"]));
      var price = ~~(value["数量"] * value["単価"]);
      row.find("td.price").text(addFigure(price));
      total += price;
      rows.push(row);
    });
    $("tr.row-template").remove();
    $("tbody").prepend(rows);
    $("td.minor-total").text(addFigure(total));
    var vat = ~~(total * 5 / 100);
    $("td.vat").text(addFigure(vat));
    $("span.grand-total").text(addFigure(total + vat));
  });
</script>
