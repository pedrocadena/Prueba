<?php

class StringExtended {
  
  private $string;

  function __construct($string) {
    $this->string=$string;
  }
  
function StartsWith($Needle){
    return strpos($this->string, $Needle) === 0;
}

function EndsWith($Needle){
    return strrpos($this->string, $Needle) === strlen($this->string)-strlen($Needle);
}

function Contains($Needle) {
$pos = strpos($haystack,$needle);
if($pos === false) {
 return false;
}
else {
 return true;
}
}

  
}

global $debug;
$debug=false;
global $controlCollection;
global $ViewState;
global $IsPostBack;
$IsPostBack=false;
$ViewState=array();
$controlCollection=array();

if ($_POST['__VIEWSTATE']!=null) {
$ViewState=myUnserialize($_POST['__VIEWSTATE']);
$IsPostBack=true;
}

function GeneratePDFFromHTML($html) {
  $dompdf = new DOMPDF();
  $dompdf->load_html("<html><body>".$html."</body></html>");
  $dompdf->set_base_path('http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']);
  $dompdf->render();
  return $dompdf;
}

function mySerialize($obj) { 
if ($GLOBALS['debug']) {
   return serialize($obj);
}else{
   return base64_encode(gzcompress(serialize($obj))); 
}
} 

function myUnserialize($txt) { 
if ($GLOBALS['debug']) {
return unserialize($txt);
}else{
   return unserialize(gzuncompress(base64_decode($txt))); 
}
} 



function RenderAll() {
			if ($GLOBALS['controlCollection']['__VIEWSTATE']==null) {
				$s=new HTMLScript('framework');
				$s->Src='/shared/framework.js';
        $s->EnableViewState=false;
				$s->Render(0);
				$hi3=new HTMLInput('__VIEWSTATE');
				$hi3->Type='hidden';
        $hi3->EnableViewState=false;
				$hi=new HTMLInput('__EVENTNAME');
				$hi->Type='hidden';
        $hi->Value="";
        $hi->EnableViewState=false;
				$hi->Render(0);
				$hi2=new HTMLInput('__EVENTARGS');
				$hi2->Type='hidden';
        $hi2->Value="";
        $hi2->EnableViewState=false;
				$hi2->Render(0);
				$hi3->Value=mySerialize($GLOBALS['ViewState']);
				$hi3->Render(0);
			}
}

class ControlTag {
	private $selfClose=false;
	private $tag;
	private $parameters=array();
	public $innerHTML;

	function __construct($currentTag) {
		$this->tag=$currentTag;
	}

	function selfClose() {
		$this->selfClose=true;
	}

	function parameters($currentParameters) {
		$this->parameters=$currentParameters;
	}

	
	function Render($close) {
		$html='';
		if ($close==true) {
			if ($this->selfClose) {
			}else{
				$html .='</'.$this->tag.'>
';
			}
		}else{
			$html .='<'.$this->tag;
			foreach($this->parameters as $p => $value) {
				$html .=' '.$p.'="'.$value.'"';
			}
			if ($this->selfClose) {
				$html .='/>';
			}else{
				$html .='>';
			}
			$html .= $this->innerHTML;
		}
		return $html;
	}

}

class BaseHTMLClass {

	public $ID='';
	public $Name='';
	public $Controls=array();
	public $CSSClass='';
	public $Style=array();
	public $Events=array();
	public $Visible=true;
  public $Enabled=true;
  public $EnableViewState=true;
	public $innerHTML;  
  protected $useName=true;
	protected $selfClose=false;
	protected $tag;
	protected $parameters=array();

	function RaiseEvents() {
		if ($_POST['__EVENTARGS']==$this->ID) {
			if ($this->Events[$_POST['__EVENTNAME']]!='') {
					eval($this->Events[$_POST['__EVENTNAME']]);
			}
		}
	}

	function __construct($currentID) {
		$this->ID=$currentID;
		$this->Name=$currentID;
		$GLOBALS['controlCollection'][$this->ID]=$this;
		//Recupera los Viewstates
		if ($_POST['__VIEWSTATE']!=null) {
      if ($GLOBALS['ViewState'][$this->ID.'|Visible']!='') {
			  $this->Visible=$GLOBALS['ViewState'][$this->ID.'|Visible'];
      }
			$this->selfClose=$GLOBALS['ViewState'][$this->ID.'|selfClose'];
			$this->innerHTML=$GLOBALS['ViewState'][$this->ID.'|innerHTML'];
			$this->CSSClass=$GLOBALS['ViewState'][$this->ID.'|CSSClass'];
			$this->Style=$GLOBALS['ViewState'][$this->ID.'|Style'];
			$this->Events=$GLOBALS['ViewState'][$this->ID.'|Events'];
			//$this->Controls=$GLOBALS['ViewState'][$this->ID.'|Controls'];
		}
	}

