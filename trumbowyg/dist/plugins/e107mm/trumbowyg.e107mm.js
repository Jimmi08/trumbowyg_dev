/* ===========================================================
 * trumbowyg.e107mm.js v0.1
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
    });

    function openMediaManager(trumbowyg) {
        const pluginBasePath = trumbowyg.o.plugins.e107mm.baseURL;
        const mediaManagerUrl = pluginBasePath + '/image.php?mode=main&action=dialog&for=common&tagid=&iframe=1&bbcode=img';

// Create the modal window
        const mediaModal = $('<div id="e107-media-modal" style="display:none;"></div>').appendTo('body');

        mediaModal.html(
            '<iframe src="' + mediaManagerUrl + '" style="width:100%; height:500px; border:none;"></iframe>'
        );

// Use jQuery UI Dialog to manage the modal
        mediaModal.dialog({
            title: 'Select Media',
            width: 1280,
            modal: true,
            buttons: {
                Confirm: function () {
                    const iframeDocument = mediaModal.find('iframe')[0].contentDocument;

                    const selectedImage = iframeDocument.querySelector('.e-media-select.media-select-active');

                    if (selectedImage) {
                        // Get the original image path
                        let originalPath = selectedImage.getAttribute('data-src');
                        
                        // Get html_holder to extract dimensions and formatting
                        const htmlHolderInput = iframeDocument.querySelector('input[name="html_holder"]');
                        
                        if (htmlHolderInput && htmlHolderInput.value) {
                            // Parse width and height from html_holder img tag
                            let finalHtml = htmlHolderInput.value;
                            let width = '';
                            let height = '';
                            
                            // Extract width and height attributes
                            const widthMatch = finalHtml.match(/width=["'](\d+)["']/);
                            const heightMatch = finalHtml.match(/height=["'](\d+)["']/);
                            
                            if (widthMatch) {
                                width = widthMatch[1];
                            }
                            if (heightMatch) {
                                height = heightMatch[1];
                            }
                            
                            console.log('Extracted dimensions - width:', width, 'height:', height);
                            
                            // If we have at least one dimension, try to construct original path
                            if ((width && !isNaN(width)) || (height && !isNaN(height))) {
                                // Extract current src from html_holder
                                const imgTagPattern = /<img[^>]*>/i;
                                const imgMatch = finalHtml.match(imgTagPattern);
                                
                                if (imgMatch) {
                                    let imgTag = imgMatch[0];
                                    
                                    // Extract the directory and filename from current path
                                    const srcPattern = /src="([^"]*)"/;
                                    const srcMatch = imgTag.match(srcPattern);
                                    
                                    if (srcMatch) {
                                        let currentPath = srcMatch[1];
                                        
                                        console.log('Current path:', currentPath);
                                        
                                        // Extract dimensions from current path if they exist
                                        const currentDimMatch = currentPath.match(/\/(\d+)x(\d+)\//);
                                        if (currentDimMatch) {
                                            let oldWidth = currentDimMatch[1];
                                            let oldHeight = currentDimMatch[2];
                                            
                                            console.log('Current dimensions in path - width:', oldWidth, 'height:', oldHeight);
                                            
                                            // Use provided dimensions or set to 0 if not specified
                                            let newWidth = width || 0;
                                            let newHeight = height || 0;
                                            
                                            console.log('New dimensions - width:', newWidth, 'height:', newHeight);
                                            
                                            // Replace "/oldWidtxoldHeight/" with "/newWidthxnewHeight/"
                                            let newDir = currentPath.replace('/' + oldWidth + 'x' + oldHeight + '/', '/' + newWidth + 'x' + newHeight + '/');
                                            
                                            console.log('New directory with dimensions:', newDir);
                                            
                                            // Replace the src in imgTag
                                            imgTag = imgTag.replace(srcPattern, 'src="' + newDir + '"');
                                            
                                            // Replace the full img tag in finalHtml
                                            finalHtml = finalHtml.replace(imgTagPattern, imgTag);
                                        } else {
                                            console.log('No dimensions found in current path to replace');
                                        }
                                    }
                                }
                            }
                            
                            // Convert Bootstrap 4 classes to Bootstrap 5 classes
                            // bbcode-img-left -> float-start
                            // bbcode-img-right -> float-end
                            finalHtml = finalHtml.replace(/bbcode-img-left/g, 'float-start');
                            finalHtml = finalHtml.replace(/bbcode-img-right/g, 'float-end');
                            
                            console.log('Final HTML to insert:', finalHtml);
                            trumbowyg.execCmd('insertHTML', finalHtml);
                        } else {
                            // Fallback if html_holder not found
                            const alt = selectedImage.getAttribute('alt') || '';
                            let imgTag = '<img src="' + originalPath + '"';
                            
                            if (alt) imgTag += ' alt="' + alt + '"';
                            
                            const inlineStyle = selectedImage.style.cssText;
                            if (inlineStyle.includes('float:left')) {
                                imgTag += ' style="float:left;"';
                            } else if (inlineStyle.includes('float:right')) {
                                imgTag += ' style="float:right;"';
                            }
                            
                            imgTag += ' />';
                            console.log('Final HTML to insert:', imgTag);
                            trumbowyg.execCmd('insertHTML', imgTag);
                        }
                        
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
