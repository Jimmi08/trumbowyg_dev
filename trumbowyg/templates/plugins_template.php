<?php


//mandatory for override, don't delete them, merge is not allowed 
$PLUGINS_TEMPLATE['colors'] = array();
$PLUGINS_TEMPLATE['colorLabels'] = array();
$PLUGINS_TEMPLATE['fontfamily'] = array();
$PLUGINS_TEMPLATE['fontsize'] = array();
$PLUGINS_TEMPLATE['template'] = array();
$PLUGINS_TEMPLATE['lineheight']= array();

//Examples for using in theme
$PLUGINS_TEMPLATE['colors']['colorList'] = ['ffffff', '000000', 'eeece1', '1f497d', '4f81bd', 'c0504d', '9bbb59', '8064a2', '4bacc6', 'f79646', 'ffff00', 'f2f2f2', '7f7f7f', 'ddd9c3', 'c6d9f0', 'dbe5f1', 'f2dcdb', 'ebf1dd', 'e5e0ec', 'dbeef3', 'fdeada', 'fff2ca', 'd8d8d8', '595959', 'c4bd97', '8db3e2', 'b8cce4', 'e5b9b7', 'd7e3bc', 'ccc1d9', 'b7dde8', 'fbd5b5', 'ffe694', 'bfbfbf', '3f3f3f', '938953', '548dd4', '95b3d7', 'd99694', 'c3d69b', 'b2a2c7', 'b7dde8', 'fac08f', 'f2c314', 'a5a5a5', '262626', '494429', '17365d', '366092', '953734', '76923c', '5f497a', '92cddc', 'e36c09', 'c09100', '7f7f7f', '0c0c0c', '1d1b10', '0f243e', '244061', '632423', '4f6128', '3f3151', '31859b', '974806', '7f6000'];
// $PLUGINS_TEMPLATE['colors']['foreColorList'] = ['ff0000', '00ff00', '0000ff'];
// $PLUGINS_TEMPLATE['colors']['backColorList'] = ['000', '333', '555'];
// $PLUGINS_TEMPLATE['colors']['displayAsList'] = 0;
$PLUGINS_TEMPLATE['colors']['allowCustomForeColor'] = 1; 
$PLUGINS_TEMPLATE['colors']['allowCustomBackColor'] = 1;


// $PLUGINS_TEMPLATE['colorLabels']['#000'] = 'Black';
// $PLUGINS_TEMPLATE['colorLabels']['#555'] = 'Dark grey';
// $PLUGINS_TEMPLATE['colorLabels']['#ff0000'] = 'Red';
// $PLUGINS_TEMPLATE['colorLabels']['#00ff00'] = 'Green';
// $PLUGINS_TEMPLATE['colorLabels']['#0000ff'] = 'Blue';
// $PLUGINS_TEMPLATE['colorLabels']['#ff1493'] = 'Pink';


// $PLUGINS_TEMPLATE['fontfamily']['fontList']
// = [
// 	['name' => 'Arial', 'family' => 'Arial, Helvetica, sans-serif'],
// 	['name' => 'Open Sans', 'family' => "'Open Sans', sans-serif"]
// ];

// $PLUGINS_TEMPLATE['fontsize']['sizeList'] = ['12px','14px','16px'];
// $PLUGINS_TEMPLATE['fontsize']['allowCustomSize'] = 0;

//$PLUGINS_TEMPLATE['lineheight']['sizeList'] = ['12px', '14px', '16px'];


$PLUGINS_TEMPLATE['template'] = [
		['name' => 'Template 1', 'html' => '<p>I am a template!</p>'],
		['name' => 'Template 2', 'html' => '<p>I am a template!</p>']
];

$PLUGINS_TEMPLATE['highlight']['enableLineHighlight'] = 1;
$PLUGINS_TEMPLATE['highlight']['languageNames'] = [
	'html' => 'HTML',
	'xml' => 'XML',
	'svg' => 'SVG',
	'mathml' => 'MathML',
	'ssml' => 'SSML',
	'css' => 'CSS'
];


$PLUGINS_TEMPLATE['e107mm']['baseURL'] = e_ADMIN_ABS;
