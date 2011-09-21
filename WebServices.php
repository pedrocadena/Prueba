<?php error_reporting(0);    
define('YourIDE_Root',$_SERVER['DOCUMENT_ROOT']);  
include_once(YourIDE_Root.'/code/config.php');   

    function getcuponmodelo($vPK_PRODUCTO1,$vFL_ACTIVO2) {
    $TB_YC_PRODUCTOS = new TB_YC_PRODUCTOS();
    $TB_YC_PRODUCTOSArray = $TB_YC_PRODUCTOS->Find(" (PK_PRODUCTO='$vPK_PRODUCTO1'   and FL_ACTIVO='$vFL_ACTIVO2'  )");
    return $TB_YC_PRODUCTOSArray[0]->FL_COUPON_DESCRIPTION;
    }
    
    function getproductos($vprovider,$vsrcCurrency,$vdstCurrency) {
    $CurrencyServerWebService = new CurrencyServerWebService();
    $c = new getCurrencyValue();
    $c->provider=$vprovider;
$c->srcCurrency=$vsrcCurrency;
$c->dstCurrency=$vdstCurrency;

    return $CurrencyServerWebService->getCurrencyValue($c)->getCurrencyValueResult;
    }
    
    function getmenucupon($vnombre1) {
    $TB_ESTADOS = new TB_ESTADOS();
    $TB_ESTADOSArray = $TB_ESTADOS->Find(" FL_NAME like '$vnombre1%'  ");
    return $TB_ESTADOSArray;
    }
    function getproviders($vprovider) {
    $CurrencyServerWebService = new CurrencyServerWebService();
    $c = new getDataSet();
    $c->provider=$vprovider;

    return $CurrencyServerWebService->getDataSet($c)->getDataSetResult->any;
    }    
    
		function obtieneNombre($sitio=3,$pagina="USD") {
if ($pagina=="MXN") {
//Declara variable x
$x="3";
      switch ($x) {
         case "2":
         break;
         case "3":
         break;
         default:
         break;
      }
}
}
    
    
    require_once(YourIDE_Root.'/Shared/nusoap/nusoap.php');
    $server = new soap_server;
    $namespace = "http://tempuri.org";
    $server->wsdl->schemaTargetNamespace = $namespace; 
    $server->configureWSDL("WebServices");


$server->register('getcuponmodelo',
array('PK_PRODUCTO'=>'xsd:Int','FL_ACTIVO'=>'xsd:Boolean'),
array('return'=>'xsd:string'),
$namespace,
false,
'rpc',
'encoded',
'Este web service es de prueba');    
    


$server->register('getproductos',
array('provider'=>'xsd:String','srcCurrency'=>'xsd:String','dstCurrency'=>'xsd:String'),
array('return'=>'xsd:string'),
$namespace,
false,
'rpc',
'encoded',
'');    
    



$server->register('getmenucupon',
array('nombre'=>'xsd:String'),
array('return'=>'xsd:Array'),
$namespace,
false,
'rpc',
'encoded',
'Prueba 3');    
    


$server->register('getproviders',
array('provider'=>'xsd:String'),
array('return'=>'xsd:Dataset'),
$namespace,
false,
'rpc',
'encoded',
'Web service que trae el dataset de acuerdo al provider');    
    



$server->register('getobtieneNombre',
array('sitio'=>'xsd:Integer','pagina'=>'xsd:String'),
array(),
$namespace,
false,
'rpc',
'encoded',
'Prueba de función');    
    


    $POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : ''; 
    $server->service($POST_DATA);      
    exit();    
    ?>