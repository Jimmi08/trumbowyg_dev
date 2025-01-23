<?php

/**
 * @file
 * Addon file for extending e_parser.
 */

if(!defined('e107_INIT'))
{
	exit;
}
 
/**
 * Class trumbowyg_parse.
 */
class trumbowyg_parse
{

	/**
	 * Plugin preferences.
	 *
	 * @var array
	 */
	private $plugPrefs = array();

	/**
	 * Core preferences.
	 *
	 * @var array
	 */
	private $corePrefs = array();

	/**
	 * Constructor.
	 */
	function __construct()
	{
		$this->plugPrefs = e107::getPlugConfig('trumbowyg')->getPref();
		$this->corePrefs = e107::getPref();
	}


	/**
	 * @param string $text
	 *  HTML/text to be processed.
	 * @param string $context
	 *  Current context ie:
	 *  OLDDEFAULT | BODY | TITLE | SUMMARY | DESCRIPTION | WYSIWYG
	 *
	 * @return string
	 */
	function toHtml($text, $context = '')
	{
		return $text;
	}


	/**
	 * @param string $text
	 *  HTML/text to be processed.
	 * @param array $param
	 *
	 * @return string
	 */
	function toDB($text, $param = array())
	{
		/*
		Array
		(
			[nostrip] => 
			[noencode] => 1
			[type] => method
			[field] => news_body
		)
		*/

		$type = varset($param['type'], '');
		$field = varset($param['field'], '');

		if ($type == 'bbarea')
		{
			return '[html]' . $text . '[/[html]';
		}

		$fields = array(
			'news_body',
			'news_extended',
		);

		if (in_array($field, $fields) && $type == 'method')
		{
			return '[html]' . $text . '[/html]';
		}

		return $text;
	}

	/**
	 * @param string $text
	 *  HTML/text to be processed.
	 * @param array $param
	 *
	 * @return string
	 */
	function toWYSIWYG($text, $param = array())
	{
		$tp = e107::getParser();

		// If TrumboWYG is not in use, we returns with the original text.
		if (!$this->trumboWYGisInUse())
		{
			return $text;
		}
 
		$isHtml = false;
		$content = $text;
		$content 		= str_replace("{e_BASE}", e_HTTP, $content); // We want {e_BASE} in the final data going to the DB, but not the editor.
		$srch 			= array("<!-- bbcode-html-start -->", "<!-- bbcode-html-end -->", "[html]", "[/html]");
		$content 		= str_replace($srch, "", $content);
		$content 		= $tp->parseBBTags($content, true); // parse the <bbcode> tag so we see the HTML equivalent while editing!
		$content 		= e107::getBB()->parseBBCodes($content);

		$text = $content;

		// Convert special HTML entities back to characters.
		$text = htmlspecialchars_decode($text);

		// Remove HTML comments.
		$text = preg_replace('/<!--(.*)-->/Uis', '', $text);

		if(empty($text)) $text = "&nbsp;";  //to replace content see #5408
 ;
		return $text;
	}

	/**
	 * Checking whether $string is HTML or not.
	 *
	 * @param string $string
	 *  String to be checked.
	 *
	 * @return bool
	 *  True if the string contains HTML, otherwise false.
	 */
	function isHTML($string)
	{
		if ($string != strip_tags($string))
		{
			return true;
		}

		return preg_match("/<[^<]+>/", $string, $m) != 0;
	}

	/**
	 * Checking whether TrumboWYG Editor is in use or not.
	 *
	 * @return bool
	 *  If true, need to convert HTML to Markdown format. Otherwise false.
	 */
	function trumboWYGisInUse()
	{
		$enableOn = (int) varset($this->plugPrefs['enableEditor'], 1);

		$enable = false;

		// "Enable Markdown Editor in Admin Area and on Frontend too"
		if (!$enable && $enableOn === 1)
		{
			$enable = true;
		}

		// "Enable Markdown Editor only in Admin Area"
		if (!$enable && $enableOn === 2 && deftrue('e_ADMIN_AREA', false))
		{
			$enable = true;
		}

		// "Enable Markdown Editor only on Frontend"
		if (!$enable && $enableOn === 3 && !deftrue('e_ADMIN_AREA', false))
		{
			$enable = true;
		}

		if ($enable === true && e107::wysiwyg() === true && check_class($this->corePrefs['post_html']))
		{
			return true;
		}

		return false;
	}

}
