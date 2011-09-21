<?php 
		class TB_USERS extends ADOdb_Active_Record{ 
		  function __construct()
		  {
			  parent::__construct('TB_USERS',false,$GLOBALS['db1']);
		  }      
		}   
    ?>