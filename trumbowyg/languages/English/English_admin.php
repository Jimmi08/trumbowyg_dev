<?php

/**
 * @file
 * Language file for "trumbowyg" plugin.
 */

define("LAN_TRUMBOWYG_ADMIN_NAV_00", "Settings");
define("LAN_TRUMBOWYG_ADMIN_NAV_01", "Button pane");
define("LAN_TRUMBOWYG_ADMIN_NAV_02", "Semantic");
define("LAN_TRUMBOWYG_ADMIN_NAV_03", "Paste Tag Sanitization");
define("LAN_TRUMBOWYG_ADMIN_NAV_04", "Plugins");

define("LAN_TRUMBOWYG_BTNS", "Enable Custom Buttons Pane");
define("LAN_TRUMBOWYG_SEMANTIC", "Disable Default Semantic Code");
define("LAN_TRUMBOWYG_REMOVEFORMAT_PASTED", "Remove Format on Pasted Content");
define("LAN_TRUMBOWYG_RESET_CSS", "Enable Reset CSS");
define("LAN_TRUMBOWYG_AUTOGROW", "Enable Auto Grow");
define("LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT", "Enable Image width modal edit");
define("LAN_TRUMBOWYG_URL_PROTOCOL", "Enable URL Protocol Detection");
define("LAN_TRUMBOWYG_LINK_TARGETS", "Link targets");
define("LAN_TRUMBOWYG_MINIMAL_LINKS", "Enable Minimal Links");
define("LAN_TRUMBOWYG_TAGS_TO_REMOVE", "Tags to Remove");
define("LAN_TRUMBOWYG_TAGS_TO_KEEP", "Tags to Keep");
define("LAN_TRUMBOWYG_TAG_CLASSES", "Enable Tag Classes");
define("LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON", "Change Active Dropdown Icon");

define("LAN_TRUMBOWYG_BTNS_HELP", "This setting allow you to control the buttons displayed in the Trumbowyg editor. With Off only default buttons are used for everybody.");
define("LAN_TRUMBOWYG_SEMANTIC_HELP", " Generates a better, more semantic oriented HTML (i.e. <code>&lt;em&gt;</code> instead of <code>
                &lt;i&gt;</code>, <code>&lt;strong&gt;</code> instead of <code>&lt;b&gt;</code>, etc.)");
