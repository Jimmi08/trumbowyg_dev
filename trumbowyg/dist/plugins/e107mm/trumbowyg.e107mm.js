/* ===========================================================
 * trumbowyg.e107mm.js v0.0 - FINAL WORKING VERSION WITH LANGUAGE SUPPORT AND X ICON
 * e107mm plugin for Trumbowyg
 * http://alex-d.github.com/Trumbowyg
 * =========================================================== */
 
 
(function ($) {
    'use strict';

    $.extend(true, $.trumbowyg, {
        langs: {
            en: {
                e107mm: 'Media manager',
                submit: 'Confirm',
                close: 'Close'
            },
            nl: {
                e107mm: 'Mediamanager',
                submit: 'Bevestigen',
                close: 'Sluiten'
            }
        },
        plugins: {
            e107mm: {
                init: function (trumbowyg) {
                    trumbowyg.addBtnDef('e107mm', {
                        fn: function () {
                            openMediaManager(trumbowyg);
                        },
                        ico: 'insert-image'
                    });
                }
            }
        }
    });

    function openMediaManager(trumbowyg) {
        const pluginBasePath = trumbowyg.o.plugins.e107mm.baseURL;
        const mediaManagerUrl = pluginBasePath + '/image.php?mode=main&action=dialog&for=common&tagid=&iframe=1&bbcode=img';

        // Use jQuery UI Dialog for modal
        var $modal = $('<div id="e107-media-modal" style="display:none;"></div>').appendTo('body');

        // Responsive iframe container with 16:9 aspect ratio
        $modal.html(
            '<div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">' +
                '<iframe src="' + mediaManagerUrl + '" style="position:absolute;top:0;left:0;width:100%;height:100%;" allowfullscreen></iframe>' +
            '</div>'
        );

        // Calculate responsive dimensions
        var modalWidth = Math.min(window.innerWidth * 0.95, 1280);
        var modalHeight = Math.min(window.innerHeight * 0.9, 700);

        $modal.dialog({
            title: trumbowyg.lang.e107mm,
            width: modalWidth,
            height: modalHeight,
            modal: true,
            resizeable: false,
            closeText: '×',
            open: function() {
                // Remove default dialog titlebar close button and add custom X
                var $titleBar = $(this).dialog('widget').find('.ui-dialog-titlebar');
                
                // Remove the default square close button
                $titleBar.find('.ui-dialog-titlebar-close').remove();
                
                // Add custom X icon in top right corner
                $('<button class="e107mm-x-close" style="position:absolute;top:0px;right:5px;width:28px;height:28px;border:none;background:none;font-size:24px;color:#aaa;cursor:pointer;">×</button>')
                    .click(function() { $(this).closest('.ui-dialog').find('.ui-dialog-content').dialog('close'); })
                    .appendTo($titleBar);
            },
            create: function() {
                var $iframe = $(this).find('iframe');
                if ($iframe.length) {
                    $iframe.css({
                        'width': '100%',
                        'min-height': '500px',
                        'border': 'none'
                    });
                }
            },
            buttons: [
                {
                    text: trumbowyg.lang.submit,
                    click: function () {
                        const iframeDocument = $('iframe', $modal)[0].contentDocument;

                        const selectedImage = iframeDocument.querySelector('.e-media-select.media-select-active');

                        if (selectedImage) {
                            let originalPath = selectedImage.getAttribute('data-src');
                            
                            const htmlHolderInput = iframeDocument.querySelector('input[name="html_holder"]');
                            
                            if (htmlHolderInput && htmlHolderInput.value) {
                                let finalHtml = htmlHolderInput.value;
                                let width = '';
                                let height = '';
                                
                                const widthMatch = finalHtml.match(/width=["'](\d+)["']/);
                                const heightMatch = finalHtml.match(/height=["'](\d+)["']/);
                                
                                if (widthMatch) {
                                    width = widthMatch[1];
                                }
                                if (heightMatch) {
                                    height = heightMatch[1];
                                }
                                
                                console.log('Extracted dimensions - width:', width, 'height:', height);
                                
                                if ((width && !isNaN(width)) || (height && !isNaN(height))) {
                                    const imgTagPattern = /<img[^>]*>/i;
                                    const imgMatch = finalHtml.match(imgTagPattern);
                                    
                                    if (imgMatch) {
                                        let imgTag = imgMatch[0];
                                        const srcPattern = /src="([^"]*)"/;
                                        const srcMatch = imgTag.match(srcPattern);
                                        
                                        if (srcMatch) {
                                            let currentPath = srcMatch[1];
                                            
                                            console.log('Current path:', currentPath);
                                            
                                            const currentDimMatch = currentPath.match(/\/(\d+)x(\d+)\//);
                                            if (currentDimMatch) {
                                                let oldWidth = currentDimMatch[1];
                                                let oldHeight = currentDimMatch[2];
                                                
                                                console.log('Current dimensions in path - width:', oldWidth, 'height:', oldHeight);
                                                
                                                let newWidth = width || 0;
                                                let newHeight = height || 0;
                                                
                                                console.log('New dimensions - width:', newWidth, 'height:', newHeight);
                                                
                                                let newDir = currentPath.replace('/' + oldWidth + 'x' + oldHeight + '/', '/' + newWidth + 'x' + newHeight + '/');
                                                
                                                console.log('New directory with dimensions:', newDir);
                                            
                                                imgTag = imgTag.replace(srcPattern, 'src="' + newDir + '"');
                                            
                                                finalHtml = finalHtml.replace(imgTagPattern, imgTag);
                                            } else {
                                                console.log('No dimensions found in current path to replace');
                                            }
                                        }
                                    }
                                }
                            
                                finalHtml = finalHtml.replace(/bbcode-img-left/g, 'float-start');
                                finalHtml = finalHtml.replace(/bbcode-img-right/g, 'float-end');
                            
                                console.log('Final HTML to insert:', finalHtml);
                                trumbowyg.execCmd('insertHTML', finalHtml);
                            } else {
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
                        
                            $modal.dialog('close');
                        } else {
                            alert(trumbowyg.lang.pleaseSelectImage || 'Please select an image.');
                        }
                    },
                    class: 'ui-button ui-corner-all ui-widget'
                },
                {
                    text: trumbowyg.lang.close,
                    click: function () {
                        $modal.dialog('close');
                    },
                    class: 'ui-button ui-corner-all ui-widget'
                }
            ],

            close: function () {
                $modal.remove();
            }
        });
    }
})(jQuery);
