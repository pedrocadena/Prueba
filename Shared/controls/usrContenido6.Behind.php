<?php
      
function ExportPDF6() {
  if (1==0) {
    $dompdf=GeneratePDFFromHTML(ExpressionCollection::getcuponmodelo(null,null));
    $dompdf->stream("Contenido principal.pdf");
    exit(0);
  }else{
    //Función de prueba
if ((ExpressionCollection::getfamilia()=="3"||ExpressionCollection::getcupon()=="3")&&ExpressionCollection::getcuponmodelo(null,null)!="3") {
//Declara variable x
$x="3";
//Asignar valor a x
       $v3=ExpressionCollection::getproviders(null);
        
  $v3=$v3->children()->{0};
  $v3=$v3->children()->{0};
  $v3=$v3->children();
      
        foreach ($v3 as  $objeto) {
            }
               echo $x;
}else{
   Funciones::obtieneNombre(null,"MXN");
      echo "MXN";
}

  }
}

    $MostrarControl6=true;
    $linkPrint6=new HTMLLink('linkPrint6');
    $linkPDF6=new HTMLLink('linkPDF6');
    $pnlContent6=new HTMLDiv('pnlContent6');
    $pnlTools6=new HTMLDiv('pnlTools6');
 
     $strNameShow='';
    if (true) {
      $strNameShow = "Contenido principal";
    }
    
    $pnlContent6->EnableViewState=false;
    $pnlContent6->innerHTML=ExpressionCollection::getcuponmodelo(null,null);
    
    $pnlTools6->Visible=true;
    $pnlTools6->CSSClass="ContenidoTools";
    $pnlTools6->EnableViewState=false;
    
    $linkPrint6->Title=localize('imprimir');
    $linkPrint6->Visible=true&&true;
    $linkPrint6->ImageUrl="/Shared/Themes/Default/img/Contenido/PrintIcon.png";
    $linkPrint6->NavigateUrl='javascript:void(0);';
    $linkPrint6->OnClientClick="writeToPopUp('".$strNameShow."',document.getElementsByTagName(&#39;head&#39;)[0].innerHTML+&#39;&lt;div class=&quot;Contenido&quot; style=&quot;padding:5px;&quot;>&#39;+document.getElementById(&#39;pnlContent6&#39;).innerHTML+&#39;&lt;/div>&lt;script type=&quot;text/javascript&quot;>print();&lt;/script>&#39;,700,500,0,0,0,0,0,1,0);";
    $linkPrint6->CSSClass="right";
    $linkPrint6->EnableViewState=false;
    
    $linkPDF6->Title=localize('pdf');
    $linkPDF6->Visible=true&&true;
    $linkPDF6->ImageUrl="/Shared/Themes/Default/img/Contenido/PDFIcon.png";    
    $linkPDF6->OnClick="ExportPDF6();";    
    $linkPDF6->CSSClass="right";
    $linkPDF6->EnableViewState=false;

    $linkPDF6->RaiseEvents();
    ?>