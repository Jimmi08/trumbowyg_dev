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


		private static $defaults = [];
		private static $availablePlugins = [];
		private static $availableLangs = [];


		function __construct()
		{

			// Define the path to the plugins directory
			$pluginsDir = e_PLUGIN . "trumbowyg/dist/plugins/";

			// List of plugins to skip
			$skippedPlugins = ['mention', 'giphy', 'mathml', 'upload'];

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

			// Define the path to the lans directory
			$pluginsDir = e_PLUGIN . "trumbowyg/dist/langs/";

			// Get all files and directories in the 'plugins' directory
			$allFiles = scandir($pluginsDir);
			$languages = [];
			foreach ($allFiles as $file)
			{
				if (preg_match('/^([a-z]{2})\.(min\.)?js$/', $file, $matches))
				{
					$languages[$matches[1]] = $matches[1]; // Add key-value pair
				}
			}

			$el = e107::getLanguage()->getList();

			$tl = array_intersect_key($languages, $el);

			self::$availableLangs = $tl;
		}



		public static  function getLangs()
		{
			return self::$availableLangs;
		}



		public static function getAvailablePlugins($key = null)
		{

			return self::$availablePlugins;
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
 ;
			if (is_null($bt))
			{
				$btns = $bl;
				return $btns;
			}

			if (empty($bt))
			{
				$btns = $bt;  //just saving time, result bellow is the same
				return $btns;
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

			/* set language */
			$el = self::getLangs();

			$lang = CORE_LC;

			// Merge into defaults
			$settings = self::$defaults;

			if (!isset($el[$lang]))
			{
				$lang = "en";
			}
			$settings['lang'] = $lang;

			/* set options - load from template if possible, override with plugin prefs */
			/* trumbowyg_semantic */

			$options = e107::getTemplate('trumbowyg', 'options', NULL, 'front', false);
			foreach ($options as $key => $plugin)
			{
				$settings[$key] = $plugin;
			}

			//semantic reverse
			$s = (bool) e107::pref('trumbowyg', 'trumbowyg_semantic');
			if (!$s) $settings['semantic'] = $options['semantic'];
			else unset($settings['semantic']);

			$t = (bool) e107::pref('trumbowyg', 'trumbowyg_linktargets');
			if ($t) $settings['linkTargets'] = $options['linktargets'];
			else unset($settings['linkTargets']);

			$t = (bool) e107::pref('trumbowyg', 'trumbowyg_tagclasses');
			if ($t) $settings['tagClasses'] = $options['tagclasses'];
			else unset($settings['tagClasses']);

			$settings['minimalLinks'] =	(bool) $pluginPrefs['trumbowyg_minimallinks'];
			$settings['changeActiveDropdownIcon']  =  (bool) $pluginPrefs['trumbo_changeactivedropdownicon'];
			$settings['hideButtonTexts'] =	(bool) $pluginPrefs['trumbo_hidebuttontexts'];
			$settings['resetcss'] =	(bool) $pluginPrefs['trumbo_resetcss'];
			$settings['autogrow'] =	(bool) $pluginPrefs['trumbo_autogrow'];
			$settings['imageWidthModalEdit'] =	(bool) $pluginPrefs['trumbo_imagewidthmodaledit'];
			$settings['urlProtocol'] =	(bool) $pluginPrefs['trumbo_urlprotocol'];

			/* allowed tags */
			$settings['removeformatPasted'] = $pluginPrefs['allowtagsfrompaste'];

			$tagsToRemove = $pluginPrefs['tagsToRemove'];
			$settings['tagsToRemove'] = explode(',', $tagsToRemove);

			$tagsToKeep = $pluginPrefs['tagsToKeep'];
			$settings['tagsToKeep'] = explode(',', $tagsToKeep);


			/* set buttons */
			$btns = self::buttonPane();
			$settings['btns'] = $btns;

			/* set plugins */
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
					else $settings['plugins'][$plugin] = array();

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


			/* set advanced code for plugins */
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
