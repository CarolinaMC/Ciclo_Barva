
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css('stylePdf.css', ['fullBase' => true]) ?>
</head>
<body>
    <div id="container">
        <div class="logo"></div>
        <div id="content">
            <?= $this->fetch('content') ?>

        </div>
    </div>
</body>
</html>