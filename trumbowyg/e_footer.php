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

 
if($enableOn) {


	if ((e107::wysiwyg(null, true) === 'trumbowyg' && check_class($pref['post_html'])) || strpos(e_SELF, "trumbowyg/admin_config.php"))
	{
		e107::css('trumbowyg',  'vendor/ui/trumbowyg.min.css');
		 
		if ($pluginPrefs['plugin_colors'])
		{
			e107::css('trumbowyg', "vendor/plugins/colors/ui/trumbowyg.colors.min.css");
		}

 
		e107::js('footer', e_PLUGIN . 'trumbowyg/dist/trumbowyg.min.js', 'jquery', 1);

		

		if ($pluginPrefs['plugin_allowtagsfrompaste']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/allowtagsfrompaste/trumbowyg.allowtagsfrompaste.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_base64']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/base64/trumbowyg.base64.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_emoji']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/emoji/trumbowyg.emoji.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_cleanpaste']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/cleanpaste/trumbowyg.cleanpaste.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_history']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/history/trumbowyg.history.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_indent']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/indent/trumbowyg.indent.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_insertaudio']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/insertaudio/trumbowyg.insertaudio.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_noembed']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/noembed/trumbowyg.noembed.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_pasteembed']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/pasteembed/trumbowyg.pasteembed.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_pasteimage']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/pasteimage/trumbowyg.pasteimage.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_preformatted']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/preformatted/trumbowyg.preformatted.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_ruby']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/ruby/trumbowyg.ruby.min.js", 'jquery', 1);
		if ($pluginPrefs['plugin_specialchars']) e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/specialchars/trumbowyg.specialchars.min.js", 'jquery', 1);


		if ($pluginPrefs['plugin_fontsize'])
		{
			e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/fontsize/trumbowyg.fontsize.min.js", 'jquery', 1);
		}

		if ($pluginPrefs['plugin_fontfamily'])
		{
			e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/fontfamily/trumbowyg.fontfamily.min.js", 'jquery', 1);
		}

		if ($pluginPrefs['plugin_colors'])
		{
			e107::js('footer', e_PLUGIN . "trumbowyg/vendor/plugins/colors/trumbowyg.colors.min.js", 'jquery', 1);

			$at = e107::getTemplate('trumbowyg', 'colors');
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
		$jsonSettings = json_encode($trumbowygSettings, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
 
		/* customization */



		// Inject JavaScript
		e107::js('footer-inline', "
				$('.e-wysiwyg').trumbowyg($jsonSettings);
				", 'jquery', 1);
		print_a($jsonSettings);		
	}
}
 
