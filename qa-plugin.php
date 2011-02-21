<?php
/*
	Plugin Name: CLEditor
	Plugin URI: http://ubuntu.ro
	Plugin Description: CLEditor as a wysiwyg
	Plugin Version: 0.1
	Plugin Date: 2011-02-15
	Plugin Author: Stas Sușcov
	Plugin Author URI: http://stas.nerd.ro
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.3
*/

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}


	qa_register_plugin_module('editor', 'qa-cleditor.php', 'qa_cleditor', 'CLEditor');
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
