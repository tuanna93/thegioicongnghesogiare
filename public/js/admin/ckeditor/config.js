/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	//config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = '/js/admin/kcfinder/browse.php?opener=ckeditor&type=files';

    config.filebrowserImageBrowseUrl = '/js/admin/kcfinder/browse.php?opener=ckeditor&type=images';

    config.filebrowserFlashBrowseUrl = '/js/admin/kcfinder/browse.php?opener=ckeditor&type=flash';

    config.filebrowserUploadUrl = '/js/admin/kcfinder/upload.php?opener=ckeditor&type=files';

    config.filebrowserImageUploadUrl = '/js/admin/kcfinder/upload.php?opener=ckeditor&type=images';

    config.filebrowserFlashUploadUrl = '/js/admin/kcfinder/upload.php?opener=ckeditor&type=flash';
    config.toolbar = [
        ['Source','Preview','Templates'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        '/',
        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['BidiLtr', 'BidiRtl' ],
        ['Link','Unlink','Anchor'],
        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
        '/',
        ['Styles','Format','Font','FontSize'],
        ['TextColor','BGColor'],
        ['Maximize','ShowBlocks','Syntaxhighlight']
    ]
};
