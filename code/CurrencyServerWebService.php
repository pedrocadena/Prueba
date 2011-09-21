<?php

if (!class_exists("getDataSet")) {
/**
 * getDataSet
 */
class getDataSet {
	/**
	 * @access public
	 * @var string
	 */
	public $provider;
}}

if (!class_exists("getDataSetResponse")) {
/**
 * getDataSetResponse
 */
class getDataSetResponse {
	/**
	 * @access public
	 * @var anyType
	 */
	public $getDataSetResult;
	/**
	 * @access public
	 * @var sschema
	 */
	public $schema;
}}

if (!class_exists("getDataSetResult")) {
/**
 * getDataSetResult
 */
class getDataSetResult {
	/**
	 * @access public
	 * @var sschema
	 */
	public $schema;
}}

if (!class_exists("getXmlStream")) {
/**
 * getXmlStream
 */
class getXmlStream {
	/**
	 * @access public
	 * @var string
	 */
	public $provider;
}}

if (!class_exists("getXmlStreamResponse")) {
/**
 * getXmlStreamResponse
 */
class getXmlStreamResponse {
	/**
	 * @access public
	 * @var string
	 */
	public $getXmlStreamResult;
}}

if (!class_exists("getCurrencyValue")) {
/**
 * getCurrencyValue
 */
class getCurrencyValue {
	/**
	 * @access public
	 * @var string
	 */
	public $provider;
	/**
	 * @access public
	 * @var string
	 */
	public $srcCurrency;
	/**
	 * @access public
	 * @var string
	 */
	public $dstCurrency;
}}

if (!class_exists("getCurrencyValueResponse")) {
/**
 * getCurrencyValueResponse
 */
class getCurrencyValueResponse {
	/**
	 * @access public
	 * @var double
	 */
	public $getCurrencyValueResult;
}}

if (!class_exists("getDollarValue")) {
/**
 * getDollarValue
 */
class getDollarValue {
	/**
	 * @access public
	 * @var string
	 */
	public $provider;
	/**
	 * @access public
	 * @var string
	 */
	public $currency;
}}

if (!class_exists("getDollarValueResponse")) {
/**
 * getDollarValueResponse
 */
class getDollarValueResponse {
	/**
	 * @access public
	 * @var double
	 */
	public $getDollarValueResult;
}}

if (!class_exists("getProviderDescription")) {
/**
 * getProviderDescription
 */
class getProviderDescription {
	/**
	 * @access public
	 * @var string
	 */
	public $provider;
}}

if (!class_exists("getProviderDescriptionResponse")) {
/**
 * getProviderDescriptionResponse
 */
class getProviderDescriptionResponse {
	/**
	 * @access public
	 * @var string
	 */
	public $getProviderDescriptionResult;
}}

if (!class_exists("getProviderTimestamp")) {
/**
 * getProviderTimestamp
 */
class getProviderTimestamp {
	/**
	 * @access public
	 * @var string
	 */
	public $providerId;
	/**
	 * @access public
	 * @var string
	 */
	public $provider;
}}

if (!class_exists("getProviderTimestampResponse")) {
/**
 * getProviderTimestampResponse
 */
class getProviderTimestampResponse {
	/**
	 * @access public
	 * @var string
	 */
	public $getProviderTimestampResult;
}}

if (!class_exists("getProviderList")) {
/**
 * getProviderList
 */
class getProviderList {
}}

if (!class_exists("getProviderListResponse")) {
/**
 * getProviderListResponse
 */
class getProviderListResponse {
	/**
	 * @access public
	 * @var string
	 */
	public $getProviderListResult;
}}

if (!class_exists("DataSet")) {
/**
 * DataSet
 */
class DataSet {
	/**
	 * @access public
	 * @var sschema
	 */
	public $schema;
}}

