<!DOCTYPE html>
<html ng-app="wallet">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php if(isset($config['favicon'])): ?>
    <link rel="shortcut icon" href="<?=$config['favicon'];?>">
<?php endif;?>
    <title><?=$title;?></title>
<?php foreach(assets('HeadCss') as $css):?>
    <link href="<?=$css;?>" rel="stylesheet" type="text/css">
<?php endforeach;?>
<?php foreach(assets('HeadJs') as $js):?>
    <script src="<?=$js;?>"></script>
<?php endforeach;?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?=showMany(assets('headStyle'));?>
    <?=showMany(assets('headCode'));?>
</head>
<body>
    <?=$content;?>
<?php foreach(assets('FooterCss') as $css):?>
    <link href="<?=$css;?>" rel="stylesheet" type="text/css">
<?php endforeach;?>
<?php foreach(assets('FooterJs') as $js):?>
    <script src="<?=$js;?>"></script>
<?php endforeach;?>
</body>
</html>