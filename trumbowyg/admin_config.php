<?php

/**
 * @file
 * Admin UI.
 */

require_once("../../class2.php");

if(!e107::isInstalled('trumbowyg') || !getperms("P"))
{
	e107::redirect(e_BASE . 'index.php');
}

// [PLUGINS]/trumbowyg/languages/[LANGUAGE]/[LANGUAGE]_admin.php
e107::lan('trumbowyg', true, true);
new plugin_trumbowyg_configuration();
 

if (isset($_POST['semantic-default']))
{
	$semantic = plugin_trumbowyg_configuration::getDefaultPrefs('semantic');
	$tmp = json_encode($semantic);
	$pluginPref = e107::getPlugConfig('trumbowyg')->getPref();
 
	$pluginPref['semantic'] = $tmp;
	e107::getPlugConfig('trumbowyg', '', false)->setPref($pluginPref)->save(false, true);
	e107::redirect(e_REQUEST_URL);
}

if (isset($_POST['tagClasses-reset']))
{
	$semantic = plugin_trumbowyg_configuration::getDefaultPrefs('tagClasses');
	$tmp = json_encode($semantic);
	$pluginPref = e107::getPlugConfig('trumbowyg')->getPref();

	$pluginPref['tagClasses'] = $tmp;
	e107::getPlugConfig('trumbowyg', '', false)->setPref($pluginPref)->save(false, true);
	e107::redirect(e_REQUEST_URL);
}



new plugin_trumbowyg_prefs();
require_once(e_ADMIN . "auth.php");
//download/includes/admin.php is auto-loaded. 
e107::getAdminUI()->runPage();
require_once(e_ADMIN . "footer.php");
exit;

 
