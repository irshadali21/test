
@push('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote-bs4.min.css')}}">    
{{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}

<style>
    .note-editable{
        height: 175px;
    }

    .button_plus {
      color: #fff!important;
      background-color: #000!important;
      font-size: 15px!important;
      border-radius: 50%;
}


</style>

@endpush


@push('scripts')
<script src="{{asset('assets/vendor/summernote/summernote.min.js')}}"></script>
<script>


$(document).ready(function() {
  $('.summernote').summernote('code', {
    height: 300,
    maxTextLength: 1500,
  });
  
  $('#summernote_body_1').summernote('code', {
    height: 300,
    maxTextLength: 1500,
  });
  $('.summernote_body').summernote('code', {
    height: 300,
    maxTextLength: 2350,
  });
  
  
  window.count = 1;

  $('#add_body').on('click', function(){
    $('.summernote_body').summernote('destroy');
    window.count++;
    $('#body_div').append(`
    <!-- body Field `+window.count+` -->
    <div class="form-group col-sm-6" id="lavelina_body">
        {!! Form::label('body', 'Testo articolo `+window.count+`:') !!}<span style="color:red">(less then 2350)</span>
        <textarea name="body[]" class="summernote_body"></textarea>
    </div>

    `)

    $('.summernote_body').summernote('code', {
    height: 300,
    maxTextLength: 2350,
  });
  });


});





    
</script>
@endpush
