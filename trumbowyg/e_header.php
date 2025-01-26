<?php

$pref = e107::getPref();
$pluginPrefs = e107::pref('trumbowyg');
$enableOn =  (int) varset($pluginPrefs['enableEditor'], 1);

if ($enableOn)
{

	if ($pluginPrefs['plugin_highlight'])
	{
 
		e107::css("trumbowyg", "vendors/prism/themes/prism.css");
		e107::css("trumbowyg", "vendors/prism/plugins/line-highlight/prism-line-highlight.min.css");

	 
	} 
}