if (!class_exists("CurrencyServerWebService")) {
/**
 * CurrencyServerWebService
 * @author WSDLInterpreter
 */
class CurrencyServerWebService extends SoapClient {
	/**
	 * Default class map for wsdl=>php
	 * @access private
	 * @var array
	 */
	private static $classmap = array(
		"getDataSet" => "getDataSet",
		"getDataSetResponse" => "getDataSetResponse",
		"getDataSetResult" => "getDataSetResult",
		"getXmlStream" => "getXmlStream",
		"getXmlStreamResponse" => "getXmlStreamResponse",
		"getCurrencyValue" => "getCurrencyValue",
		"getCurrencyValueResponse" => "getCurrencyValueResponse",
		"getDollarValue" => "getDollarValue",
		"getDollarValueResponse" => "getDollarValueResponse",
		"getProviderDescription" => "getProviderDescription",
		"getProviderDescriptionResponse" => "getProviderDescriptionResponse",
		"getProviderTimestamp" => "getProviderTimestamp",
		"getProviderTimestampResponse" => "getProviderTimestampResponse",
		"getProviderList" => "getProviderList",
		"getProviderListResponse" => "getProviderListResponse",
		"DataSet" => "DataSet",
	);

	/**
	 * Constructor using wsdl location and options array
	 * @param string $wsdl WSDL location for this service
	 * @param array $options Options for the SoapClient
	 */
	public function __construct($wsdl="http://www.currencyserver.de/webservice/currencyserverwebservice.asmx?WSDL", $options=array()) {
		foreach(self::$classmap as $wsdlClassName => $phpClassName) {
		    if(!isset($options['classmap'][$wsdlClassName])) {
		        $options['classmap'][$wsdlClassName] = $phpClassName;
		    }
		}
		parent::__construct($wsdl, $options);
	}

	/**
	 * Checks if an argument list matches against a valid argument type list
	 * @param array $arguments The argument list to check
	 * @param array $validParameters A list of valid argument types
	 * @return boolean true if arguments match against validParameters
	 * @throws Exception invalid function signature message
	 */
	public function _checkArguments($arguments, $validParameters) {
		$variables = "";
		foreach ($arguments as $arg) {
		    $type = gettype($arg);
		    if ($type == "object") {
		        $type = get_class($arg);
		    }
		    $variables .= "(".$type.")";
		}
		if (!in_array($variables, $validParameters)) {
		    throw new Exception("Invalid parameter types: ".str_replace(")(", ", ", $variables));
		}
		return true;
	}

	/**
	 * Service Call: getDataSet
	 * Parameter options:
	 * (getDataSet) parameters
	 * (getDataSet) parameters
	 * (string) provider
	 * (string) provider
	 * @param mixed,... See function description for parameter options
	 * @return getDataSetResponse|DataSet
	 * @throws Exception invalid function signature message
	 */
	public function getDataSet($mixed = null) {
		$validParameters = array(
			"(getDataSet)",
			"(getDataSet)",
			"(string)",
			"(string)",
		);
		$args = func_get_args();
		$this->_checkArguments($args, $validParameters);
		return $this->__soapCall("getDataSet", $args);
	}


	/**
	 * Service Call: getXmlStream
	 * Parameter options:
	 * (getXmlStream) parameters
	 * (getXmlStream) parameters
	 * (string) provider
	 * (string) provider
	 * @param mixed,... See function description for parameter options
	 * @return getXmlStreamResponse|string
	 * @throws Exception invalid function signature message
	 */
	public function getXmlStream($mixed = null) {
		$validParameters = array(
			"(getXmlStream)",
			"(getXmlStream)",
			"(string)",
			"(string)",
		);
		$args = func_get_args();
		$this->_checkArguments($args, $validParameters);
		return $this->__soapCall("getXmlStream", $args);
	}


	/**
	 * Service Call: getCurrencyValue
	 * Parameter options:
	 * (getCurrencyValue) parameters
	 * (getCurrencyValue) parameters
	 * (string) provider, (string) srcCurrency, (string) dstCurrency
	 * (string) provider, (string) srcCurrency, (string) dstCurrency
	 * @param mixed,... See function description for parameter options
	 * @return getCurrencyValueResponse|double
	 * @throws Exception invalid function signature message
	 */
	public function getCurrencyValue($mixed = null) {
		$validParameters = array(
			"(getCurrencyValue)",
			"(getCurrencyValue)",
			"(string)(string)(string)",
			"(string)(string)(string)",
		);
		$args = func_get_args();
		$this->_checkArguments($args, $validParameters);
		return $this->__soapCall("getCurrencyValue", $args);
	}


	/**
	 * Service Call: getDollarValue
	 * Parameter options:
	 * (getDollarValue) parameters
	 * (getDollarValue) parameters
	 * (string) provider, (string) currency
	 * (string) provider, (string) currency
	 * @param mixed,... See function description for parameter options
	 * @return getDollarValueResponse|double
	 * @throws Exception invalid function signature message
	 */
	public function getDollarValue($mixed = null) {
		$validParameters = array(
			"(getDollarValue)",
			"(getDollarValue)",
			"(string)(string)",
			"(string)(string)",
		);
		$args = func_get_args();
		$this->_checkArguments($args, $validParameters);
		return $this->__soapCall("getDollarValue", $args);
	}


	/**
	 * Service Call: getProviderDescription
	 * Parameter options:
	 * (getProviderDescription) parameters
	 * (getProviderDescription) parameters
	 * (string) provider
	 * (string) provider
	 * @param mixed,... See function description for parameter options
	 * @return getProviderDescriptionResponse|string
	 * @throws Exception invalid function signature message
	 */
	public function getProviderDescription($mixed = null) {
		$validParameters = array(
			"(getProviderDescription)",
			"(getProviderDescription)",
			"(string)",
			"(string)",
		);
		$args = func_get_args();
		$this->_checkArguments($args, $validParameters);
		return $this->__soapCall("getProviderDescription", $args);
	}


	/**
	 * Service Call: getProviderTimestamp
	 * Parameter options:
	 * (getProviderTimestamp) parameters
	 * (getProviderTimestamp) parameters
	 * (string) providerId, (string) provider
	 * (string) providerId, (string) provider
	 * @param mixed,... See function description for parameter options
	 * @return getProviderTimestampResponse|string
	 * @throws Exception invalid function signature message
	 */
	public function getProviderTimestamp($mixed = null) {
		$validParameters = array(
			"(getProviderTimestamp)",
			"(getProviderTimestamp)",
			"(string)(string)",
			"(string)(string)",
		);
		$args = func_get_args();
		$this->_checkArguments($args, $validParameters);
		return $this->__soapCall("getProviderTimestamp", $args);
	}


	/**
	 * Service Call: getProviderList
	 * Parameter options:
	 * (getProviderList) parameters
	 * (getProviderList) parameters
	 * @param mixed,... See function description for parameter options
	 * @return getProviderListResponse|string
	 * @throws Exception invalid function signature message
	 */
	public function getProviderList($mixed = null) {
		$validParameters = array(
			"(getProviderList)",
			"(getProviderList)",
		);
		$args = func_get_args();
		$this->_checkArguments($args, $validParameters);
		return $this->__soapCall("getProviderList", $args);
	}


}}

?>