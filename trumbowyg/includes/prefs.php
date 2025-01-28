<?php



require_once("../../class2.php");

if (!e107::isInstalled('trumbowyg') || !getperms("P"))
{
	e107::redirect(e_BASE . 'index.php');
}

// [PLUGINS]/trumbowyg/languages/[LANGUAGE]/[LANGUAGE]_admin.php
e107::lan('trumbowyg', true, true);




/**
 * Class trumbowyg_admin_config.
 */
class plugin_trumbowyg_prefs extends e_admin_dispatcher
{


	protected $modes = array(
		'main' => array(
			'controller' => 'trumbowyg_admin_ui',
			'path'       => null,
			'ui'         => 'trumbowyg_admin_form_ui',
			'uipath'     => null
		),

		'semantic' => array(
			'controller' => 'trumbowyg_semantic_ui',
			'path'       => null,
			'ui'         => 'trumbowyg_admin_form_ui',
			'uipath'     => null
		),
		'tagclasses' => array(
			'controller' => 'trumbowyg_tagclasses_ui',
			'path'       => null,
			'ui'         => 'trumbowyg_admin_form_ui',
			'uipath'     => null
		),
		'tags' => array(
			'controller' => 'trumbowyg_tags_ui',
			'path'       => null,
			'ui'         => 'trumbowyg_admin_form_ui',
			'uipath'     => null
		),
		'plugins' => array(
			'controller' => 'trumbowyg_plugins_ui',
			'path'       => null,
			'ui'         => 'trumbowyg_admin_form_ui',
			'uipath'     => null
		),
	);


	protected $adminMenu = array(
		'main/prefs' => array(
			'caption' => LAN_TRUMBOWYG_ADMIN_NAV_00,
			'perm'    => 'P',
		),

		'plugins/prefs' => array(
			'caption' => LAN_TRUMBOWYG_ADMIN_NAV_04,
			'perm'    => 'P',
		),


		'tagClasses' => array(
			'caption' => LAN_TRUMBOWYG_TAG_CLASSES,
			'perm'    => 'P',
		),

		'tags/prefs' => array(
			'caption' => LAN_TRUMBOWYG_ADMIN_NAV_03,
			'perm'    => 'P',
		),
	);

	/**
	 * Optional (set by child class).
	 *
	 * @var string
	 */
	protected $menuTitle = LAN_PLUGIN_TRUMBOWYG_NAME;
}



class trumbowyg_admin_ui extends e_admin_ui
{
	protected $pluginTitle = LAN_PLUGIN_TRUMBOWYG_NAME;
	protected $pluginName = "trumbowyg";


	/**
	 * @var array
	 */

	protected $prefs = array(
		'enableEditor'  		=> array('title' => LAN_TRUMBOWYG_ADMIN_04, 'type' => 'boolean', 'data' => 'int', 'help' => ""),
		'darkMode' 			=> array('title' => LAN_TRUMBOWYG_ADMIN_06, 'type' => 'boolean', 'data' => 'int', 'help' => ""),
		'trumbo_changeactivedropdownicon' => array('title' => LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON, 'type'  => 'boolean', 'data'  => 'int', 'help'  => LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON_HELP),
		'trumbo_hidebuttontexts' => array('title' => LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS, 'type'  => 'boolean', 'data'  => 'int', 'help'  => LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS_HELP),
		'trumbo_semantic'            => array('title' => LAN_TRUMBOWYG_SEMANTIC, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_SEMANTIC_HELP),
		'trumbo_resetcss'            => array('title' => LAN_TRUMBOWYG_RESET_CSS, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_RESET_CSS_HELP),
		'trumbo_autogrow'            => array('title' => LAN_TRUMBOWYG_AUTOGROW, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_AUTOGROW_HELP),
		'trumbo_imagewidthmodaledit' => array('title' => LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT_HELP),
		'trumbo_urlprotocol'         => array('title' => LAN_TRUMBOWYG_URL_PROTOCOL, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_URL_PROTOCOL_HELP),
		'trumbo_linktargets'         => array('title' => LAN_TRUMBOWYG_LINK_TARGETS, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_LINK_TARGETS_HELP),
		'trumbo_minimallinks'        => array('title' => LAN_TRUMBOWYG_MINIMAL_LINKS, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_MINIMAL_LINKS_HELP),


	);