define("LAN_TRUMBOWYG_SEMANTIC_HELP2", "You can also customize the semantic tag mapping for each one of these tags: &lt;b&gt, &lt;i&gt, &lt;s&gt, &lt;strike&gt, &lt;div&gt. <br>
Enabled semantic mode deactivates the underline button by default because they do not convey any real semantic. If you want to reactivate them, you have to do it explicitly on Button Pane. <br> 
It is applied while editing - related buttons are changed - not while parsing! "); 



define("LAN_TRUMBOWYG_REMOVEFORMAT_PASTED_HELP", "When enabled, pasted content will have formatting removed. You can override this with Tags to Remove or Tags to Keep ");
define("LAN_TRUMBOWYG_RESET_CSS_HELP", "If you don't want the page style to impact on the look of the text in the editor, you will need to apply a reset-css on the editor. You can activate");

define("LAN_TRUMBOWYG_AUTOGROW_HELP", "The text editing zone can extend itself when writing a long text. ");
define("LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT_HELP", "Adds a field in image insert/edit modal which allow users to set the image width.");
define("LAN_TRUMBOWYG_URL_PROTOCOL_HELP", "An option to auto-prefix URLs with a protocol. When this option is set to true, URLs missing a protocol will be prefixed with https://. Alternatively, a string can be provided for a custom prefix");

define("LAN_TRUMBOWYG_LINK_TARGETS_HELP", "Allow to set link target attribute value to what you want, even if the minimalLinks option is set to true. First value is the default value.");
define("LAN_TRUMBOWYG_MINIMAL_LINKS_HELP", "When enabled, only essential links will be included.");
define("LAN_TRUMBOWYG_TAGS_TO_REMOVE_HELP", "Specify which HTML tags should be removed when content is pasted or processed. Allow to sanitize the code by removing all tags you want. You must do the sanitize server-side too to avoid some security issues like XSS.");
define("LAN_TRUMBOWYG_TAGS_TO_KEEP_HELP", "Specify which HTML tags should be kept during content editing or pasting. Sometimes you want to keep some empty i tags for Font Awesome or anything else. You can define this list via the tagsToKeep option.");
define("LAN_TRUMBOWYG_TAG_CLASSES_HELP", "Enable or disable the addition of CSS classes to HTML tags in the editor.");
define("LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON_HELP", "When enabled, this setting will modify the icon of the active dropdown item to provide visual feedback.");

define("LAN_TRUMBOWYG_ALLOWED_TAGS", "Custom tag whitelist");
define("LAN_TRUMBOWYG_ALLOWED_TAGS_HELP", "Any tag pasted which is not in allowedTags list will be unwrap, only the text will be kept. ");
define("LAN_TRUMBOWYG_ALLOWED_TAGS_HELP2", "RemoveformatPasted must be set to FALSE since it was applied prior to pasteHandlers, or else it will be useless ");
define("LAN_TRUMBOWYG_ALLOWED_TAGS_HELP3", "It is most advisable to use along with the cleanpaste plugin, or else you'd end up with dirty markup. ");

define("LAN_TRUMBOWYG_ADMIN_01", "Dropdown icon can change to the active sub-button icon with this option enabled. This functionality is currently disabled. The settings will not be applied.");
define("LAN_TRUMBOWYG_ADMIN_02", "Default Semantics is not set off. These settings will not be applied.");
define("LAN_TRUMBOWYG_ADMIN_03", "Custom Button Pane is currently disabled. These settings will not be applied.");
define("LAN_TRUMBOWYG_ADMIN_04", "Enable TrumboWyg Editor");
define("LAN_TRUMBOWYG_ADMIN_04_HELP", "Disable editor if you are using/testing core tinymce editor.");
define("LAN_TRUMBOWYG_ADMIN_05", "Custom buttons are disabled. Your settings will not be applied.");



define("LAN_TRUMBOWYG_ADMIN_OPT_01", "Enabled");
define("LAN_TRUMBOWYG_ADMIN_OPT_02", "Disabled");
define("LAN_TRUMBOWYG_ADMIN_OPT_03", "Auto");




define("LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS_HELP", "When enabled, the text labels on buttons will be hidden, showing only the icons.");
define("LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS", "Hide Button Texts");

// Preference Constants

define("LAN_TRUMBOWYG_PLUGIN_BASE64", "Base64");
define("LAN_TRUMBOWYG_PLUGIN_CLEANPASTE", "Clean paste");
define("LAN_TRUMBOWYG_PLUGIN_EMOJI", "Emoji");
define("LAN_TRUMBOWYG_PLUGIN_FONTSIZE", "Font size");
define("LAN_TRUMBOWYG_PLUGIN_FONTFAMILY", "Font family");
define("LAN_TRUMBOWYG_PLUGIN_COLORS", "Colors");

define("LAN_TRUMBOWYG_PLUGIN_HISTORY", "History");
define("LAN_TRUMBOWYG_PLUGIN_INDENT", "Indent");
define("LAN_TRUMBOWYG_PLUGIN_INSERTAUDIO", "Insert audio");
define("LAN_TRUMBOWYG_PLUGIN_NOEMBED", "No embed");
define("LAN_TRUMBOWYG_PLUGIN_PASTEEMBED", "Paste embed");
define("LAN_TRUMBOWYG_PLUGIN_PASTEIMAGE", "Paste image");
define("LAN_TRUMBOWYG_PLUGIN_PREFORMATTED", "Preformatted");
define("LAN_TRUMBOWYG_PLUGIN_RUBY", "Ruby");
define("LAN_TRUMBOWYG_PLUGIN_SPECIALCHARS", "Special characters");


// Help Constants
define("LAN_TRUMBOWYG_PLUGIN_BASE64_HELP", "Base64 plugin allows you to insert images inline as base64.");
define("LAN_TRUMBOWYG_PLUGIN_CLEANPASTE_HELP", "Clean paste plugin handles paste events, cleaning the HTML code before inserting content into the editor.");
define("LAN_TRUMBOWYG_PLUGIN_EMOJI_HELP", "Emoji plugin allows you to insert emojis in your editor.");
define("LAN_TRUMBOWYG_PLUGIN_FONTSIZE_HELP", "Font size plugin lets you change the font size in the editor.");
define("LAN_TRUMBOWYG_PLUGIN_FONTFAMILY_HELP", "Font family plugin lets you change the font family in the editor.");
define("LAN_TRUMBOWYG_PLUGIN_COLORS_HELP", "Colors plugin allows you to apply color to text in the editor.");

define("LAN_TRUMBOWYG_PLUGIN_HISTORY_HELP", "History plugin enables undo and redo actions in the editor.");
define("LAN_TRUMBOWYG_PLUGIN_INDENT_HELP", "Indent plugin allows you to indent or outdent content in the editor.");
define("LAN_TRUMBOWYG_PLUGIN_INSERTAUDIO_HELP", "Insert audio plugin lets you embed audio files into the editor.");
define("LAN_TRUMBOWYG_PLUGIN_NOEMBED_HELP", "No embed plugin ensures content is inserted without embedded objects.");
define("LAN_TRUMBOWYG_PLUGIN_PASTEEMBED_HELP", "Paste embed plugin handles pasting embedded media into the editor.");
define("LAN_TRUMBOWYG_PLUGIN_PASTEIMAGE_HELP", "Paste image plugin allows direct pasting of images into the editor.");
define("LAN_TRUMBOWYG_PLUGIN_PREFORMATTED_HELP", "Preformatted plugin helps you insert preformatted text into the editor.");
define("LAN_TRUMBOWYG_PLUGIN_RUBY_HELP", "Ruby plugin lets you add ruby annotations to your content.");
define("LAN_TRUMBOWYG_PLUGIN_SPECIALCHARS_HELP", "Special characters plugin allows you to insert special characters into the editor.");



define("LAN_TRUMBOWYG_PLUGIN_ALLOWEDTAGS", "Plugin Allowed Tags");
define("LAN_TRUMBOWYG_PLUGIN_ALLOWEDTAGS_HELP", "This plugin allows you to specify which HTML tags are permitted in the editor.");
define("LAN_TRUMBOWYG_REMOVEFORMATPASTED", "Remove Format on Paste");
define("LAN_TRUMBOWYG_REMOVEFORMATPASTED_HELP", "Automatically removes formatting when content is pasted into the editor.");
