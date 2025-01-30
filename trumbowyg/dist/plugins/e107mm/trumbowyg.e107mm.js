/* ===========================================================
 * trumbowyg.e107mm.js v0.0
 * e107mm plugin for Trumbowyg
 * http://alex-d.github.com/Trumbowyg
 * ===========================================================
 */
 
 
(function ($) {
    'use strict';

    // Plugin default options
    var defaultOptions = {
    };

    // If the plugin is a button
    function buildButtonDef(trumbowyg) {
        return {
            fn: function () {
                // Plugin button logic
            }
        }
    }

    // If the plugin is a button
    function buildButtonIcon() {
        if ($("#trumbowyg-e107mm").length > 0) {
            return;
        }

 
        const iconWrap = $(document.createElementNS("http://www.w3.org/2000/svg", "svg"));
        iconWrap.addClass("trumbowyg-icons");

        // For demonstration purposes, we've taken the "File" icon from
        // Remix Icon - https://remixicon.com/
        iconWrap.html(`
            <symbol id="trumbowyg-e107mm" viewBox="0 0 24 24" fill="red">
                <path d="M17.409 19C16.633 16.6012 15.1323 15.1147 13.1434 13.3979C15.0238 11.8971 17.4071 11 20 11V3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H6V1H8V5H4V12C9.22015 12 13.6618 14.4616 15.3127 19H17.409ZM18 1V5H10V3H16V1H18ZM16.5 10C15.6716 10 15 9.32843 15 8.5C15 7.67157 15.6716 7 16.5 7C17.3284 7 18 7.67157 18 8.5C18 9.32843 17.3284 10 16.5 10Z"/>
            </symbol>
        `).appendTo(document.body);
    }


    $.extend(true, $.trumbowyg, {
        // Add some translations
        langs: {
            en: {
                e107mm: 'Media manager'
            }
        },
        plugins: {
                e107mm: {
                    init: function (trumbowyg) {
                        // Add the button to the editor toolbar
                        trumbowyg.addBtnDef('e107mm', {
                            fn: function () {
                                openMediaManager(trumbowyg);
                            },
                            ico: 'insert-image' // Use an appropriate icon from Trumbowyg
                        });
                    }
                }
        }
         
    })
 

    function openMediaManager(trumbowyg) {
        // Define the modal opening logic
  
        const pluginBasePath = trumbowyg.o.plugins.e107mm.baseURL;
  
        const mediaManagerUrl = `${pluginBasePath}/image.php?mode=main&action=dialog&for=common&tagid=&iframe=1&bbcode=img`;

        // Create the modal window
        const mediaModal = $('<div id="e107-media-modal" style="display:none;"></div>').appendTo('body');

        mediaModal.html(
            `<iframe src="${mediaManagerUrl}" style="width:100%; height:500px; border:none;"></iframe>`
        );

        // Use jQuery UI Dialog to manage the modal
        mediaModal.dialog({
            title: 'Select Media',
            width: 800,
            modal: true,
            buttons: {
                Close: function () {
                    $(this).dialog('close');
                },
                 Confirm: function () {
                    $(this).dialog('confirm');
                }
            },
            close: function () {
                mediaModal.remove();
            },
            confirm: function () {
                mediaModal.submit();
            }
        });

        // Listen for messages from the media manager (assuming it sends postMessage)
        window.addEventListener('message', function handleMediaSelection(event) {
            if (event.origin !== window.location.origin) return;

            // Assume event.data contains the selected image URL
            if (event.data && event.data.mediaUrl) {
                const mediaUrl = event.data.mediaUrl;

                // Insert media URL into the Trumbowyg editor
                trumbowyg.execCmd('insertImage', mediaUrl);

                mediaModal.dialog('close');
                window.removeEventListener('message', handleMediaSelection);
            }
        });
    }
})(jQuery);
