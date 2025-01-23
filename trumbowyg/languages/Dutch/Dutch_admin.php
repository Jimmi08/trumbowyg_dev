<?php

/**
 * @file
 * Language file for "trumbowyg" plugin.
 */

define("LAN_TRUMBOWYG_ADMIN_NAV_00", "Instellingen");
define("LAN_TRUMBOWYG_ADMIN_NAV_01", "Knoppenpaneel");
define("LAN_TRUMBOWYG_ADMIN_NAV_02", "Semantisch");
define("LAN_TRUMBOWYG_ADMIN_NAV_03", "Tags om te verwijderen/behouden");
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


define("LAN_TRUMBOWYG_ADMIN_01", "Dropdown-pictogram kan veranderen naar het actieve subknoppictogram met deze optie ingeschakeld. Deze functionaliteit is momenteel uitgeschakeld. De instellingen worden niet toegepast.");
define("LAN_TRUMBOWYG_ADMIN_02", "Standaardsemantiek is niet uitgeschakeld. Deze instellingen worden niet toegepast.");




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
define("LAN_TRUMBOWYG_PLUGIN_COLORS", "Kleuren");

// Help Constants
define("LAN_TRUMBOWYG_PLUGIN_BASE64_HELP", "Met de Base64-plugin kan je afbeeldingen inline invoegen als base64.");
define("LAN_TRUMBOWYG_PLUGIN_CLEANPASTE_HELP", "De plug-in Clean Paste verwerkt plakgebeurtenissen en wist de HTML-code voordat de inhoud in de editor wordt ingevoegd.");
define("LAN_TRUMBOWYG_PLUGIN_EMOJI_HELP", "Met de Emoji-plugin kan je emoji's in je editor invoegen.");
define("LAN_TRUMBOWYG_PLUGIN_FONTSIZE_HELP", "Met de plug-in voor lettergrootte kan je de lettergrootte in de editor wijzigen.");
define("LAN_TRUMBOWYG_PLUGIN_FONTFAMILY_HELP", "Met de lettertypefamilie-plugin kan je het lettertype in de editor wijzigen.");
define("LAN_TRUMBOWYG_PLUGIN_COLORS_HELP", "Met de kleur plug-in kan je kleur toepassen op tekst in de editor.");

 