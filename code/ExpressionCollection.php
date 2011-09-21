<?php   
class ExpressionCollection {

  public static function getfamilia() {
    if (isset($_GET["familia"])) {
      return $_GET["familia"];
    }else{
      return "1";
    }
  }
  public static function getlinea() {
    if (isset($_GET["linea"])) {
      return $_GET["linea"];
    }else{
      return "1";
    }
  }
  public static function getsublinea() {
    if (isset($_GET["sublinea"])) {
      return $_GET["sublinea"];
    }else{
      return "";
    }
  }
  public static function getproyecto() {
    if (isset($_SESSION["proyecto"])) {
      return $_SESSION["proyecto"];
    }else{
      return "lead";
    }
  }
  public static function getusuario() {
    if (isset($_COOKIE["usuario"])) {
      return $_COOKIE["usuario"];
    }else{
      return "hola";
    }
  }

    public static function getcuponmodelo($v1,$v2) {
    if ($v1==null) {
    $v1=ExpressionCollection::getcupon();
    }
if ($v2==null) {
    $v2=(int)"false";
    }

    $TB_YC_PRODUCTOS = new TB_YC_PRODUCTOS();
    $TB_YC_PRODUCTOSArray = $TB_YC_PRODUCTOS->Find(" (PK_PRODUCTO='$v1'   and FL_ACTIVO='$v2'  )");
    return $TB_YC_PRODUCTOSArray[0]->FL_COUPON_DESCRIPTION;
    }
    

    public static function getproductos($v0,$v1,$v2) {
    
    if ($v0==null) {
    $v0="3";
    }

    if ($v1==null) {
    $v1="EUR";
    }

    if ($v2==null) {
    $v2="MXN";
    }

    $CurrencyServerWebService = new CurrencyServerWebService();
    $c = new getCurrencyValue();
    $c->provider=$v0;
$c->srcCurrency=$v1;
$c->dstCurrency=$v2;

    return $CurrencyServerWebService->getCurrencyValue($c)->getCurrencyValueResult;
    }
    
  public static function gettitulo() {
    if (isset($_GET["titulo"])) {
      return $_GET["titulo"];
    }else{
      return "Lead 2 Action";
    }
  }
  public static function gettest() {
    if (isset($_POST["test"])) {
      return $_POST["test"];
    }else{
      return "hola";
    }
  }
  public static function getcupon() {
    if (isset($_GET["cupon"])) {
      return $_GET["cupon"];
    }else{
      return "1";
    }
  }




    public static function getmenucupon($v1) {
    
    if ($v1==null) {
    $v1="C";
    }

    $TB_ESTADOS = new TB_ESTADOS();
    $TB_ESTADOSArray = $TB_ESTADOS->Find(" FL_NAME like '$v1%'  ");
    return $TB_ESTADOSArray;
    }



    public static function getproviders($v0) {
    
    if ($v0==null) {
    $v0="3";
    }

    $CurrencyServerWebService = new CurrencyServerWebService();
    $c = new getDataSet();
    $c->provider=$v0;


    return simplexml_load_string($CurrencyServerWebService->getDataSet($c)->getDataSetResult->any);

    }
    

}
?>
  