	public function renderHelp()
	{
		$caption = LAN_HELP;
		$text = '';
		$text .= "<b>" . LAN_TRUMBOWYG_ADMIN_04 . "</b><br>" . LAN_TRUMBOWYG_ADMIN_04_HELP . "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON . "</b><br>" . LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON_HELP . "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS . "</b><br>" . LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS_HELP . "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_SEMANTIC . "</b><br>" . LAN_TRUMBOWYG_SEMANTIC_HELP . "<br>" . LAN_TRUMBOWYG_SEMANTIC_HELP2
			. "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_REMOVEFORMAT_PASTED . "</b><br>" . LAN_TRUMBOWYG_REMOVEFORMAT_PASTED_HELP .
			"<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_RESET_CSS . "</b><br>" . LAN_TRUMBOWYG_RESET_CSS_HELP . "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_AUTOGROW . "</b><br>" . LAN_TRUMBOWYG_AUTOGROW_HELP .
			"<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT . "</b><br>" . LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT_HELP .
			"<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_URL_PROTOCOL . "</b><br>" . LAN_TRUMBOWYG_URL_PROTOCOL_HELP .
			"<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_LINK_TARGETS . "</b><br>" . LAN_TRUMBOWYG_LINK_TARGETS_HELP .
			"<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_MINIMAL_LINKS . "</b><br>" . LAN_TRUMBOWYG_MINIMAL_LINKS_HELP .
			"<br><hr>";
		// $text .= "<b>" . LAN_TRUMBOWYG_TAGS_TO_REMOVE . "</b><br>" . LAN_TRUMBOWYG_TAGS_TO_REMOVE_HELP . "<br>";
		// $text .= "<b>" . LAN_TRUMBOWYG_TAGS_TO_KEEP . "</b><br>" . LAN_TRUMBOWYG_TAGS_TO_KEEP_HELP . "<br>";




		return array('caption' => $caption, 'text' => $text);
	}


	function init()
	{

		//Note for Alex: I use this way to see at first look what is set differently than default plugin generated code 

		$this->prefs['trumbowyg_semantic']['writeParms']['inverse'] = 1;
	}
}

class trumbowyg_plugins_ui extends e_admin_ui
{
	protected $pluginTitle = LAN_PLUGIN_TRUMBOWYG_NAME;
	protected $pluginName = "trumbowyg";

	protected $preftabs				= array(0 =>  'Available plugins');
	/**
	 * @var array
	 */



	public function renderHelp()
	{
		$caption = LAN_HELP;
		$plugins = plugin_trumbowyg_configuration::getAvailablePlugins();

		$text = '';

		// Loop through each plugin directory and generate help text dynamically
		foreach ($plugins as $plugin)
		{
			// Generate help text for each plugin
			$text .= "<b>" . constant('LAN_TRUMBOWYG_PLUGIN_' . strtoupper($plugin)) . "</b><br>";
			$text .= constant('LAN_TRUMBOWYG_PLUGIN_' . strtoupper($plugin) . '_HELP') . "<br><hr>";
		}


		return array('caption' => $caption, 'text' => $text);
	}



	function init()
	{

		$plugins = plugin_trumbowyg_configuration::getAvailablePlugins();

		// Initialize an empty preferences array
		$prefs = array();

		// Loop through each plugin directory and create preferences dynamically
		foreach ($plugins as $plugin)
		{
			$pluginKey = 'plugin_' . $plugin; // e.g. plugin_fontsize, plugin_fontfamily, etc.

			// Create the preference entry for each plugin
			$prefs[$pluginKey] = array(
				'title' => constant('LAN_TRUMBOWYG_PLUGIN_' . strtoupper($plugin)), // Using LAN_TRUMBOWYG_PLUGIN_<PLUGINNAME>
				'type' => 'boolean',
				'data' => 'int',
				'help' => constant('LAN_TRUMBOWYG_PLUGIN_' . strtoupper($plugin) . '_HELP'), // Using LAN_TRUMBOWYG_PLUGIN_<PLUGINNAME>_HELP
				'tab' => 0
			);
		}

		$this->prefs = $prefs;
	}
}



class trumbowyg_tagclasses_ui extends trumbowyg_admin_ui
{
	protected $prefs = array(

		'tagClasses'                => array(
			'type' => 'method',
			'data' => 'json',
			'tab' => 0,
			'width' => 'auto',
			'help' => '',
			'readParms' =>  array(),
			'writeParms' =>  array('nolabel' => 1),
			'class' => 'left',
			'thclass' => 'left',
			'filter' => false,
			'batch' => false,
		),

	);

	public function renderHelp()
	{
		$caption = LAN_HELP;
		$text = '';
		$text .= "<b>" . LAN_TRUMBOWYG_TAG_CLASSES . "</b><br>" . LAN_TRUMBOWYG_TAG_CLASSES_HELP;

		return array('caption' => $caption, 'text' => $text);
	}
}


