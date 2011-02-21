(function($) {
  $.cleditor.buttons.pastecode = {
    name: "pastecode",
    image: "",
    title: "Paste Code",
    command: "inserthtml",
    popupName: "pastecode",
    popupClass: "cleditorPrompt",
    popupContent: "Paste the code:<br /><textarea cols='40' rows='3'></textarea><br /><input type='button' value='Ok' />",
    buttonClick: pastecodeClick
  };

  // Handle the hello button click event
  function pastecodeClick(e, data) {
    // Wire up the submit button click event
    $(data.popup).children(":button")
      .unbind("click")
      .bind("click", function(e) {
      
        // Get the editor
        var editor = data.editor;
        
        // Get the entered name
        var codeblock = $(data.popup).find("textarea").val();
        var html = '<pre>' + codeblock + '</pre>';
        
        // Insert some html into the document
        editor.execCommand(data.command, html, null, data.button);
        
        // Hide the popup and set focus back to the editor
        editor.hidePopups();
        editor.focus();
      });
  }
})(jQuery);
