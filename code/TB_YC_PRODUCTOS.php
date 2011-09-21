<?php 
		class TB_YC_PRODUCTOS extends ADOdb_Active_Record{ 
		  function __construct()
		  {
			  parent::__construct('TB_YC_PRODUCTOS',false,$GLOBALS['db1']);
		  }      
		}   
    ?>