<?php $GLOBALS['ADODB_ASSOC_CASE'] = 2;      
include_once(YourIDE_Root.'/Shared/adodb/adodb.inc.php');
include_once(YourIDE_Root.'/Shared/adodb/adodb-active-recordx.inc.php');
require_once(YourIDE_Root."/Shared/dompdf_config.inc.php");
include_once(YourIDE_Root.'/code/CurrencyServerWebService.php');


global $db1;
    $db1 = NewADOConnection('mssql://sa:streamsql@72.3.227.172\SQLEXPRESS,1433/[CUPONES.SITE2]');
    $db1->debug=0;
  include_once(YourIDE_Root.'/code/Prueba_Model.php');
    
global $db3;
    $db3 = NewADOConnection('mysql://pedrocadena:lisrata@127.0.0.1/test');
    $db3->debug=0;
  include_once(YourIDE_Root.'/code/MySQL_Model.php');
    
global $db4;
    $db4 = NewADOConnection('oci8://sysman:lisrata@Lap-TIW7P_PCA/TEST');
    $db4->debug=0;
  include_once(YourIDE_Root.'/code/Oracle_Model.php');
    


define('LANGUAGE', substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    ?>