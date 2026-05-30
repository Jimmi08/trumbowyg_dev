/* ===========================================================
 * trumbowyg.e107mm.js v0.1 - FINAL WORKING VERSION WITH GLYPH BUTTON
 * e107mm plugin for Trumbowyg
 * http://alex-d.github.com/Trumbowyg
 * =========================================================== */
 
 
(function ($) {
    'use strict';

    $.extend(true, $.trumbowyg, {
        langs: {
            en: {
                e107mm: 'Media manager',
                e107mmImage: 'Insert Media-Manager Image',
                e107mmVideo: 'Insert Media-Manager Video',
                e107mmGlyph: 'Insert Media-Manager Glyph',
                submit: 'Confirm',
                close: 'Close'
            },
            nl: {
                e107mm: 'Mediamanager',
                e107mmImage: 'Voeg Media-Manager Afbeelding in',
                e107mmVideo: 'Voeg Media-Manager Video in',
                e107mmGlyph: 'Voeg Media-Manager Glyph in',
                submit: 'Bevestigen',
                close: 'Sluiten'
            }
        },
        plugins: {
            e107mm: {
                init: function (trumbowyg) {
                    // Image button
                    trumbowyg.addBtnDef('e107mmImage', {
                        fn: function () {
                            openMediaManager(trumbowyg, 'img');
                        },
                        ico: 'image'
                    });
                    
                    // Video button
                    trumbowyg.addBtnDef('e107mmVideo', {
                        fn: function () {
                            openMediaManager(trumbowyg, 'video');
                        },
                        ico: 'embed'
                    });
                    
                    // Glyph button
                    trumbowyg.addBtnDef('e107mmGlyph', {
                        fn: function () {
                            openMediaManager(trumbowyg, 'glyph');
                        },
                        ico: 'insertcharacter'
                    });
					
					if (!document.querySelector("#trumbowyg-e107mm")) {
					const iconWrap = document.createElementNS("http://www.w3.org/2000/svg", "svg");
					/*
					This class is only here to allow CSS to hide it, e.g. with

					.trumbowyg-myplugin-icons {
						display: none
					}
					*/

					iconWrap.classList.add("trumbowyg-e107mm-icons");
					// example icon by Remix Icon - https://remixicon.com/
					iconWrap.innerHTML = `
						<symbol id="trumbowyg-image" viewBox="0 0 24 24">
							<path d="M5,15.7393398 L8.26966991,12.4696699 C8.56256313,12.1767767 9.03743687,12.1767767 9.33033009,12.4696699 L11.9,15.0393398 L16.0030032,10.9363366 C16.2958965,10.6434434 16.7707702,10.6434434 17.0636634,10.9363366 L19,12.8726732 L19,5 L5,5 L5,15.7393398 Z M5,17.8606602 L5,19 L7.93933983,19 L10.8393398,16.1 L8.8,14.0606602 L5,17.8606602 Z M19,14.9939935 L16.5333333,12.5273268 L10.0606602,19 L19,19 L19,14.9939935 Z M4,3 L20,3 C20.5522847,3 21,3.44771525 21,4 L21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 Z M10,11 C11.1045695,11 12,10.1045695 12,9 C12,7.8954305 11.1045695,7 10,7 C8.8954305,7 8,7.8954305 8,9 C8,10.1045695 8.8954305,11 10,11 Z"/>
						</symbol>
						<symbol id="trumbowyg-embed" viewBox="0 0 24 24">
							<path d="M4,3 L20,3 C20.5522847,3 21,3.44771525 21,4 L21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 Z M5,5 L5,19 L19,19 L19,5 L5,5 Z M9.7906191,7.56472793 L15.4303866,11.5931333 C15.6550929,11.7536378 15.7071387,12.0659128 15.5466342,12.2906191 C15.5145644,12.3355169 15.4752843,12.3747969 15.4303866,12.4068667 L9.7906191,16.4352721 C9.5659128,16.5957766 9.25363776,16.5437307 9.09313326,16.3190244 C9.03256157,16.2342241 9,16.1326168 9,16.0284053 L9,7.97159466 C9,7.69545229 9.22385763,7.47159466 9.5,7.47159466 C9.60421149,7.47159466 9.70581872,7.50415623 9.7906191,7.56472793 Z"/>
						</symbol>
						<symbol id="trumbowyg-insertcharacter" viewBox="0 0 24 24">
							<path d="M15,18 L19,18 L20,16 L20,20 L14,20 L14,16.65625 C14.5104192,16.4374989 14.9791645,16.1406269 15.40625,15.765625 C15.8333355,15.3906231 16.2031234,14.9557316 16.515625,14.4609375 C16.8281266,13.9661434 17.0677075,13.4270863 17.234375,12.84375 C17.4114592,12.2604137 17.5,11.6458366 17.5,11 C17.5,10.1666625 17.3541681,9.38542031 17.0625,8.65625 C16.7812486,7.92707969 16.3906275,7.29427352 15.890625,6.7578125 C15.3906225,6.22135148 14.807295,5.79687656 14.140625,5.484375 C13.473955,5.18229016 12.7604205,5.03125 12,5.03125 C11.2395795,5.03125 10.526045,5.18229016 9.859375,5.484375 C9.192705,5.79687656 8.6093775,6.22135148 8.109375,6.7578125 C7.6093725,7.29427352 7.21875141,7.92707969 6.9375,8.65625 C6.64583187,9.38542031 6.5,10.1666625 6.5,11 C6.5,11.6458366 6.58854078,12.2604137 6.765625,12.84375 C6.9322925,13.4270863 7.17187344,13.9661434 7.484375,14.4609375 C7.79687656,14.9557316 8.16666453,15.3906231 8.59375,15.765625 C9.02083547,16.1406269 9.48958078,16.4374989 10,16.65625 L10,20 L4,20 L4,16 L5,18 L9,18 L9,17.484375 C8.27082969,17.223957 7.59896141,16.8802105 6.984375,16.453125 C6.36978859,16.0156228 5.84114805,15.5156278 5.3984375,14.953125 C4.95572695,14.3906222 4.61458453,13.776045 4.375,13.109375 C4.12499875,12.442705 4,11.739587 4,11 C4,10.0312452 4.20833125,9.12500422 4.625,8.28125 C5.04166875,7.42707906 5.61197555,6.68229484 6.3359375,6.046875 C7.05989945,5.41145516 7.91145344,4.91146016 8.890625,4.546875 C9.85937984,4.18228984 10.8958278,4 12,4 C13.1041722,4 14.1406202,4.18228984 15.109375,4.546875 C16.0885466,4.91146016 16.9401005,5.41145516 17.6640625,6.046875 C18.3880245,6.68229484 18.9583313,7.42707906 19.375,8.28125 C19.7916687,9.12500422 20,10.0312452 20,11 C20,11.739587 19.8750013,12.442705 19.625,13.109375 C19.3854155,13.776045 19.044273,14.3906222 18.6015625,14.953125 C18.158852,15.5156278 17.6302114,16.0156228 17.015625,16.453125 C16.4010386,16.8802105 15.7291703,17.223957 15,17.484375 L15,18 Z"/>
						</symbol>
    `;
    document.body.appendChild(iconWrap)
}
                }
            }
        }
    });

    function openMediaManager(trumbowyg, mode) {
        const pluginBasePath = trumbowyg.o.plugins.e107mm.baseURL;
        
        // Build URL based on mode
        let mediaManagerUrl = pluginBasePath + '/image.php?mode=main&action=dialog&for=common&tagid=&iframe=1&bbcode=' + mode;
        
        if (mode === 'video') {
            mediaManagerUrl += '&youtube=1';
        }

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

        // Set title based on mode
        var langKey = 'e107mm' + mode.charAt(0).toUpperCase() + mode.slice(1);
        var title = trumbowyg.lang[langKey] || (trumbowyg.lang.e107mm || 'Media manager');

        $modal.dialog({
            title: title,
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

                        const selectedMedia = iframeDocument.querySelector('.e-media-select.media-select-active');

                        if (selectedMedia) {
                            let originalPath = selectedMedia.getAttribute('data-src');
                            
                            // Check for glyph icons (<i> tags)
                            var selectedGlyphIcon = iframeDocument.querySelector('.glyphicons li.active i, .glyphicons li.selected i');
                            
                            if (selectedGlyphIcon && mode === 'glyph') {
                                // Handle glyph selection
                                var glyphClass = selectedGlyphIcon.getAttribute('class');
                                var finalHtml = '<i class="' + glyphClass + '"></i>';
                                
                            //    console.log('Final glyph HTML to insert:', finalHtml);
                                trumbowyg.execCmd('insertHTML', finalHtml);
                            } else {
                                // Handle image/video selection
                                const htmlHolderInput = iframeDocument.querySelector('input[name="html_holder"]');
                                
                                if (htmlHolderInput && htmlHolderInput.value) {
                                    let finalHtml = htmlHolderInput.value;
                                    
                                    // For images: extract and replace dimensions
                                    if (mode === 'img') {
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
                                        
                                    //    console.log('Extracted dimensions - width:', width, 'height:', height);
                                        
                                        if ((width && !isNaN(width)) || (height && !isNaN(height))) {
                                            const imgTagPattern = /<img[^>]*>/i;
                                            const imgMatch = finalHtml.match(imgTagPattern);
                                            
                                            if (imgMatch) {
                                                let imgTag = imgMatch[0];
                                                const srcPattern = /src="([^"]*)"/;
                                                const srcMatch = imgTag.match(srcPattern);
                                                
                                                if (srcMatch) {
                                                    let currentPath = srcMatch[1];
                                                    
                                                //    console.log('Current path:', currentPath);
                                                    
                                                    const currentDimMatch = currentPath.match(/\/(\d+)x(\d+)\//);
                                                    if (currentDimMatch) {
                                                        let oldWidth = currentDimMatch[1];
                                                        let oldHeight = currentDimMatch[2];
                                                        
                                                    //    console.log('Current dimensions in path - width:', oldWidth, 'height:', oldHeight);
                                                        
                                                        let newWidth = width || 0;
                                                        let newHeight = height || 0;
                                                        
                                                    //    console.log('New dimensions - width:', newWidth, 'height:', newHeight);
                                                        
                                                        let newDir = currentPath.replace('/' + oldWidth + 'x' + oldHeight + '/', '/' + newWidth + 'x' + newHeight + '/');
                                                        
                                                    //     console.log('New directory with dimensions:', newDir);
                                                     
                                                        imgTag = imgTag.replace(srcPattern, 'src="' + newDir + '"');
                                                     
                                                        finalHtml = finalHtml.replace(imgTagPattern, imgTag);
                                                    } else {
                                                    //    console.log('No dimensions found in current path to replace');
                                                    }
                                                }
                                            }
                                        }
                                    
                                        finalHtml = finalHtml.replace(/bbcode-img-left/g, 'float-start');
                                        finalHtml = finalHtml.replace(/bbcode-img-right/g, 'float-end');
                                    }
                                
                                //    console.log('Final HTML to insert:', finalHtml);
                                    trumbowyg.execCmd('insertHTML', finalHtml);
                                } else {
                                    // Fallback if no html_holder found
                                    let imgTag;
                                    
                                    if (mode === 'glyph') {
                                        var glyphClass = selectedMedia.getAttribute('class');
                                        imgTag = '<i class="' + glyphClass + '"></i>';
                                    } else {
                                        const alt = selectedMedia.getAttribute('alt') || '';
                                        imgTag = '<img src="' + originalPath + '"';
                                    
                                        if (alt) imgTag += ' alt="' + alt + '"';
                                    
                                        const inlineStyle = selectedMedia.style.cssText;
                                        if (inlineStyle.includes('float:left')) {
                                            imgTag += ' style="float:left;"';
                                        } else if (inlineStyle.includes('float:right')) {
                                            imgTag += ' style="float:right;"';
                                        }
                                    
                                        imgTag += ' />';
                                    }
                                
                                //    console.log('Final HTML to insert:', imgTag);
                                    trumbowyg.execCmd('insertHTML', imgTag);
                                }
                            }
                        
                            $modal.dialog('close');
                        } else {
                            alert(trumbowyg.lang.pleaseSelectImage || 'Please select an item.');
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