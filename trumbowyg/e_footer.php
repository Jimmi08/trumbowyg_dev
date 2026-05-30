<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2015 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

if (!defined('e107_INIT'))
{
	exit;
}

$pref = e107::getPref();
$pluginPrefs = e107::pref('trumbowyg');
$enableOn =  (int) varset($pluginPrefs['enableEditor'], 1);
$darkmode =  (int) varset($pluginPrefs['darkMode'], 0);

$min = '';

if ($enableOn)
{

	if ((e107::wysiwyg(null, true) === 'trumbowyg' && check_class($pref['post_html'])) || strpos(e_SELF, "trumbowyg/admin_config.php"))
	{

		new plugin_trumbowyg_configuration;
		
		if ($pluginPrefs['plugin_highlight'])
		{

			e107::js('trumbowyg', 'vendors/prism/prism.min.js', "jquery", 1);
			e107::js('trumbowyg', 'vendors/prism/plugins/line-highlight/prism-line-highlight.min.js', "jquery", 1);
		}

		if ($pluginPrefs['plugin_resizimg'])
		{

			e107::js('trumbowyg', 'vendors/jquery-resizable/jquery-resizable.min.js', "jquery", 1);
		}


		$code = '
		:root {
			--tbw-cell-vertical-padding: 4px;
			--tbw-cell-horizontal-padding: 8px;
			--tbw-cell-line-height: 1.5em;
		}

		.trumbowyg-editor table {
			margin-bottom: var(--tbw-cell-line-height);
		}

		.trumbowyg-editor th,
		.trumbowyg-editor td {
			height: calc(var(--tbw-cell-vertical-padding) * 2 + var(--tbw-cell-line-height));
			min-width: calc(var(--tbw-cell-horizontal-padding) * 2);
			padding: var(--tbw-cell-vertical-padding) var(--tbw-cell-horizontal-padding);
			border: 1px solid #e7eaec;
		}
		';

		e107::css('inline', $code);


		$min = '';
		$css = 'css/';

		e107::css("trumbowyg",  "dist/ui/trumbowyg{$min}.css");

		e107::js("footer", e_PLUGIN . "trumbowyg/dist/trumbowyg{$min}.js", "jquery", 1);

		$el = plugin_trumbowyg_configuration::getLangs();

		$lang = CORE_LC;
		if (!isset($el[$lang]))
		{
			$lang = "en";
		}

		e107::js("footer", e_PLUGIN . "trumbowyg/dist/langs/{$lang}{$min}.js", "jquery", 1);

		$cssPlugins = ['colors', 'table', 'highlight', 'specialchars', 'emoji', 'e107mm'];

		foreach ($cssPlugins as $key)
		{
			if ($pluginPrefs['plugin_' . $key])
			{
				e107::css("trumbowyg", "dist/plugins/{$key}/ui/{$css}trumbowyg.{$key}{$min}.css");
			}
		}


		$plugins = plugin_trumbowyg_configuration::getAvailablePlugins();

		// Loop through plugins to dynamically include scripts
		foreach ($plugins as $plugin)
		{
			$prefKey = "plugin_{$plugin}"; // Generate the preference key
			if (!empty($pluginPrefs[$prefKey]))
			{
				e107::js('footer', e_PLUGIN . "trumbowyg/dist/plugins/{$plugin}/trumbowyg.{$plugin}{$min}.js", 'jquery', 1);
			}
		}

		if ($pluginPrefs['plugin_colors'])
		{

			$at = e107::getTemplate('trumbowyg', 'colors', NULL, 'front', false);
			if ($at['colorLabels'])
			{
				$colorlabels = $at['colorLabels'];
				$inlinecode = ' var colorLabels = ' .
					json_encode($colorlabels, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '; ';

				$inlinecode .= ' $.each(colorLabels, function(colorHexCode, colorLabel) {
						$.trumbowyg.langs.en[colorHexCode] = colorLabel;
					})';

				e107::js('footer-inline', $inlinecode, 'jquery', 1);
			}
		}

		$trumbowygSettings = plugin_trumbowyg_configuration::getSettings();

		// Convert to JSON for JavaScript
		if (e_DEBUG)
		{
			$jsonSettings = json_encode($trumbowygSettings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
		}
		else
		{
			$jsonSettings = json_encode($trumbowygSettings,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
		}
		// Convert JSON to a JavaScript-like object
		$javascriptSettings = preg_replace('/"([^"]+)":/', '$1:', $jsonSettings);

		$trumbowygScript = <<<JS
			$('.e-wysiwyg').trumbowyg($javascriptSettings);
		JS;

		// Inject JavaScript
		e107::js('footer-inline',$trumbowygScript, 'jquery', 5);

		if ($darkmode)
		{
			// Select the existing Trumbowyg editor element
			$darkmodeCode = "document.querySelectorAll('.trumbowyg-box').forEach(editor => {
				if (!editor || editor.dataset.wrapped) return;
					const wrapper = document.createElement('div');
						wrapper.className = 'trumbowyg-dark';
							editor.parentNode.replaceChild(wrapper, editor);
								wrapper.appendChild(editor);
									editor.dataset.wrapped = '1';
			});";

			e107::js('footer-inline', $darkmodeCode, 'jquery', 5);
		}
	}
}
