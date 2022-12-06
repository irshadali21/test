/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'others' },
		{ name: 'about' }
	];

	// The default plugins included in the basic setup define some buttons that
	// are not needed in a basic editor. They are removed here.
	config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript';

	// Dialog windows are also simplified.
	config.removeDialogTabs = 'link:advanced';
	config.extraPlugins = 'wordcount';
	
	config.wordcount = {

		// Whether or not you want to show the Word Count
		showWordCount: true,
	
		// Whether or not you want to show the Char Count
		showCharCount: true,
		
		// Maximum allowed Word Count
		// maxWordCount: 4,
	
		// Maximum allowed Char Count
		// maxCharCount: 10
	};
	config.extraPlugins = 'lineheight';
	// config.line_height="0.2em;0.3em;0.5em;1em;1.1em;1.2em;1.3em;1.4em;1.5em;" ;
	config.line_height="0.5;1;2;3;4;5" ;
	config.font_names='Prata;Roboto;serif;sans-serif'
	// config.contentsCss='<link href="https://fonts.googleapis.com/css2?family=Prata&family=Roboto:wght@100&display=swap">';
};
