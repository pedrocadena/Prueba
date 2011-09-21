<form action="test.php" method="post">
<?php

function hola($text) {
	$GLOBALS['controlCollection']['img1']->Text=$text;
}

include 'Controls.php';
$img=new HTMLLink('img1');
if (!$GLOBALS['IsPostBack']) {
$img->ImageUrl="http://www.blogidiomas.com/files/uploads/datos-curiosos-sobre-los-idiomas-del-mundo-i.jpg";
$img->Title='hola mundo';
$img->NavigateUrl='http://www.google.com';
$img->OnClick="hola('hola a todos');";
$img->addStyle('border','solid 3px #f00');
}else{
$img->ImageUrl='http://2.bp.blogspot.com/_Fb0x6TGTbPs/SN1ggQdBqVI/AAAAAAAAB5A/pjCtPRIzeKQ/s400/el-mundo.png';
}
$img->RaiseEvents();
$img->Render();
RenderAll();

?>
<input type="submit" value="Enviar"/>
</form>