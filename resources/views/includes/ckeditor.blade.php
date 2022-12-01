@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prata&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <style>
        p {
            all: revert;
        }

        #container {
            width: 1000px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }

        .button_plus {
            color: #fff !important;
            background-color: #000 !important;
            font-size: 15px !important;
            border-radius: 50%;
        }
    </style>
    {{-- <script src="{{ asset('vendor/ckeditor53/build/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor53/sample/styles.css') }}"></script> --}}
@endpush

@push('scripts')
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script> --}}
    <script src="{{ asset('vendor/ckeditor421/ckeditor.js') }}"></script>
    <script>
        var wordCountConf1 = {
            showParagraphs: false,
            showWordCount: true,
            showCharCount: true,
            countSpacesAsChars: false,
            countHTML: false,
            maxWordCount: -1,
            maxCharCount: 1500
        }


        var wordCountConf2 = {
            showParagraphs: false,
            showWordCount: true,
            showCharCount: true,
            countSpacesAsChars: false,
            countHTML: false,
            maxWordCount: -1,
            maxCharCount: 5000
        }

        // CKEDITOR.replace( document.querySelector( '#body' ) )
        // CKEDITOR.replace(document.getElementById('bod1'), {wordcount: wordCountConf1})
        CKEDITOR.replace(document.getElementById('body'), {
            wordcount: wordCountConf1,
            height: '470'
        })
        CKEDITOR.replace(document.getElementById('body1'), {
            wordcount: wordCountConf1,
            height: '470'
        })
        CKEDITOR.replace(document.getElementById('firms'), {
            wordcount: wordCountConf1,
            height: '155'
        })
        CKEDITOR.replace(document.getElementById('benefits'), {
            wordcount: wordCountConf1,
            height: '155'
        })
        CKEDITOR.replace(document.getElementById('benefits_in_number'), {
            wordcount: wordCountConf1,
            height: '155'
        })
        CKEDITOR.replace(document.getElementById('tax_breack'), {
            wordcount: wordCountConf1,
            height: '155'
        })
        CKEDITOR.replace(document.getElementById('source'), {
            wordcount: wordCountConf1,
            height: '150'
        })

        function changeclass(clas, add, remove) {
            $(clas).addClass(add);
            $(clas).removeClass(remove);
        }

        $('#chipuo_checkbox').on('click', function() {
            if (document.getElementById('chipuo_checkbox').checked) {
                changeclass('#lavelina_body', "col-sm-7", "col-sm-12")
                $('#contatiner1').show();
                $('#firms_div').show();
            } else {
                if (document.getElementById('percosa_checkbox').checked) {
                    changeclass('#lavelina_body', "col-sm-7", "col-sm-12")
                    $('#contatiner1').show();
                    $('#firms_div').hide();
                } else {
                    changeclass('#lavelina_body', "col-sm-12", "col-sm-7")
                    $('#contatiner1').hide();
                    $('#firms_div').hide();
                }
            }
        })
        $('#percosa_checkbox').on('click', function() {
            if (document.getElementById('percosa_checkbox').checked) {
                changeclass('#lavelina_body', "col-sm-7", "col-sm-12")
                $('#contatiner1').show();
                $('#benefits_div').show();
            } else {
                if (document.getElementById('chipuo_checkbox').checked) {
                    changeclass('#lavelina_body', "col-sm-7", "col-sm-12")
                    $('#contatiner1').show();
                    $('#benefits_div').hide();
                } else {
                    changeclass('#lavelina_body', "col-sm-12", "col-sm-7")
                    $('#contatiner1').hide();
                    $('#benefits_div').hide();
                }
            }
        })



        //body 2 

        $(document).on('click', '.body2div', function() {
            if (document.getElementById('quanto_checkbox').checked || document.getElementById('quali_checkbox')
                .checked || document.getElementById('body2_checkbox').checked || document.getElementById(
                    'fonti_checkbox').checked) {
                $('#body2_row').show();
            } else {
                $('#body2_row').hide();
            }
        })


        $('#body2_checkbox').on('click', function() {
            if (document.getElementById('body2_checkbox').checked) {
                $('#body2_div').show();
                if (document.getElementById('quanto_checkbox').checked || document.getElementById('quali_checkbox')
                    .checked) {
                    $('#body2right_div').show();
                    changeclass('#body2_div', "col-sm-7", "col-sm-12")
                    changeclass('#body2right_div', "col-sm-5", "col-sm-12")
                } else {
                    $('#body2right_div').hide();
                    changeclass('#body2right_div', "col-sm-12", "col-sm-5")
                    changeclass('#body2_div', "col-sm-12", "col-sm-7")
                }
            } else {
                $('#body2_div').hide();
                if (document.getElementById('quanto_checkbox').checked || document.getElementById('quali_checkbox')
                    .checked) {
                    $('#body2right_div').show();
                    changeclass('#body2right_div', "col-sm-12", "col-sm-5")
                } 
            }
        })

        $('#quanto_checkbox').on('click', function() {
            if (document.getElementById('quanto_checkbox').checked) {
                $('#body2right_div').show();
                $('#benefits_in_number_div').show();
                if (document.getElementById('body2_checkbox').checked)
                {
                    changeclass('#body2_div', "col-sm-7", "col-sm-12")
                    changeclass('#body2right_div', "col-sm-5", "col-sm-12")
                } else {
                    changeclass('#body2right_div', "col-sm-12", "col-sm-5")
                }
            } else {
                $('#benefits_in_number_div').hide();
                if (!document.getElementById('quali_checkbox').checked) {
                    changeclass('#body2_div', "col-sm-12", "col-sm-7")
                    $('#body2right_div').hide();
                }
            }
        })
        $('#quali_checkbox').on('click', function() {
            if (document.getElementById('quali_checkbox').checked) {
                $('#body2right_div').show();
                $('#tax_breack_div').show();
                if (document.getElementById('body2_checkbox').checked)
                {
                    changeclass('#body2_div', "col-sm-7", "col-sm-12")
                    changeclass('#body2right_div', "col-sm-5", "col-sm-12")
                } else if (!document.getElementById('body2_checkbox').checked) {
                    changeclass('#body2right_div', "col-sm-12", "col-sm-5")
                }
            } else {
                $('#tax_breack_div').hide();
                if (!document.getElementById('quanto_checkbox').checked) {
                    changeclass('#body2_div', "col-sm-12", "col-sm-7")
                    $('#body2right_div').hide();
                }
            }
        })

        $('#fonti_checkbox').on('click', function() {
            if (document.getElementById('fonti_checkbox').checked) {
                $('#source_div').show();
                
            } else {
                $('#source_div').hide();
            }
        })


        // ckapplyeditor('body1');
        // ckapplyeditor('firms');
        // ckapplyeditor('benefits');
        // ckapplyeditor('benefits_in_number');
        // ckapplyeditor('tax_breack');
        // ckapplyeditor('source');

        // function ckapplyeditor(params) {

        //     CKEDITOR.replace
        //     .create(document.querySelector('#source'))
        //         .catch(error => {
        //             console.error(error);
        //         });
        // }
        //  CKEDITOR.replace(document.getElementById(params))
        // } 
        //,{
        //     toolbar: {
        //         items: [
        //             'heading', '|',
        //             'bold', 'italic', 'underline', 'subscript', 'superscript', '|',
        //             'bulletedList', 'numberedList', '|',
        //             'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
        //             'alignment', 
        //         ],
        //         // shouldNotGroupWhenFull: true,
        //         colorButton_colors: '008000,454545,FFF', 
        //         colorButton_enableMore: true, 

        //     },
        //     // Changing the language of the interface requires loading the language file using the <script> tag.
        //     // language: 'es',
        //     list: {
        //         properties: {
        //             styles: true,
        //             startIndex: true,
        //             reversed: true
        //         }
        //     },
        //     // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        //     heading: {
        //         options: [
        //             {
        //                 model: 'heading5',
        //                 view: 'h5',
        //                 title: 'Heading 5',
        //                 class: 'ck-heading_heading5'
        //             },
        //             {
        //                 model: 'paragraph',
        //                 title: 'Paragraph',
        //                 class: 'ck-heading_paragraph'
        //             },
        //             {
        //                 model: 'heading1',
        //                 view: 'h1',
        //                 title: 'Heading 1',
        //                 class: 'ck-heading_heading1'
        //             },
        //             {
        //                 model: 'heading2',
        //                 view: 'h2',
        //                 title: 'Heading 2',
        //                 class: 'ck-heading_heading2'
        //             },
        //             {
        //                 model: 'heading3',
        //                 view: 'h3',
        //                 title: 'Heading 3',
        //                 class: 'ck-heading_heading3'
        //             },
        //             {
        //                 model: 'heading4',
        //                 view: 'h4',
        //                 title: 'Heading 4',
        //                 class: 'ck-heading_heading4'
        //             },

        //             {
        //                 model: 'heading6',
        //                 view: 'h6',
        //                 title: 'Heading 6',
        //                 class: 'ck-heading_heading6'
        //             }
        //         ]
        //     },
        //     // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        //     fontFamily: {
        //         options: [
        //             'Prata, serif',
        //             'Roboto, sans-serif',
        //             'Arial, Helvetica, sans-serif',
        //             'Courier New, Courier, monospace',
        //             'Georgia, serif',
        //         ],
        //         supportAllValues: true
        //     },
        //     // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        //     fontSize: {
        //         options: [10, 12, 14, 'default', 18, 20, 22],
        //         supportAllValues: true
        //     },

        //     // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        //     link: {
        //         decorators: {
        //             addTargetToExternalLinks: true,
        //             defaultProtocol: 'https://',
        //             toggleDownloadable: {
        //                 mode: 'manual',
        //                 label: 'Downloadable',
        //                 attributes: {
        //                     download: 'file'
        //                 }
        //             }
        //         }
        //     },  

        // } 
        //     )   )         
        // }


        window.count = 1;

        $('#add_body').on('click', function() {
            window.count++;
            $('#body_div').append(`
                <!-- body Field ` + window.count + ` -->
                <div class="form-group col-sm-6" id="lavelina_body">
                    {!! Form::label('body', 'Testo articolo `+window.count+`:') !!}<span style="color:red">(less then 2350)</span>
                    <textarea name="body[]" class="form-control" id="body` + window.count + `"></textarea>
                </div>
                `)
            ckapplyeditor('body' + window.count);

        });
    </script>
@endpush
