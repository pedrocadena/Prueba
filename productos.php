<?php ob_start();
    //error_reporting(0);
    session_start(); 
    define('YourIDE_Root',$_SERVER['DOCUMENT_ROOT']);
    require_once(YourIDE_Root."/Shared/mpage.php") ?>
<?php require_once("productos.Behind.php") ?>
<?php MPage::BeginBlock() ?>
<meta name="Keywords" content="<?php echo localize('titulo_de_la_pagina') ?>" />
<meta name="Description" content="<?php echo localize('titulo_de_la_pagina') ?>" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="/Shared/Themes/functions.js"></script>
<?php MPage::EndBlock("YourIDEHead") ?>
<?php MPage::BeginBlock() ?>
<?php MPage::EndBlock("YourIDETools") ?>
<?php MPage::Render(YourIDE_Root."/masters/.Master.php");
    ob_end_flush(); ?>
