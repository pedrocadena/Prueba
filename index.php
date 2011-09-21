<?php ob_start();
    //error_reporting(0);
    session_start(); 
    define('YourIDE_Root',$_SERVER['DOCUMENT_ROOT']);
    require_once(YourIDE_Root."/Shared/mpage.php") ?>
<?php require_once("index.Behind.php") ?>





<?php MPage::BeginBlock() ?>
<meta name="Keywords" content="<?php echo localize('titulo_de_la_pagina') ?>" />
<meta name="Description" content="<?php echo localize('titulo_de_la_pagina') ?>" />
<link href="/Shared/Themes/Default/Contenido.css" rel="stylesheet" type="text/css" media="all" />
<link href="/Shared/Themes/Default/ElementoHTML.css" rel="stylesheet" type="text/css" media="all" />
<link href="/Shared/Themes/Default/MenuSimple.css" rel="stylesheet" type="text/css" media="all" />
<link href="/styles/sitio.min.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="/Shared/Themes/functions.js"></script>
<script src="/scripts/funciones.min.js" type="text/javascript"></script>
<?php MPage::EndBlock("YourIDEHead") ?>
<?php MPage::BeginBlock() ?>
<?php MPage::EndBlock("YourIDETools") ?>
<?php MPage::BeginBlock() ?>
<?php include_once(YourIDE_Root.'/shared/controls/usrMenuSimple7.php');   ?>
<?php MPage::EndBlock("header") ?>
<?php MPage::BeginBlock() ?>
<?php include_once(YourIDE_Root.'/shared/controls/usrContenido6.php');   ?>
<?php MPage::EndBlock("izquierda") ?>
<?php MPage::BeginBlock() ?>
<div class="ElementoHTML">test</div>
<div class="ElementoHTML"><p>You recently requested that we resend you your SocketLabs Email On-Demand account login information.<span>&nbsp; </span></p>
<p>&nbsp;</p>
<p><b>Account Id: 2291</b></p>
<p><span style="font-size: 20px;">Username: pedrocadena</span></p>
<p>&nbsp;</p>
<span style="font-size: 11pt; font-family: calibri,sans-serif;">For security purposes we did not email your password, but you can reset your password by vising the following URL and entering a new password</span>
<input type="textbox" name="test" id="test" />
<input type="submit" value="Enviar" /></div>
<?php MPage::EndBlock("derecha") ?>
<?php MPage::BeginBlock() ?>
<?php MPage::EndBlock("banners") ?>
<?php MPage::BeginBlock() ?>
<?php MPage::EndBlock("buscar") ?>
<?php MPage::BeginBlock() ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4434']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php MPage::EndBlock("footer") ?>
<?php MPage::Render(YourIDE_Root."/masters/Home.Master.php");
    ob_end_flush(); ?>
