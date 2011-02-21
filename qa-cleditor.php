<?php

	class qa_cleditor {
	
		var $urltoroot;
		
		function load_module($directory, $urltoroot)
		{
			$this->urltoroot=$urltoroot;
		}
		
		function calc_quality($content, $format)
		{
			if ($format=='html')
				return 1.0;
			elseif ($format=='')
				return 0.8;
			else
				return 0;
		}
		
		function get_field(&$qa_content, $content, $format, $fieldname, $rows, $autofocus)
		{
			$qa_content['script_src'][]=$this->urltoroot.'js/cleditor/jquery.cleditor.min.js?1.3.0';
			$qa_content['script_src'][]=$this->urltoroot.'js/cleditor/jquery.cleditor.xhtml.min.js?1.3.0';
			$qa_content['script_src'][]=$this->urltoroot.'js/cleditor/jquery.cleditor.pastecode.js?0.1';
			$qa_content['script_src'][]=$this->urltoroot.'js/editor.js';
			
			$wysiwyg_path =$this->urltoroot.'js/cleditor/';
			$qa_content['script_onloads'][]="load_editor( ".qa_js($fieldname).",".qa_js($wysiwyg_path)." );";
			
			if ($format=='html')
				$html=$content;
			else
				$html=qa_html($content, true);
			
			return array(
				'tags' => ' name="'.$fieldname.'" ',
				'value' => qa_html($html),
				'rows' => $rows,
			);
		}
		
		function read_post($fieldname)
		{
			$html=qa_post_text($fieldname);
			
			$htmlformatting=preg_replace('/<\s*\/?\s*(br|p)\s*\/?\s*>/i', '', $html); // remove <p>, <br>, etc... since those are OK in text
			
			if (preg_match('/<.+>/', $htmlformatting)) // if still some other tags, it's worth keeping in HTML
				return array(
					'format' => 'html',
					'content' => qa_sanitize_html($html), // qa_sanitize_html() is ESSENTIAL for security
				);
			
			else { // convert to text
				$viewer=qa_load_module('viewer', '');

				return array(
					'format' => '',
					'content' => $viewer->get_text($html, 'html', array())
				);
			}
		}
	
	};
