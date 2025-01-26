<?php

/**
 * @file
 * Language file for "trumbowyg" plugin.
 */

define("LAN_TRUMBOWYG_ADMIN_NAV_00", "Instellingen");
define("LAN_TRUMBOWYG_ADMIN_NAV_01", "Knoppenpaneel");
define("LAN_TRUMBOWYG_ADMIN_NAV_02", "Semantisch");
define("LAN_TRUMBOWYG_ADMIN_NAV_03", "Paste Tag Sanitization");
define("LAN_TRUMBOWYG_ADMIN_NAV_04", "Plugins");

define("LAN_TRUMBOWYG_BTNS", "Aangepaste knoppenpaneel inschakelen");
define("LAN_TRUMBOWYG_SEMANTIC", "Standaard semantische code uitgeschakeld");
define("LAN_TRUMBOWYG_REMOVEFORMAT_PASTED", "Opmaak verwijderen van geplakte inhoud");
define("LAN_TRUMBOWYG_RESET_CSS", "Reset CSS inschakelen");
define("LAN_TRUMBOWYG_AUTOGROW", "Automatisch groeien inschakelen");
define("LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT", "Schakel bewerken afbeeldingsbreedte in modal in");
define("LAN_TRUMBOWYG_URL_PROTOCOL", "URL-protocoldetectie inschakelen");
define("LAN_TRUMBOWYG_LINK_TARGETS", "Link doel koppelen");
define("LAN_TRUMBOWYG_MINIMAL_LINKS", "Minimale links inschakelen");
define("LAN_TRUMBOWYG_TAGS_TO_REMOVE", "Te verwijderen tags");
define("LAN_TRUMBOWYG_TAGS_TO_KEEP", "Tags om te behouden");
define("LAN_TRUMBOWYG_TAG_CLASSES", "Tag klassen inschakelen");
define("LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON", "Actief dropdown-pictogram wijzigen");