class trumbowyg_tags_ui extends trumbowyg_admin_ui
{
	protected $prefs = array(

		'removeformatpasted' => array('title' => LAN_TRUMBOWYG_REMOVEFORMAT_PASTED, 'type' => 'boolean', 'data' => 'int', 'tab' => 0),
		'tagsToRemove'  => array('title' => LAN_TRUMBOWYG_TAGS_TO_REMOVE, 'type' => 'tags', 'data' => 'str', 'tab' => 0),
		'tagsToKeep'    => array('title' => LAN_TRUMBOWYG_TAGS_TO_KEEP, 'type' => 'tags', 'data' => 'str', 'tab' => 0),

		'allowtagsfrompaste'   => array('title' => LAN_TRUMBOWYG_ALLOWED_TAGS, 'type' => 'tags', 'data' => 'str', 'tab' => 0)
	);


	public function renderHelp()
	{
		$caption = LAN_HELP;
		$text = '';
		$text .= "<b>" . LAN_TRUMBOWYG_REMOVEFORMAT_PASTED . "</b><br>" . LAN_TRUMBOWYG_REMOVEFORMAT_PASTED_HELP;
		$text .= "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_TAGS_TO_REMOVE . "</b><br>" . LAN_TRUMBOWYG_TAGS_TO_REMOVE_HELP;
		$text .= "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_TAGS_TO_KEEP . "</b><br>" . LAN_TRUMBOWYG_TAGS_TO_KEEP_HELP;

		$text .= "<br>";
		$text .= "<b>" . LAN_TRUMBOWYG_ALLOWED_TAGS . "</b><br>" . LAN_TRUMBOWYG_ALLOWED_TAGS_HELP;

		$text .= "<br>";
		return array('caption' => $caption, 'text' => $text);
	}
}


/**
 * Class metatag_admin_form_ui.
 */
class trumbowyg_admin_form_ui extends e_admin_form_ui
{

	function tagClasses($curVal, $mode)
	{
		$text =  "";


		$semantic =  plugin_trumbowyg_configuration::getDefaultPrefs('tagClasses');



		$text .= "<div class='e-container'>";
		$text .= "<table class='table table-striped table-bordered' style='margin-bottom:40px'>
            <colgroup>
                <col style='min-width:150px' />
                <col style='min-width:150px' />
                <col style='width:auto' />
            </colgroup>";

		$text .= "<tr>
            <th>HTML Tag </th>
            <th>Add classdx  to tag)</th>
          
          </tr>";

		foreach ($semantic as $key => $sc)
		{
			$field = array('type' => 'text', 'writeParms' =>  ['size' => 'small']);

			$actual_value = isset($curVal) ? $curVal[$key] : '';

			$text .= "<tr>";
			// Key is readonly
			$text .= "<td> " . $key . "</td>";
			$text .= "<td>";
			$text .= $this->renderElement('tagClasses[' . $key . ']', $actual_value, $field);

			$text .= "<td>";

			//     <button type='button' class='btn btn-danger btn-sm remove-row'>Remove</button>
			//   </td>";
			$text .= "</tr>";
		}

		// Add Row Button
		$text .= "<tr>
                <td colspan='3'>
				<input type='submit' class='btn btn-primary btn-sm' name='tagClasses-reset' value='Reset classses'/>
            </td>       
          </tr>";



		$text .= "</table>";
		$text .= "</div>";
		return $text;
	}

	function semantic($curVal, $mode)
	{
		$text =  "";

		$available  =  e107::pref('trumbowyg', 'trumbowyg_semantic');  //reverse
		if ($available)
		{
			$text = e107::getMessage()->addWarning(LAN_TRUMBOWYG_ADMIN_02)->render();
		}
		$semantic =  plugin_trumbowyg_configuration::getDefaultPrefs('semantic');



		$text .= "<div class='e-container'>";
		$text .= "<table class='table table-striped table-bordered' style='margin-bottom:40px'>
            <colgroup>
                <col style='min-width:150px' />
                <col style='min-width:150px' />
                <col style='width:auto' />
            </colgroup>";

		$text .= "<tr>
            <th>HTML Tag (Key)</th>
            <th>Replacement Tag (Value)</th>
          
          </tr>";

		foreach ($semantic as $key => $sc)
		{
			$field = array('type' => 'text', 'writeParms' =>  ['size' => 'small']);

			$actual_value = isset($curVal) ? $curVal[$key] : '';

			$text .= "<tr>";
			// Key is readonly
			$text .= "<td> " . $key . "</td>";
			$text .= "<td>";
			$text .= $this->renderElement('semantic[' . $key . ']', $actual_value, $field);

			$text .= "<td>";

			//     <button type='button' class='btn btn-danger btn-sm remove-row'>Remove</button>
			//   </td>";
			$text .= "</tr>";
		}

		// Add Row Button
		$text .= "<tr>
                <td colspan='3'>
				<input type='submit' class='btn btn-primary btn-sm' name='semantic-default' value='Set Defaults'/>
            </td>       
          </tr>";



		$text .= "</table>";
		$text .= "</div>";
		return $text;
	}
}
