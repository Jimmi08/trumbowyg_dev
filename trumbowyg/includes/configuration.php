 <?php

	// inlineElementsSelector: 'a,abbr,acronym,b,caption,cite,code,col,dfn,dir,dt,dd,em,font,hr,i,kbd,li,q,span,strikeout,strong,sub,sup,u',


	/**
	 * Class plugin_trumbowyg_configuration.
	 */
	class plugin_trumbowyg_configuration
	{


		private static $semantic = array(
			'b' => 'strong',
			'i' => 'em',
			's' => 'del',
			'strike' => 'del',
			'div' => 'p'
		);


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

		private static $defaults = [];
		private static $availablePlugins = [];

		function __construct()
		{

			// Define the path to the plugins directory
			$pluginsDir = e_PLUGIN . "trumbowyg/dist/plugins/";

			// List of plugins to skip
			$skippedPlugins = ['mention', 'giphy','mathml', 'upload'];

			// Get all files and directories in the 'plugins' directory
			$allFiles = scandir($pluginsDir);

			// Initialize arrays to store the filtered plugins and skipped plugins
			$plugins = [];

			// Filter only directories, exclude . and .. entries
			foreach ($allFiles as $item)
			{
				if (
					is_dir($pluginsDir . $item) && $item !== '.' && $item !== '..'
				)
				{
					if (in_array($item, $skippedPlugins))
					{
						continue;
					}
					else
					{
						$plugins[] = $item; // Add to available plugins list
					}
				}
			}

			self::$availablePlugins = $plugins;
		}


		public static function getAvailablePlugins($key = null)
		{

			return self::$availablePlugins;
		}

		public static function getDefaultPrefs($key = null)
		{

			// Merge the flattened buttons array into the defaults

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

			// merge = true for non core plugins
			$buttonpane = e107::getTemplate('trumbowyg', 'buttonpane', NULL, 'front', true);

			if (deftrue('e_TRUMBOWYG_TEMPLATE'))
			{
				$bt = $buttonpane[e_TRUMBOWYG_TEMPLATE];
			}

			if (USER)
			{
				$level = "member";
			}
			else
			{
				$level = "public";
			}

			if (e_ADMIN_AREA)
			{

				if (getperms('0'))
				{
					$level = "mainadmin";
				}
				elseif (ADMIN)
				{
					$level = "admin";
				}
			}
			$bl =  $buttonpane[$level];

			if (is_null($bt))
			{
				$btns = $bl;
				return $btns;
			}

			if (empty($bt))
			{
			}
			// Step 1: Flatten $bl into a single array
			$bl_flattened = array_merge(...$bl);

			// Step 2: Filter $bt to retain only values present in $bl_flattened
			$filtered_bt = array_map(function ($subarray) use ($bl_flattened)
			{
				return array_values(array_intersect($subarray, $bl_flattened));
			}, $bt);

			// Step 3: Remove empty subarrays from $filtered_bt
			$btns = array_filter($filtered_bt);
			return $btns;
		}

		public static function getSettings()
		{
			$pluginPrefs  = e107::pref('trumbowyg');


			// Merge into defaults
			$settings = self::$defaults;

			//buttons
			$b = (bool) $pluginPrefs['trumbowyg_btns'];
			if ($b)
			{  //override only in this case
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


			$t = (bool) $pluginPrefs['linkTargets'];
			if ($t)
			{  //override only in this case
				$settings['linkTargets'] = ['_blank', '_self'];
			}


			$tagClasses = self::tagClasses();

			$settings['changeActiveDropdownIcon']  =  (bool) $pluginPrefs['changeActiveDropdownIcon'];
			$settings['hideButtonTexts'] =	(bool) $pluginPrefs['hideButtonTexts'];
			$settings['resetcss'] =	(bool) $pluginPrefs['resetcss'];
			$settings['removeformatPasted'] = $pluginPrefs['allowtagsfrompaste'];
			$settings['autogrow'] =	(bool) $pluginPrefs['autogrow'];
			$settings['imageWidthModalEdit'] =	(bool) $pluginPrefs['imageWidthModalEdit'];
			$settings['urlProtocol'] =	(bool) $pluginPrefs['urlProtocol'];
			$settings['minimalLinks'] =	(bool) $pluginPrefs['minimalLinks'];



			$settings['tagClasses'] = $tagClasses;
			$tagsToRemove = $pluginPrefs['tagsToRemove'];
			$settings['tagsToRemove'] = explode(',', $tagsToRemove);

			$tagsToKeep = $pluginPrefs['tagsToKeep'];
			$settings['tagsToKeep'] = explode(',', $tagsToKeep);


			$plugins = self::$availablePlugins;

			$config = e107::getTemplate('trumbowyg', 'plugins', NULL, 'front', false);

			// Loop through plugins to dynamically include scripts
			foreach ($plugins as $plugin)
			{

				$prefKey = "plugin_{$plugin}"; // Generate the preference key
				if (!empty($pluginPrefs[$prefKey]))
				{


					if (!empty($config[$plugin]))
					{
						$pluginkey  = $plugin;
						if ($plugin == "template") $pluginkey = "templates";
						$settings['plugins'][$pluginkey] = $config[$plugin];
					}
				}
			}

			$a = (bool) $pluginPrefs['plugin_allowtagsfrompaste'];
			if ($a)
			{
				$allowedtags =  $pluginPrefs['allowtagsfrompaste'];
				$settings['plugins']['allowTagsFromPaste']['allowedTags'] = explode(',', $allowedtags);
				unset($settings['tagsToKeep']);
				unset($settings['tagsToRemove']);
			}

			$c = (bool) $pluginPrefs['plugin_colors'];

			if ($c)
			{

				if (!empty($config['colorLabels']))
				{
					$colorlabels = $config['colorLabels'];
					$inlinecode = ' var colorLabels = ' .
						json_encode($colorlabels, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '; ';

					$inlinecode .= ' $.each(colorLabels, function(colorHexCode, colorLabel) {
						$.trumbowyg.langs.en[colorHexCode] = colorLabel;
					})';

					e107::js('header-inline', $inlinecode, 'jquery', 1);
				}
			}

			return $settings;
		}
	}
