<?php


// This is used on the front-end. ie. comments etc. 
$BUTTONPANE_TEMPLATE['default'] = [
			['viewHTML'], // Group for HTML view
			['undo', 'redo'], // Undo/redo (only supported in Blink browsers)
			['formatting'], // Formatting options
			['strong', 'em', 'del'], // Text styling
			['superscript', 'subscript'], // Superscript and subscript
			['link'], // Hyperlink options
			['insertImage'], // Image insertion
			['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'], // Text alignment
			['unorderedList', 'orderedList'], // Lists
			['horizontalRule'], // Horizontal rule
			['removeformat'], // Remove formatting
			['fullscreen'], // Fullscreen mode
		];
 
 
$BUTTONPANE_TEMPLATE['full'] =
[
	['viewHTML'],
	['undo', 'redo'], // Only supported in Blink browsers
	['historyUndo', 'historyRedo'],
	['formatting'],
	['fontfamily'],
	['fontsize'],
	['lineheight'],
	['foreColor', 'backColor'],
	['specialChars'],
	['strong', 'em', 'underline', 'del'],
	['superscript', 'subscript'],
	['link'],
	['emoji'],
	['insertImage'],
	['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
	['unorderedList', 'orderedList'],
	['horizontalRule'],
	['upload', 'base64', 'noembed'],
	['table'],
	['tableCellBackgroundColor', 'tableBorderColor'],
	['preformatted'],
	['highlight'],
	['template'],
	['removeformat'],
	['fullscreen']
];


/**  access level */

$BUTTONPANE_TEMPLATE['public'] = [];
$BUTTONPANE_TEMPLATE['member'] = $BUTTONPANE_TEMPLATE['default'];
$BUTTONPANE_TEMPLATE['admin'] = $BUTTONPANE_TEMPLATE['default'];
$BUTTONPANE_TEMPLATE['mainadmin'] = $BUTTONPANE_TEMPLATE['full'];


/** place of use **/
/** see bbcode_template */
// $BBCODE_TEMPLATE = "
// 	{BB=link}{BB=b}{BB=i}{BB=u}{BB=img}{BB=left}{BB=center}{BB=right}{BB=justify}{BB=bq}{BB=list}{BB=emotes}
// 	<div class='field-spacer'><!-- --></div>
// ";

$BUTTONPANE_TEMPLATE['comment'] = [
	['link'],
	['strong', 'em', 'underline', 'del'],
	['emoji'],
	['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
	['insertImage']
];
 
 
// $BBCODE_TEMPLATE_SIGNATURE = "
// 	{BB=link}{BB=b}{BB=i}{BB=u}{BB=img}{BB=left}{BB=center}{BB=right}{BB=justify}{BB=list}
// 	<div class='field-spacer'><!-- --></div>
// ";
$BUTTONPANE_TEMPLATE['signature'] = [
	 ['viewHTML'],['strong', 'em', 'underline', 'del'],
	 ['emoji'],
	 ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
	 ['insertImage']
];

//$BUTTONPANE_TEMPLATE['signature'] =  NULL; //callback to level templates, no custom buttons
//$BUTTONPANE_TEMPLATE['signature'] = [];      //no buttons

$BUTTONPANE_TEMPLATE['submitnews'] = [];
$BUTTONPANE_TEMPLATE['mailout'] = [];

$BUTTONPANE_TEMPLATE['newspost'] = [];
$BUTTONPANE_TEMPLATE['cpage'] = "";
