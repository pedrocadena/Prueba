
<?php
$ltlMenu7=new HTMLUL('ltlMenu7');
$ltlMenu7->Visible=true;
$ltlMenu7->CSSClass="MenuSimple";
$ltlMenu7->EnableViewState=false;
//Fuente de datos Modelo
if (6==6) {
  $i=0;
  foreach (ExpressionCollection::getmenucupon(null) as $c) {
    $liga = "/index.php";
    if ($liga=="") {
      $liga = $c->PK_ESTADO;
    }  
    $className='';
    if (!isset($_GET["cupon"])||$_GET["cupon"]=="") {
      if ($c->PK_ESTADO=="4") {
        $className='class="selected"';
      }              
    }else{
      if ($_GET["cupon"]==$c->PK_ESTADO) {
        $className='class="selected"';
      }
    }      
    $liMenu=new HTMLLI('liMenu7_'.$i);
    $liMenu->EnableViewState=false;
    $liMenu->innerHTML='<a href="'.$liga.'?cupon='.$c->PK_ESTADO.'&amp;familia='.ExpressionCollection::getfamilia().'" '.$className.' title="'.$c->FL_NAME.'"/><b>'.$c->FL_NAME.'</b></a>';
    $ltlMenu7->appendChild($liMenu);
    $i += 1;  
  }
}
//Fuente de datos WebServices
if (6==7) {
  $xml=ExpressionCollection::getmenucupon(null);
  $xml=$xml->children()->{0};
  $xml=$xml->children()->{0};
  $i=0;
  foreach ($xml->children() as $c) {
    $liga = "/index.php";
    if ($liga=="") {
      $liga = PK_ESTADO;
    }  
    $className='';
    if ($_GET["cupon"]==null||$_GET["cupon"]=="") {
      if ($c->PK_ESTADO=="4") {
        $className='class="selected"';
      }              
    }else{
      if ($_GET["cupon"]==$c->PK_ESTADO) {
        $className='class="selected"';
      }
    }    
    $liMenu=new HTMLLI('liMenu7_'.$i);
    $liMenu->EnableViewState=false;
    $liMenu->innerHTML='<a href="'.$liga.'?cupon='.$c->PK_ESTADO.'&amp;familia='.ExpressionCollection::getfamilia().'" '.$className.' title="'.FL_NAME.'"/><b>'.FL_NAME.'</b></a>';
    $ltlMenu7->appendChild($liMenu);
    $i += 1;
  }
}else{
}
?>
    