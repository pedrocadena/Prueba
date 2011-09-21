<?php 
		class TB_ESTADOS extends ADOdb_Active_Record{ 
		  function __construct()
		  {
			  parent::__construct('TB_ESTADOS',false,$GLOBALS['db1']);
		  }      
		}   
    ?>