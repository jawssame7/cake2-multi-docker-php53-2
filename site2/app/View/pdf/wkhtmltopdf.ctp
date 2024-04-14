<html>
<head>
    <meta charset="utf-8">
<style>
    li {
        list-style:none;
        float:left;
        margin-left:10px;
    }
</style>
</head>
<body>
    <div>bbb</div>
<ul>
    <?php for ($i = 0; $i <= 100; $i++) : ?>
        <li>テスト</li>
    <?php endfor; ?>
</ul>
<br clear="all" />


<ul>
    <?php for ($i = 0; $i <= 1000; $i++) : ?>
        <li>テスト</li>
    <?php endfor; ?>
</ul>
</body>
</html>
