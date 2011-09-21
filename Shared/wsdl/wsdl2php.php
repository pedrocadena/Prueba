<?php
  require_once 'WSDLInterpreter.php';
  $myWSDLlocation = $_SERVER['argv'][1];
  $wsdlInterpreter = new WSDLInterpreter($myWSDLlocation);
  $wsdlInterpreter->savePHP($_SERVER['argv'][2]);
 ?>