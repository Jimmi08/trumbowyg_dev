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
        data: [],
        success: undefined,
        error: undefined
    };
 
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
                Confirm: function () {
                    const iframeDocument = mediaModal.find('iframe')[0].contentDocument;

                    // Hypothetical example: Look for a selected image in the iframe
                    const selectedImage = iframeDocument.querySelector('.e-media-select.media-select-active');

                    if (selectedImage) {
                        const mediaUrl = selectedImage.getAttribute('data-src');
                        console.log(mediaUrl);
                        trumbowyg.execCmd('insertHTML', `<img src="${mediaUrl}" alt="Selected Image">`);
                        mediaModal.dialog('close');
                    } else {
                        alert('Please select an image.');
                    }
                },
                Close: function () {
                    mediaModal.dialog('close');
                }
            },

            close: function () {
                mediaModal.remove();
            }
        });

 
 
 
    }
})(jQuery);
