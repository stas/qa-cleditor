/* Editor wysiwyg */

function load_editor( name, path ) {
	$(document).ready(function() {
		jQuery('head').append( '<link rel="stylesheet" type="text/css" href="' + path + 'jquery.cleditor.css' + '">');
		
		if( jQuery.editor_name != '' )
			jQuery('[name=' + name + ']').cleditor(
				{
					width:"99%",
					height:"100%",
					controls: // controls to add to the toolbar
						"bold italic underline strikethrough subscript superscript | " +
						"color highlight removeformat | bullets numbering | outdent " +
						"indent | alignleft center alignright | " +
						"rule image link unlink | pastetext pastecode ",
					bodyStyle: 'font: none;'
				}
			);
		jQuery('div[title="Paste Code"]').css( {'background-position': 'top right'} );
	});
}