	function addAttribute($newAttr,$value) {
		$this->parameters[$newAttr]=$value;
	}

	function addStyle($newAttr,$value) {
		$this->Style[$newAttr]=$value;
	}

	function appendChild($controlToAdd) {
		$this->Controls[$controlToAdd->ID]=$controlToAdd;
	}

	function PreRender() {
		$this->addAttribute("id",$this->ID);
    if ($this->useName) {
		  $this->addAttribute("name",$this->ID);
    }
		if (empty($this->Style)) {
		}else{
			$estilo='';
			foreach($this->Style as $p => $value) {
				$estilo .=$p.':'.$value.';';
			}
			$this->addAttribute("style",$estilo);
		}
		if ($this->CSSClass!='') {
			$this->addAttribute("class",$this->CSSClass);
		}
    if ($this->EnableViewState) {
		  $GLOBALS['ViewState'][$this->ID.'|Visible']=$this->Visible;
		  $GLOBALS['ViewState'][$this->ID.'|selfClose']=$this->selfClose;
		  $GLOBALS['ViewState'][$this->ID.'|innerHTML']=$this->innerHTML;
		  $GLOBALS['ViewState'][$this->ID.'|CSSClass']=$this->CSSClass;
		  $GLOBALS['ViewState'][$this->ID.'|Style']=$this->Style;
		  //$GLOBALS['ViewState'][$this->ID.'|Controls']=$this->Controls;
		  $GLOBALS['ViewState'][$this->ID.'|Events']=$this->Events;
    }
	}
	
	function Render($both) {
		if ($this->Visible) {
			$this->PreRender();
			$h=new ControlTag($this->tag);
			if ($this->selfClose) {
				$h->selfClose();
			}
			$h->parameters($this->parameters);
			$h->innerHTML=$this->innerHTML;
      if ($both==0||$both==1) {
			  echo $h->Render(false);
			  foreach($this->Controls as $p) {
				  $p->Render(0);
			  }
      }
      if ($both==0||$both==2) {
			  echo $h->Render(true);
      }
		}
	}

}

class HTMLImage extends BaseHTMLClass {
	public $ImageUrl;
	public $AlternateText;

   function __construct($currentID) {
       	parent::__construct($currentID);
	$this->tag='img';
	$this->selfClose=true;
  $this->useName=false;
	if ($_POST['__VIEWSTATE']!=null) {
		$this->ImageUrl=$GLOBALS['ViewState'][$this->ID.'|ImageUrl'];
		$this->AlternateText=$GLOBALS['ViewState'][$this->ID.'|NavigateUrl'];
	}
   }

   	function PreRender() {
		$this->addAttribute("src",$this->ImageUrl);
		if ($this->AlternateText!='') {
			$this->addAttribute("alt",$this->AlternateText);
		}		
		parent::PreRender();
    if ($this->EnableViewState) {
		  $GLOBALS['ViewState'][$this->ID.'|ImageUrl']=$this->ImageUrl;
		  $GLOBALS['AlternateText'][$this->ID.'|ImageUrl']=$this->AlternateText;
    }
	}

}

class HTMLUL extends BaseHTMLClass {
   function __construct($currentID) {
       	parent::__construct($currentID);
	      $this->tag='ul';
        $this->useName=false;
  }
}

class HTMLLI extends BaseHTMLClass {
   function __construct($currentID) {
       	parent::__construct($currentID);
	      $this->tag='li';
        $this->useName=false;
  }
}

class HTMLInput extends BaseHTMLClass {
	public $Type;
	public $Value;

   function __construct($currentID) {
       	parent::__construct($currentID);
	$this->tag='input';
	$this->selfClose=true;
  if ($_POST['__VIEWSTATE']!=null) {
		  $this->Type=$GLOBALS['ViewState'][$this->ID.'|Type'];
		  $this->Value=$GLOBALS['ViewState'][$this->ID.'|Value'];
	}
	if ($currentID=='__VIEWSTATE') {
		$this->Visible=true;
	}
   }

