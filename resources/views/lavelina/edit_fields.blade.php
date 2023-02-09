<div class="row">

    <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', __('lang.VALINA Name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('title', __('lang.Article Title')) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <!-- color Field -->
    <div class="col-sm-4">
        <label for="example-color-input">{{ __('lang.Color Valina') }}</label>
        <input name="color" class="form-control" type="color" value="{{ $lavelina->body }}"
            id="example-color-input">
    </div>

    <div class="col-md-12"><hr></div>

    <div class="form-group col-sm-2">
        <label>Body</label>
        <input type="checkbox" checked disabled>
    </div>
    <div class="form-group col-sm-2">
        <label for="chipuo_checkbox">Box 1</label>
        {{-- @dd($filters['chipuo_checkbox']); --}}
        <input type="checkbox" name="chipuo_checkbox" {{ $filters['chipuo_checkbox'] == 'on' ? 'checked' : '' }} id="chipuo_checkbox">
    </div>
    <div class="form-group col-sm-2">
        <label for="percosa_checkbox">Box 2</label>
        <input type="checkbox" name="percosa_checkbox" {{ $filters['percosa_checkbox'] == 'on' ? 'checked' : '' }} id="percosa_checkbox">
    </div>
    <div class="form-group col-sm-2">
        <label for="quanto_checkbox">Box 2</label>
        <input type="checkbox" class="body2div" name="quanto_checkbox" {{ $filters['quanto_checkbox'] == 'on' ? 'checked' : '' }} id="quanto_checkbox">
    </div>
    <div class="form-group col-sm-2">
        <label for="quali_checkbox">Box 2</label>
        <input type="checkbox" class="body2div" name="quali_checkbox" {{ $filters['quali_checkbox'] == 'on' ? 'checked' : '' }} id="quali_checkbox">
    </div>
</div>


<!-- body Field -->
<div id="body_div" class="row">
    <div id="firms_div" class="form-group col-sm-12" style="display: {{ $filters['chipuo_checkbox'] == 'on' ? 'block' : 'none' }}">
        <!-- firms Field -->
        {!! Form::label('firms', 'Box 1:') !!}
        {!! Form::textarea('firms', null, ['class' => 'form-control']) !!}
    </div>
    <div id="benefits_div" class="form-group col-sm-12" style="display: {{ $filters['percosa_checkbox'] == 'on' ? 'block' : 'none' }}">
        <!-- benefits Field -->
        {!! Form::label('benefits', 'Box 2:') !!}
        {!! Form::textarea('benefits', null, ['class' => 'form-control ']) !!}
    </div>
    <div id="benefits_in_number_div" class="form-group col-sm-12" style="display: {{ $filters['quanto_checkbox'] == 'on' ? 'block' : 'none' }}">
        {!! Form::label('benefits_in_number', 'Box 3:') !!}
        {!! Form::textarea('benefits_in_number', null, ['class' => 'form-control ']) !!}
    </div>
    <div id="tax_breack_div" class="form-group col-sm-12" style="display: {{ $filters['quali_checkbox'] == 'on' ? 'block' : 'none' }}">
        <!-- tax_breack Field -->
        {!! Form::label('tax_breack', 'Box 4:') !!}
        {!! Form::textarea('tax_breack', null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('body', 'Testo articolo: ') !!}
        <textarea name="body[]" id="body" class="form-control" rows="23">@if (isset($body[0])){{ $body[0]->lavelina_body }} @endif</textarea>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('body', 'Testo articolo: ') !!}
        <textarea name="body[]" id="body2" class="form-control" rows="23">@if (isset($body[1])){{ $body[1]->lavelina_body }} @endif</textarea>
    </div>
</div>

<div class="col-md-12">

    <h3>Page 2</h3>
</div>

<div class="row">
    <div class="form-group col-sm-4">
        <label for="body2_checkbox">Body Page 2</label>
        <input type="checkbox" class="body2div" @if(isset($filters['body2_checkbox'])) @if ( $filters['body2_checkbox'] == 'on') checked @endif @endif name="body2_checkbox" id="body2_checkbox">
    </div>
</div>
<div class="row" id="body2_row"  @if(isset($filters['body2_checkbox']))   @if( !$filters['body2_checkbox'] == 'on' ) style="display:none" @endif @else style="display:none" @endif>

    <div class="form-group col-sm-6">
        {!! Form::label('body', 'Testo articolo 2: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body3" class="form-control" rows="23">@if (isset($body[2])){{ $body[2]->lavelina_body }} @endif</textarea>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('body', 'Testo articolo 2: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body4" class="form-control" rows="23">@if (isset($body[3])){{ $body[3]->lavelina_body }} @endif</textarea>
    </div>
    <div class="col-sm-12">
        <label for="body3div">Body page 3</label>
        <input type="checkbox" class="body3div" name="body3div" id="body3div" @if(isset($filters['body3div']))  @if ( $filters['body3div'] == 'on') checked @endif @endif>
    </div>
</div>
<div class="row" id="body3_div" @if(isset($filters['body3div']))  @if( !$filters['body3div'] == 'on' ) style="display:none" @endif @else style="display:none" @endif>
    <div class="col-sm-12">
        <h3>Page 3</h3>
    </div>
    <div class="col-sm-6 form-group">
        {!! Form::label('body', 'Testo articolo 3: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body5" class="form-control" rows="23">@if (isset($body[4])){{ $body[4]->lavelina_body }} @endif</textarea>
    </div>
    <div class="col-sm-6 form-group">
        {!! Form::label('body', 'Testo articolo 3: ') !!}
        <textarea name="body[]" id="body6" class="form-control" rows="23">@if (isset($body[5])){{ $body[5]->lavelina_body }} @endif</textarea>
    </div>

    <label for="body4div">Body page 4</label>
    <input type="checkbox" class="body4div" name="body4div" id="body4div" @if(isset($filters['body4div'])) @if ( $filters['body4div'] == 'on') checked @endif @endif>
</div>
<div class="row" id="body4_div" @if(isset($filters['body4div'])) @if( !$filters['body4div'] == 'on' ) style="display:none" @endif @else style="display:none" @endif>

    <div class="col-sm-12">
        <h3>Page 4</h3>
    </div>
    <div class="col-sm-6 form-group">
        {!! Form::label('body', 'Testo articolo 4: ') !!}
        <textarea name="body[]" id="body7" class="form-control" rows="23">@if (isset($body[6])){{ $body[6]->lavelina_body }} @endif</textarea>

    </div>
    <div class="col-sm-6 form-group">
        {!! Form::label('body', 'Testo articolo 4: ') !!}
        <textarea name="body[]" id="body8" class="form-control" rows="23">@if (isset($body[7])){{ $body[7]->lavelina_body }} @endif</textarea>
    </div>
</div>



<div class="row">
    <div class="form-group col-sm-2">
        <label for="fonti_checkbox">Fonti</label>
        <input type="checkbox" class="body2div" name="fonti_checkbox"  {{ $filters['fonti_checkbox'] == 'on' ? 'checked' : '' }} id="fonti_checkbox">
    </div>
</div>
<div class="row" id="source_div" @if ( !$filters['fonti_checkbox'] == 'on') style="display: none" @endif>
    <!-- source Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('source', 'Fonti:') !!}
        {!! Form::textarea('source', null, ['class' => 'form-control ']) !!}
    </div>
</div>