define("LAN_TRUMBOWYG_BTNS_HELP", "Met deze instelling kunt u de knoppen beheren die worden weergegeven in de Trumbowyg-editor. Met Uit worden alleen standaardknoppen voor iedereen gebruikt.");
define("LAN_TRUMBOWYG_SEMANTIC_HELP", " Genereert een betere, meer semantisch georiënteerde HTML (d.w.z. <code>&lt;em&gt;</code> in plaats van <code>
&lt;i&gt;</code>, <code>&lt;strong&gt;</code> in plaats van <code>&lt;b&gt;</code>, etc.)");
define("LAN_TRUMBOWYG_SEMANTIC_HELP2", "U kunt ook de semantische tagtoewijzing voor elk van deze tags aanpassen: &lt;b&gt, &lt;i&gt, &lt;s&gt, &lt;strike&gt, &lt;div&gt. <br>
Ingeschakelde semantische modus deactiveert standaard de onderstrepingsknop omdat ze geen echte semantiek overbrengen. Als u ze opnieuw wilt activeren, moet u dat expliciet doen in het knoppenpaneel. <br>
Het wordt toegepast tijdens het bewerken - gerelateerde knoppen worden gewijzigd - niet tijdens het parsen!"); 



define("LAN_TRUMBOWYG_REMOVEFORMAT_PASTED_HELP", "Wanneer ingeschakeld, wordt de opmaak van geplakte content verwijderd. U kunt dit overschrijven met Tags om te verwijderen of Tags om te behouden.");
define("LAN_TRUMBOWYG_RESET_CSS_HELP", "Als u niet wilt dat de paginastijl invloed heeft op het uiterlijk van de tekst in de editor, moet u een reset-css op de editor toepassen. Je kunt activeren");

define("LAN_TRUMBOWYG_AUTOGROW_HELP", "Wanneer u een lange tekst schrijft, kan de tekstbewerkingszone groter worden.");
define("LAN_TRUMBOWYG_IMAGE_WIDTH_MODAL_EDIT_HELP", "Voegt een veld toe aan het venster voor het invoegen/bewerken van afbeeldingen, waarmee gebruikers de breedte van de afbeelding kunnen instellen.");
define("LAN_TRUMBOWYG_URL_PROTOCOL_HELP", "Een optie om URL's automatisch te voorzien van een protocol. Wanneer deze optie is ingesteld op true, worden URL's zonder protocol voorzien van https://. Als alternatief kan een string worden opgegeven voor een aangepast voorvoegsel");

define("LAN_TRUMBOWYG_LINK_TARGETS_HELP", "Sta toe om de waarde van het linkdoelattribuut in te stellen op wat je wilt, zelfs als de optie minimale Links is ingesteld. De eerste waarde is de standaardwaarde.");
define("LAN_TRUMBOWYG_MINIMAL_LINKS_HELP", "Als deze optie is ingeschakeld, worden alleen essentiële links opgenomen.");
define("LAN_TRUMBOWYG_TAGS_TO_REMOVE_HELP", "Geef aan welke HTML-tags verwijderd moeten worden wanneer content geplakt of verwerkt wordt. Sta toe om de code te saneren door alle tags te verwijderen die u wilt. U moet de sanering ook server-side uitvoeren om beveiligingsproblemen zoals XSS te voorkomen.");
define("LAN_TRUMBOWYG_TAGS_TO_KEEP_HELP", "Geef aan welke HTML-tags behouden moeten blijven tijdens het bewerken of plakken van de inhoud. Soms wilt u een aantal lege i-tags voor Font Awesome of iets anders behouden. U kunt deze lijst definiëren via de optie tags om te behouden.");
define("LAN_TRUMBOWYG_TAG_CLASSES_HELP", "Schakel het toevoegen van CSS-klassen aan HTML-tags in de editor in of uit.");
define("LAN_TRUMBOWYG_CHANGE_ACTIVE_DROPDOWN_ICON_HELP", "Wanneer deze instelling is ingeschakeld, wordt het pictogram van het actieve vervolgkeuzemenu-item aangepast om visuele feedback te geven.");

define("LAN_TRUMBOWYG_ALLOWED_TAGS", "Custom tag whitelist");
define("LAN_TRUMBOWYG_ALLOWED_TAGS_HELP", "Any tag pasted which is not in allowedTags list will be unwrap, only the text will be kept. ");
define("LAN_TRUMBOWYG_ALLOWED_TAGS_HELP2", "RemoveformatPasted must be set to FALSE since it was applied prior to pasteHandlers, or else it will be useless ");
define("LAN_TRUMBOWYG_ALLOWED_TAGS_HELP3", "It is most advisable to use along with the cleanpaste plugin, or else you'd end up with dirty markup. ");

define("LAN_TRUMBOWYG_ADMIN_01", "Dropdown-pictogram kan veranderen naar het actieve subknoppictogram met deze optie ingeschakeld. Deze functionaliteit is momenteel uitgeschakeld. De instellingen worden niet toegepast.");
define("LAN_TRUMBOWYG_ADMIN_02", "Standaardsemantiek is niet uitgeschakeld. Deze instellingen worden niet toegepast.");
define("LAN_TRUMBOWYG_ADMIN_03", "Custom Button Pane is currently disabled. These settings will not be applied.");
define("LAN_TRUMBOWYG_ADMIN_04", "Enable TrumboWyg Editor");
define("LAN_TRUMBOWYG_ADMIN_04_HELP", "Disable editor if you are using/testing core tinymce editor.");
define("LAN_TRUMBOWYG_ADMIN_05", "Custom buttons are disabled. Your settings will not be applied.");
define("LAN_TRUMBOWYG_ADMIN_06", "Dark theme mode");

define("LAN_TRUMBOWYG_ADMIN_OPT_01", "Ingeschakeld");
define("LAN_TRUMBOWYG_ADMIN_OPT_02", "Uitgeschakeld");
define("LAN_TRUMBOWYG_ADMIN_OPT_03", "Auto");


define("LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS_HELP", "Wanneer deze optie is ingeschakeld, worden de tekstlabels op de knoppen verborgen en worden alleen de pictogrammen weergegeven.");
define("LAN_TRUMBOWYG_HIDE_BUTTON_TEXTS", "Verberg knopteksten");

// Preference Constants

define("LAN_TRUMBOWYG_PLUGIN_BASE64", "Base64");
define("LAN_TRUMBOWYG_PLUGIN_CLEANPASTE", "Clean Paste");
define("LAN_TRUMBOWYG_PLUGIN_EMOJI", "Emoji");
define("LAN_TRUMBOWYG_PLUGIN_FONTSIZE", "Font grootte");
define("LAN_TRUMBOWYG_PLUGIN_FONTFAMILY", "Font familie");


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
define("LAN_TRUMBOWYG_PLUGIN_BASE64_HELP", "Met de Base64-plugin kan je afbeeldingen inline invoegen als base64.");
define("LAN_TRUMBOWYG_PLUGIN_CLEANPASTE_HELP", "De plug-in Clean Paste verwerkt plakgebeurtenissen en wist de HTML-code voordat de inhoud in de editor wordt ingevoegd.");
define("LAN_TRUMBOWYG_PLUGIN_EMOJI_HELP", "Met de Emoji-plugin kan je emoji's in je editor invoegen.");
define("LAN_TRUMBOWYG_PLUGIN_FONTSIZE_HELP", "Met de plug-in voor lettergrootte kan je de lettergrootte in de editor wijzigen.");
define("LAN_TRUMBOWYG_PLUGIN_FONTFAMILY_HELP", "Met de lettertypefamilie-plugin kan je het lettertype in de editor wijzigen.");


define("LAN_TRUMBOWYG_PLUGIN_HISTORY_HELP", "History plugin enables undo and redo actions in the editor.");
define("LAN_TRUMBOWYG_PLUGIN_INDENT_HELP", "Indent plugin allows you to indent or outdent content in the editor.");
define("LAN_TRUMBOWYG_PLUGIN_INSERTAUDIO_HELP", "Insert audio plugin lets you embed audio files into the editor.");
define("LAN_TRUMBOWYG_PLUGIN_NOEMBED_HELP", "No embed plugin ensures content is inserted without embedded objects.");
define("LAN_TRUMBOWYG_PLUGIN_PASTEEMBED_HELP", "Paste embed plugin handles pasting embedded media into the editor.");
define("LAN_TRUMBOWYG_PLUGIN_PASTEIMAGE_HELP", "Paste image plugin allows direct pasting of images into the editor.");
define("LAN_TRUMBOWYG_PLUGIN_PREFORMATTED_HELP", "Preformatted plugin helps you insert preformatted text into the editor.");
define("LAN_TRUMBOWYG_PLUGIN_RUBY_HELP", "Ruby plugin lets you add ruby annotations to your content.");
define("LAN_TRUMBOWYG_PLUGIN_SPECIALCHARS_HELP", "Special characters plugin allows you to insert special characters into the editor.");


define("LAN_TRUMBOWYG_PLUGIN_ALLOWEDTAGS", "Allowed Tags");
define("LAN_TRUMBOWYG_PLUGIN_ALLOWEDTAGS_HELP", "This plugin allows you to specify which HTML tags are permitted in the editor.");
define("LAN_TRUMBOWYG_REMOVEFORMATPASTED", "Remove Format on Paste");
define("LAN_TRUMBOWYG_REMOVEFORMATPASTED_HELP", "Automatically removes formatting when content is pasted into the editor.");
define("LAN_TRUMBOWYG_DISPLAY_AS_LIST", "Display Colors as List");
define("LAN_TRUMBOWYG_DISPLAY_AS_LIST_HELP", "Enable this option to display content as a list instead of color pallete.");

define("LAN_TRUMBOWYG_PLUGIN_COLORS", "Kleuren");
define("LAN_TRUMBOWYG_PLUGIN_COLORS_HELP", "Met de kleur plug-in kan je kleur toepassen op tekst in de editor.");

define("LAN_TRUMBOWYG_ALLOW_CUSTOM_BACKCOLOR", "Allow Custom Background Color");
define("LAN_TRUMBOWYG_ALLOW_CUSTOM_BACKCOLOR_HELP", "Enable or disable the ability to select custom background colors in the editor.");

define("LAN_TRUMBOWYG_PLUGIN_TABLE", "Table");
define("LAN_TRUMBOWYG_PLUGIN_TABLE_HELP", "Table plugin allows you to create and manage tables in the editor.");

define("LAN_TRUMBOWYG_PLUGIN_GIPHY", "");
define("LAN_TRUMBOWYG_PLUGIN_GIPHY_HELP", "");

define("LAN_TRUMBOWYG_PLUGIN_HIGHLIGHT", "");
define("LAN_TRUMBOWYG_PLUGIN_HIGHLIGHT_HELP", "");

define("LAN_TRUMBOWYG_PLUGIN_LINEHEIGHT", "");
define("LAN_TRUMBOWYG_PLUGIN_LINEHEIGHT_HELP", "");

define("LAN_TRUMBOWYG_PLUGIN_MATHML", "");
define("LAN_TRUMBOWYG_PLUGIN_MATHML_HELP", "");

define("LAN_TRUMBOWYG_PLUGIN_MENTION", "");
define("LAN_TRUMBOWYG_PLUGIN_MENTION_HELP", "");

define("LAN_TRUMBOWYG_PLUGIN_RESIZIMG", "");
define("LAN_TRUMBOWYG_PLUGIN_RESIZIMG_HELP", "");

define("LAN_TRUMBOWYG_PLUGIN_TEMPLATE", "");
define("LAN_TRUMBOWYG_PLUGIN_TEMPLATE_HELP", "");

define("LAN_TRUMBOWYG_PLUGIN_UPLOAD", "");
define("LAN_TRUMBOWYG_PLUGIN_UPLOAD_HELP", "");
