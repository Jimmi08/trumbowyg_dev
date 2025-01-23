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
class plugin_trumbowyg_settings extends e_admin_dispatcher
{


	protected $modes = array(
		'main' => array(
			'controller' => 'trumbowyg_admin_ui',
			'path'       => null,
			'ui'         => 'trumbowyg_admin_form_ui',
			'uipath'     => null
		),
		'btns' => array(
			'controller' => 'trumbowyg_btns_ui',
			'path'       => null,
			'ui'         => 'trumbowyg_btns_form_ui',
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

		'btns/prefs' => array(
			'caption' => LAN_TRUMBOWYG_ADMIN_NAV_01,
			'perm'    => 'P',
		),
		'semantic/prefs' => array(
			'caption' => LAN_TRUMBOWYG_ADMIN_NAV_02,
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
		'trumbowyg_btns'                => array('title' => LAN_TRUMBOWYG_BTNS, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_BTNS_HELP),
		'changeActiveDropdownIcon' => array('title' => LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON, 'type'  => 'boolean', 'data'  => 'int', 'help'  => LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON_HELP),
		'hideButtonTexts' => array('title' => LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS, 'type'  => 'boolean', 'data'  => 'int', 'help'  => LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS_HELP),
		'trumbowyg_semantic'            => array('title' => LAN_TRUMBOWYG_SEMANTIC, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_SEMANTIC_HELP),
		'trumbowyg_removeformatPasted'  => array('title' => LAN_TRUMBOWYG_REMOVEFORMAT_PASTED, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_REMOVEFORMAT_PASTED_HELP),
		'resetCss'            => array('title' => LAN_TRUMBOWYG_RESET_CSS, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_RESET_CSS_HELP),
		'autogrow'            => array('title' => LAN_TRUMBOWYG_AUTOGROW, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_AUTOGROW_HELP),
		'imageWidthModalEdit' => array('title' => LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT_HELP),
		'urlProtocol'         => array('title' => LAN_TRUMBOWYG_URL_PROTOCOL, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_URL_PROTOCOL_HELP),
		'linkTargets'         => array('title' => LAN_TRUMBOWYG_LINK_TARGETS, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_LINK_TARGETS_HELP),
		'minimalLinks'        => array('title' => LAN_TRUMBOWYG_MINIMAL_LINKS, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_MINIMAL_LINKS_HELP) 
	);

	public function renderHelp()
	{
		$caption = LAN_HELP;
		$text = '';
		$text .= "<b>" . LAN_TRUMBOWYG_BTNS . "</b><br>" . LAN_TRUMBOWYG_BTNS_HELP . "<br><hr>";
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


	/**
	 * @var array
	 */

	protected $prefs = array(
		'plugin_base64'               => array('title' => LAN_TRUMBOWYG_PLUGIN_BASE64, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_PLUGIN_BASE64_HELP),
		'plugin_cleanpaste'           => array('title' => LAN_TRUMBOWYG_PLUGIN_CLEANPASTE, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_PLUGIN_CLEANPASTE_HELP),
		'plugin_emoji'                => array('title' => LAN_TRUMBOWYG_PLUGIN_EMOJI, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_PLUGIN_EMOJI_HELP),
		'plugin_fontsize'             => array('title' => LAN_TRUMBOWYG_PLUGIN_FONTSIZE, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_PLUGIN_FONTSIZE_HELP),
		'plugin_fontfamily'           => array('title' => LAN_TRUMBOWYG_PLUGIN_FONTFAMILY, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_PLUGIN_FONTFAMILY_HELP),
		'plugin_colors'               => array('title' => LAN_TRUMBOWYG_PLUGIN_COLORS, 'type' => 'boolean', 'data' => 'int', 'help' => LAN_TRUMBOWYG_PLUGIN_COLORS_HELP),
	);


	public function renderHelp()
	{
		$caption = LAN_HELP;
		$text = '';

		$text .= "<b>" . LAN_TRUMBOWYG_PLUGIN_BASE64 . "</b><br>" . LAN_TRUMBOWYG_PLUGIN_BASE64_HELP . "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_PLUGIN_CLEANPASTE . "</b><br>" . LAN_TRUMBOWYG_PLUGIN_CLEANPASTE_HELP . "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_PLUGIN_EMOJI . "</b><br>" . LAN_TRUMBOWYG_PLUGIN_EMOJI_HELP . "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_PLUGIN_FONTSIZE . "</b><br>" . LAN_TRUMBOWYG_PLUGIN_FONTSIZE_HELP . "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_PLUGIN_FONTFAMILY . "</b><br>" . LAN_TRUMBOWYG_PLUGIN_FONTFAMILY_HELP . "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_PLUGIN_COLORS . "</b><br>" . LAN_TRUMBOWYG_PLUGIN_COLORS_HELP . "<br><hr>";

		return array('caption' => $caption, 'text' => $text);
	}



	function init()
	{

		//Note for Alex: I use this way to see at first look what is set differently than default plugin generated code 

		$this->prefs['trumbowyg_semantic']['writeParms']['inverse'] = 1;
	}
}


class trumbowyg_btns_ui extends trumbowyg_admin_ui
{
	protected $prefs = array(

		'btns'                => array(

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
		$text .= "<b>" . LAN_TRUMBOWYG_BTNS . "</b><br>" . LAN_TRUMBOWYG_BTNS_HELP;

		return array('caption' => $caption, 'text' => $text);
	}
}

class trumbowyg_semantic_ui extends trumbowyg_admin_ui
{
	protected $prefs = array(

		'semantic'                => array(

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
		$text .= "<b>" . LAN_TRUMBOWYG_SEMANTIC . "</b><br>" . LAN_TRUMBOWYG_SEMANTIC_HELP . "<br>" . LAN_TRUMBOWYG_SEMANTIC_HELP2;

		return array('caption' => $caption, 'text' => $text);
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

		'tagsToRemove'                => array(
			'title' => LAN_TRUMBOWYG_TAGS_TO_REMOVE,
			'type' => 'tags',
			'data' => 'str',
			'tab' => 0,

		),
		'tagsToKeep'                => array(
			'title' => LAN_TRUMBOWYG_TAGS_TO_KEEP,
			'type' => 'tags',
			'data' => 'str',
			'tab' => 0,

		),

	);

	public function renderHelp()
	{
		$caption = LAN_HELP;
		$text = '';
		$text .= "<b>" . LAN_TRUMBOWYG_TAGS_TO_REMOVE . "</b><br>" . LAN_TRUMBOWYG_TAGS_TO_REMOVE_HELP;
		$text .= "<br><hr>";
		$text .= "<b>" . LAN_TRUMBOWYG_TAGS_TO_KEEP . "</b><br>" . LAN_TRUMBOWYG_TAGS_TO_KEEP_HELP;
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

class trumbowyg_btns_form_ui extends e_admin_form_ui
{

	function btns($curVal, $mode)
	{
		$text =  "";

		$pluginPrefs = e107::pref('trumbowyg');

		$available  =  e107::pref('trumbowyg', 'trumbowyg_btns');

		if (!$available)
		{
			$text = e107::getMessage()->addWarning(LAN_TRUMBOWYG_ADMIN_03)->render();
		}


		$access_level = ['public' => 'Public', 'member' => "Members", 'admin' => "Admins", 'mainadmin' => ' Main admins',];

		$buttons = plugin_trumbowyg_configuration::getFullButtonsKeys(); //all buttons

		$tmp = $buttons;
		$disabled = array_fill_keys(array_keys($buttons), 1);

		$d  = plugin_trumbowyg_configuration::getDefaultButtonsKeys();

		foreach ($disabled as $key => $value)
		{
			if (in_array($key, $d))
			{  // Check if the key exists in $d array
				$disabled[$key] = 0; // Set value to 0 if key is found in $d
			}
		}

		if ($pluginPrefs['plugin_base64'])
		{
			$disabled['base64'] = 0;
		}

		if ($pluginPrefs['plugin_emoji'])
		{
			$disabled['emoji'] = 0;
		}

		if ($pluginPrefs['plugin_cleanpaste'])
		{
			$disabled['cleanpaste'] = 0;
		}

		if ($pluginPrefs['plugin_fontsize'])
		{
			$disabled['fontsize'] = 0;
		}

		if ($pluginPrefs['plugin_fontfamily'])
		{
			$disabled['fontfamily'] = 0;
		}

		if ($pluginPrefs['plugin_colors'])
		{
			$disabled['foreColor'] = 0;
			$disabled['backColor'] = 0;
		}


		foreach ($buttons as $key => $label)
		{
			if ($disabled[$key]) $buttons[$key] = "<strike>" . $label .  "</strike> [*]";
		}

		$buttons['viewHTML'] = "<i class='fa fa-code'></i> " . $buttons['viewHTML'];
		$buttons['formatting'] = "<i class='fa fa-paragraph'></i> " . $buttons['formatting'];

		$text .= "<div class='e-container'>";
		$text .= "<table class='table table-striped table-bordered' style='margin-bottom:40px'>
					<colgroup>
						<col style='min-width:300px' />
						<col style='width:auto' />
				 
					</colgroup>";

		$text .= "<tr><th>Access Level</th><th>Available buttons</th> </tr>";

		foreach ($access_level as $page => $val)
		{

			$value = $curVal[$page];

			$text .= "<tr><td><b>" . $page . ":</b><br>(" . $val . ")";

			$text .= "<div class='buttons-bar center'> Check Defaults ";
			$text .= $this->renderElement('check-' . $page, false, array('type' => 'checkbox'));
			$text .= "</div>";


			$text .= "<div class='buttons-bar center'> Uncheck all ";
			$text .= $this->renderElement('uncheck-' . $page, false, array('type' => 'checkbox'));
			$text .= "</div>";


			$text .= " 
			</td><td>";
			$field = array('type' => 'checkboxes', 'writeParms' =>  ['optArray' => $buttons, 'useKeyValues' => true, 'inline' => true]);

			$text .= $this->renderElement('btns[' . $page . '][]', $curVal[$page], $field);
			$text .= "</td><td>";
			$text .= "</td></tr>";
		}
		$text .= "</table>";
		/* Note for Alex. Sorry for inline style, fix me */
		$text .= "<style> .checkbox-inline {min-width: 300px;}
				#btns-public-container .checkbox-inline  {margin-left: 20px!important; } 
				#btns-member-container .checkbox-inline  {margin-left: 20px!important; } 
				#btns-admin-container .checkbox-inline  {margin-left: 20px!important; } 
				#btns-mainadmin-container .checkbox-inline  {margin-left: 20px!important; } 
				</style>";
		return $text;
	}
}
