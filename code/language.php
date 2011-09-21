<?php
function localize($phrase) {
	    /* Static keyword is used to ensure the file is loaded only once */
	    static $translations = NULL;
	    if (is_null($translations)) {
        $lang_file = YourIDE_Root.'/lang/language.' . LANGUAGE . '.txt';
	        if (!file_exists($lang_file)) {
	            $lang_file = YourIDE_Root.'/lang/language.txt';
	        }
	        $lang_file_content = file_get_contents($lang_file);
	        $translations = json_decode($lang_file_content, true);
	    }
	    return $translations[$phrase];
}
?>