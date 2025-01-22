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
 
if (isset($_POST['check-public']) OR isset($_POST['check-member']) OR isset($_POST['check-admin']) or isset($_POST['check-mainadmin']) )
{

	$buttons = plugin_trumbowyg_configuration::getDefaultButtonsKeys();
	$buttonPane = plugin_trumbowyg_configuration::getFullButtonsKeys();
 
	$pluginPref = e107::getPlugConfig('trumbowyg')->getPref();
	$btns = e107::pref('trumbowyg', 'btns');

	$curVal = e107::unserialize($btns);
	if (isset($_POST['check-mainadmin'])) $curVal['mainadmin'] = $buttonPane;
    if (isset($_POST['check-public'])) $curVal['public'] = $buttons;
	if (isset($_POST['check-member'])) $curVal['member'] = $buttons;
	if (isset($_POST['check-admin']))  $curVal['admin'] = $buttons;
 
	$tmp = json_encode($curVal);
	$pluginPref['btns'] = $tmp ;
 
	e107::getPlugConfig('trumbowyg', '', false)->setPref($pluginPref)->save(false, true);
	// Redirect back to the current page
	e107::redirect(e_REQUEST_URL);
}

if (isset($_POST['uncheck-public']) or isset($_POST['uncheck-member']) or isset($_POST['uncheck-admin']) or isset($_POST['uncheck-mainadmin']))
{

	$pluginPref = e107::getPlugConfig('trumbowyg')->getPref();
	$btns = e107::pref('trumbowyg', 'btns');

	$curVal = e107::unserialize($btns);
	if (isset($_POST['uncheck-mainadmin'])) $curVal['mainadmin'] = [];
	if (isset($_POST['uncheck-public'])) $curVal['public'] = [];
	if (isset($_POST['uncheck-member'])) $curVal['member'] = []; // Empty 'member'
	if (isset($_POST['uncheck-admin']))  $curVal['admin'] = [];

	$tmp = json_encode($curVal);
	$pluginPref['btns'] = $tmp;

	e107::getPlugConfig('trumbowyg', '', false)->setPref($pluginPref)->save(false, true);
	// Redirect back to the current page
	e107::redirect(e_REQUEST_URL);
}

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



new plugin_trumbowyg_settings();
require_once(e_ADMIN . "auth.php");
//download/includes/admin.php is auto-loaded. 
e107::getAdminUI()->runPage();
require_once(e_ADMIN . "footer.php");
exit;

 