   	function PreRender() {
		if ($this->Type!='') {
			$this->addAttribute("type",$this->Type);
		}
		if ($this->Value!='') {
			$this->addAttribute("value",$this->Value);
		}
		parent::PreRender();
    if ($this->EnableViewState) {
		  $GLOBALS['ViewState'][$this->ID.'|Type']=$this->Type;
		  $GLOBALS['AlternateText'][$this->ID.'|Value']=$this->Value;
    }    
	}
}

class HTMLDiv extends BaseHTMLClass {
	   function __construct($currentID) {
       	parent::__construct($currentID);
		$this->tag='div';
    $this->useName=false;
	   }
}

class HTMLScript extends BaseHTMLClass {
	public $Type='text/javascript';
	public $Src;

   function __construct($currentID) {
       	parent::__construct($currentID);
		$this->tag='script';
    $this->useName=false;
	if ($_POST['__VIEWSTATE']!=null) {
		$this->Type=$GLOBALS['ViewState'][$this->ID.'|Type'];
		$this->Src=$GLOBALS['ViewState'][$this->ID.'|Src'];
	}
   }

   	function PreRender() {
		if ($this->Type!='') {
			$this->addAttribute("type",$this->Type);
		}
		if ($this->Src!='') {
			$this->addAttribute("src",$this->Src);
		}
		parent::PreRender();
    if ($this->EnableViewState) {
		  $GLOBALS['ViewState'][$this->ID.'|Type']=$this->Type;
		  $GLOBALS['ViewState'][$this->ID.'|Src']=$this->Src;
    }
	}
}

class HTMLLink extends BaseHTMLClass {
	public $ImageUrl;
	public $NavigateUrl;
	public $Text;
	public $Title;
	public $Target;
	public $OnClientClick;
	public $OnClick;

   function __construct($currentID) {
       	parent::__construct($currentID);
	$this->tag='a';
  $this->useName=false;  
	//Agrega los eventos
	$this->Events['onclick']='';
	if ($_POST['__VIEWSTATE']!=null) {
		$this->ImageUrl=$GLOBALS['ViewState'][$this->ID.'|ImageUrl'];
		$this->NavigateUrl=$GLOBALS['ViewState'][$this->ID.'|NavigateUrl'];
		$this->Text=$GLOBALS['ViewState'][$this->ID.'|Text'];
		$this->Title=$GLOBALS['ViewState'][$this->ID.'|Title'];
		$this->Target=$GLOBALS['ViewState'][$this->ID.'|Target'];
		$this->OnClientClick=$GLOBALS['ViewState'][$this->ID.'|OnClientClick'];
		$this->OnClick=$GLOBALS['ViewState'][$this->ID.'|OnClick'];
		$this->Events['onclick']=$this->OnClick;
	}
   }

   	function PreRender() {
		if ($this->OnClick!='') {
			$this->NavigateUrl='javascript:void(0);';
			$this->OnClientClick='javascript:__doPostBack(\'onclick\',\''.$this->ID.'\');';
			$this->Events['onclick']=$this->OnClick;
		}
		if ($this->ImageUrl!='') {
			$img=new HTMLImage($this->ID.'_ctl0');
			$img->ImageUrl=$this->ImageUrl;
      $img->EnableViewState=$this->EnableViewState;
			$img->AlternateText=$this->Title;
			$img->addStyle("border","none");
			$this->appendChild($img);
			}
		if ($this->Title!='') {
			$this->addAttribute("title",$this->Title);
		}
		if ($this->OnClientClick!='') {
			$this->addAttribute("onclick",$this->OnClientClick);
		}
		$this->addAttribute("href",$this->NavigateUrl);
		if ($this->Target!='') {
			$this->addAttribute("target",$this->Target);
		}
		$this->innerHTML=$this->Text;		
		parent::PreRender();
    if ($this->EnableViewState) {
		  $GLOBALS['ViewState'][$this->ID.'|ImageUrl']=$this->ImageUrl;
		  $GLOBALS['ViewState'][$this->ID.'|NavigateUrl']=$this->NavigateUrl;
		  $GLOBALS['ViewState'][$this->ID.'|Text']=$this->Text;
		  $GLOBALS['ViewState'][$this->ID.'|Title']=$this->Title;
		  $GLOBALS['ViewState'][$this->ID.'|Target']=$this->Target;
		  $GLOBALS['ViewState'][$this->ID.'|OnClientClick']=$this->OnClientClick;
    }
		  $GLOBALS['ViewState'][$this->ID.'|OnClick']=$this->OnClick;    
	}
}

?>