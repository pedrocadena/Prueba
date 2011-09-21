<?php 
		class TB_YC_MARCAS extends ADOdb_Active_Record{ 
		  function __construct()
		  {
			  parent::__construct('TB_YC_MARCAS',false,$GLOBALS['db1']);
		  }      
		}   
    ?>