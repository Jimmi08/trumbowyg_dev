 <?php

// inlineElementsSelector: 'a,abbr,acronym,b,caption,cite,code,col,dfn,dir,dt,dd,em,font,hr,i,kbd,li,q,span,strikeout,strong,sub,sup,u',


	/**
	 * Class plugin_trumbowyg_configuration.
	 */
	class plugin_trumbowyg_configuration
	{

		// Define the default settings as a static property
		public static $defaults = [
			'btns' => [], // Customize toolbar buttons as needed
			'semantic' => true, // Use semantic elements like <strong> and <em>
			'removeformatPasted' => false, // Retain formatting when pasting content
			'resetCss' => false, // Do not apply reset CSS to the editor
			'autogrow' => false, // Disable auto-growing of the editor
			'imageWidthModalEdit' => false, // Disable image width editing in modal
			'urlProtocol' => false, // Do not auto-prefix URLs with a protocol
			'minimalLinks' => false, // Use full link options in the modal
			'tagsToRemove' => [], // No tags are removed by default
			'tagsToKeep' => ['hr', 'img', 'embed', 'iframe', 'input'], // Default tags to keep
			'tagClasses' => [], // No additional classes are applied to tags
			'changeActiveDropdownIcon' => false,
			'hideButtonTexts' => false,
		];

		// Define additional buttons or other settings
		private static $defaultButtonPane = [
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

		private static $semantic = array(
			'b' => 'strong',
			'i' => 'em',
			's' => 'del',
			'strike' => 'del',
			'div' => 'p'
		);

		// Define groups and their corresponding buttons
		private static $fullButtonPane = [
			['viewHTML'],
			['undo', 'redo'], // Only supported in Blink browsers
			['historyUndo', 'historyRedo'],
			['formatting'],
			['fontfamily'],
			['fontsize'],
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
			['table', 'tableCellBackgroundColor', 'tableBorderColor'],
			['preformatted'],
			['template'],
			['removeformat'],
			['fullscreen']
		];

		private static 	$tagClasses = array(
				"h1" => "",
				"h2" => "",
				"h3" => "",
				"h4" => "",
				"h5" => "",
				"h6" => "",
				"p" => "",
				"b" => "",
				"strong" => "",
				"i" => "",
				"em" => "",
				"u" => "",
				"s" => "",
				"ul" => "",
				"ol" => "",
				"li" => "",
				"blockquote" => "",
				"pre" => "",
				"code" => "",
				"table" => "",
				"thead" => "",
				"tbody" => "",
				"tr" => "",
				"th" => "",
				"td" => "",
				"img" => "",
				"figure" => "",
				"figcaption" => "",
				"a" => "",
				"div" => "",
				"span" => "",
				"br" => "",
				"hr" => ""
			);

		private static $defaultButtonsKeys = [];
		private static $fullButtonsKeys = [];

		function __construct()
		{
			// Flatten the multi-dimensional $buttons array into a one-dimensional array
			$defaultButtons= call_user_func_array('array_merge', self::$defaultButtonPane);
			// Convert the flattened array to an associative array where key = value
			self::$defaultButtonsKeys = array_combine($defaultButtons, $defaultButtons);

			// Flatten the multi-dimensional $buttons array into a one-dimensional array
			$fullButtons = call_user_func_array('array_merge', self::$fullButtonPane);
			// Convert the flattened array to an associative array where key = value
			self::$fullButtonsKeys = array_combine($fullButtons, $fullButtons);

		}

 
		// Method to get the default settings needed for preferences one dimensional array

		public static function getDefaultPrefs($key = null)
		{
 
			// Merge the flattened buttons array into the defaults
			self::$defaults['btns'] = self::$defaultButtonsKeys;
			self::$defaults['semantic'] = self::$semantic;
			self::$defaults['tagClasses'] = self::$tagClasses;

			// If a key is provided, return the specific subarray
			if (
				$key !== null && array_key_exists($key, self::$defaults)
			)
			{
				return self::$defaults[$key];
			}

			return self::$defaults;
		}

		public static function getDefaultButtonsKeys()
		{
 
			return  self::$defaultButtonsKeys;
 
		}

		public static function getFullButtonsKeys()
		{

			return  self::$fullButtonsKeys;
		}


		// Static method to handle button grouping
		public static function semantic()
		{
			$curVal = e107::pref('trumbowyg', 'semantic');
			$tmp = e107::unserialize($curVal);
			return $tmp;
		}

		public static function tagClasses()
		{
			$curVal = e107::pref('trumbowyg', 'tagClasses');
			$array = e107::unserialize($curVal);
			$array = array_filter($array, function ($value)
			{
				return $value !== ''; // Keep only keys with non-empty values
			});
	 
			return $array;
		}

		// Static method to handle button grouping
		public static function buttonPane()
		{
			$curVal = e107::pref('trumbowyg', 'btns');
			$tmp = e107::unserialize($curVal);

			$buttonGroups = self::$fullButtonPane;

			if (USER)
			{
				$level = "member";
			}
			else
			{
				$level = "public";
			}

			if(e_ADMIN_AREA) {

				if (getperms('0'))
				{
					$level= "mainadmin";
				}
				elseif (ADMIN)
				{
					$level = "admin";
				}
			}
 
			$curVal = $tmp[$level];

			if (!$curVal || !is_array($curVal))
			{
				$curVal = []; // Default to an empty array if no preferences are found
			}

			$btns = [];
			foreach ($buttonGroups as $group)
			{
				// Only include buttons that exist in $curVal
				$filteredGroup = array_values(array_intersect($group, $curVal)); // Ensure proper re-indexing
				if (!empty($filteredGroup))
				{
					$btns[] = $filteredGroup;
				}
			}

			return $btns;
		}

		public static function getSettings()
		{
			$plugPrefs  = e107::pref('trumbowyg'); 

			// Merge into defaults
			$settings = self::$defaults;
		 
			//buttons
			$b = (bool) $plugPrefs['trumbowyg_btns'];
			if($b) {  //override only in this case
				$btns = self::buttonPane();
				$settings['btns'] = $btns;	
			}
			else unset($settings['btns']);
		 
			//semantic reverse
			$s = (bool) e107::pref('trumbowyg', 'trumbowyg_semantic');
		 
			if (!$s)
			{   //override only in this case
				$semantic = self::semantic();
				$settings['semantic'] = $semantic;
			}


			$t = (bool) e107::pref('trumbowyg', 'linkTargets');
			if ($t)
			{  //override only in this case
				$settings['linkTargets'] = ['_blank', '_self'];
			}

			$tagClasses = self::tagClasses();

			$settings['changeActiveDropdownIcon']  =  (bool) e107::pref('trumbowyg', 'changeActiveDropdownIcon');
			$settings['hideButtonTexts'] =	(bool) e107::pref('trumbowyg', 'hideButtonTexts');
			$settings['resetcss'] =	(bool) e107::pref('trumbowyg', 'resetcss');
			$settings['removeformatPasted'] = $plugPrefs['allowtagsfrompaste']; 
			$settings['autogrow'] =	(bool) e107::pref('trumbowyg', 'autogrow');
			$settings['imageWidthModalEdit'] =	(bool) e107::pref('trumbowyg', 'imageWidthModalEdit');
			$settings['urlProtocol'] =	(bool) e107::pref('trumbowyg', 'urlProtocol');
			$settings['minimalLinks'] =	(bool) e107::pref('trumbowyg', 'minimalLinks');

 

			$settings['tagClasses'] = $tagClasses;
			$tagsToRemove = e107::pref('trumbowyg', 'tagsToRemove');
			$settings['tagsToRemove'] = explode(',', $tagsToRemove);

			$tagsToKeep = e107::pref('trumbowyg', 'tagsToKeep');
			$settings['tagsToKeep'] = explode(',', $tagsToKeep);
 
			$a = (bool) e107::pref('trumbowyg', 'plugin_allowtagsfrompaste');
			if ($a)
			{
				$allowedtags =  $plugPrefs['allowtagsfrompaste']; 
				$settings['plugins']['allowTagsFromPaste']['allowedTags'] = explode(',', $allowedtags);
				unset($settings['tagsToKeep']);
				unset($settings['tagsToRemove']);
	
			}

			return $settings;
		}
	}
