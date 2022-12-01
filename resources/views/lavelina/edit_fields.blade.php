<div class="row">

    <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'LA VELINA Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {{-- <!-- advisor Field -->
<div class="form-group col-sm-4">
    {!! Form::label('advisor', 'Advisor:') !!}
    <select name="advisor" id="advisor" class="form-control select2">
        @foreach ($advisor as $adv)
            <option value="{{ $adv->id }}"
                @isset($lavelina)
                @if ($lavelina->advisor_id == $adv->id)
                    Selected
                @endif
            @endisset>
                {{ $adv->name }}</option>
        @endforeach
    </select>
</div> --}}

    <div class="form-group col-sm-4">
        {!! Form::label('title', 'Tttolo articolo:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <!-- color Field -->
    <div class="col-sm-4">
        <label for="example-color-input">color</label>
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
</div>


<!-- body Field -->
<div id="body_div" class="row">
    <div class="form-group @if ( $filters['percosa_checkbox'] == 'on' || $filters['chipuo_checkbox'] == 'on')
    col-sm-7 @else col-sm-12
    @endif" id="lavelina_body" style="">
        {!! Form::label('body', 'Testo articolo: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body" class="form-control" rows="23">@if (isset($body[0])){{ $body[0]->lavelina_body }} @endif</textarea>
    </div>

    <div class="form-group col-sm-5" id="contatiner1" 
    @if ( $filters['percosa_checkbox'] == 'on' || $filters['chipuo_checkbox'] == 'on')
     @else  style="display: none"
    @endif
     >
        <div id="firms_div"  @if ( !$filters['chipuo_checkbox'] == 'on') style="display: none" @endif >
            <!-- firms Field -->
            {!! Form::label('firms', 'Box 1:') !!}
            {!! Form::textarea('firms', null, ['class' => 'form-control']) !!}
        </div>
        <div id="benefits_div" @if ( !$filters['percosa_checkbox'] == 'on') style="display: none" @endif >
            <!-- benefits Field -->
            {!! Form::label('benefits', 'Box 2:') !!}
            {!! Form::textarea('benefits', null, ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        <label for="body2_checkbox">Body Page 2</label>
        <input type="checkbox" class="body2div" name="body2_checkbox" {{ $filters['body2_checkbox'] == 'on' ? 'checked' : '' }} id="body2_checkbox">
    </div>
    <div class="form-group col-sm-4">
        <label for="quanto_checkbox">Box 3</label>
        <input type="checkbox" class="body2div" name="quanto_checkbox" {{ $filters['quanto_checkbox'] == 'on' ? 'checked' : '' }} id="quanto_checkbox">
    </div>
    <div class="form-group col-sm-4">
        <label for="quali_checkbox">Box 4</label>
        <input type="checkbox" class="body2div" name="quali_checkbox" {{ $filters['quali_checkbox'] == 'on' ? 'checked' : '' }} id="quali_checkbox">
    </div>
</div>
<div id="body2_row" class="row" 
@if ( $filters['body2_checkbox'] == 'on' || $filters['quanto_checkbox'] == 'on' || $filters['quali_checkbox'] == 'on')
@else  style="display: none"
@endif>
    
<div class="form-group @if ( $filters['quanto_checkbox'] == 'on' || $filters['quali_checkbox'] == 'on')
    col-sm-7 @else col-sm-12
    @endif"  
    @if ( !$filters['body2_checkbox'] == 'on') style="display: none" @endif
    id="body2_div">
        {!! Form::label('body', 'Testo articolo 2: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body2" class="form-control" rows="23">@if (isset($body[1])){{ $body[1]->lavelina_body }} @endif</textarea>
        <label for="body3div">Body page 3</label>
        <input type="checkbox" class="body3div" name="body3div" id="body3div" {{ $filters['body3div'] == 'on' ? 'checked' : '' }}>
    </div>

    <!-- Benefits Quantity Field -->
    <div class="form-group col-sm-5" style="display: none" id="body2right_div">
        <div id="benefits_in_number_div" @if ( !$filters['quanto_checkbox'] == 'on') style="display: none" @endif>
            {!! Form::label('benefits_in_number', 'Box 3:') !!}
            {!! Form::textarea('benefits_in_number', null, ['class' => 'form-control ']) !!}
        </div>
        <div id="tax_breack_div" @if ( !$filters['quali_checkbox'] == 'on') style="display: none" @endif>
            <!-- tax_breack Field -->
            {!! Form::label('tax_breack', 'Box 4:') !!}
            {!! Form::textarea('tax_breack', null, ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12" @if ( !$filters['body3div'] == 'on') style="display: none" @endif id="body3_div">
        {!! Form::label('body', 'Testo articolo 3: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body3" class="form-control" rows="23"> @if (isset($body[2])){{ $body[2]->lavelina_body }} @endif </textarea>
        <label for="body4div">Body page 4</label>
        <input type="checkbox" class="body4div" name="body4div" id="body4div" {{ $filters['body4div'] == 'on' ? 'checked' : '' }}>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12" @if ( !$filters['body4div'] == 'on') style="display: none" @endif id="body4_div">
        {!! Form::label('body', 'Testo articolo 4: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body4" class="form-control" rows="23" >@if (isset($body[3])){{ $body[3]->lavelina_body }} @endif</textarea>
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


{{-- 

    <div id="body_div" class="row">

        @foreach ($body as $body_text)
            @php
                $count++;
            @endphp
            <!-- body Field -->
            <div class="form-group col-sm-6" id="lavelina_body">
                <label>Testo articolo: @if ($count > 1)
                        {{ $count }}
                    @endif
                </label>
                {!! Form::label('body', ' ') !!}<span style="color:red">
                    @if ($count > 1)
                        (less then 2350)
                    @else
                        (less then 1500)
                    @endif
                </span>
                <textarea name="body[]" id="body{{ $count }}">{!! $body_text->lavelina_body !!}</textarea>
                <div id="bodyword-count"></div>
            </div>
        @endforeach
    </div>

    <!-- firms Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('firms', 'Chi Può:') !!}
        {!! Form::textarea('firms', $lavelina->firms, ['class' => 'form-control']) !!}
    </div>

    <!-- benefits Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('benefits', 'Per Cosa:') !!}
        {!! Form::textarea('benefits', $lavelina->benefits, ['class' => 'form-control']) !!}
    </div>

    <!-- Benefits Quantity Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('benefits_in_number', 'Quanto:') !!}
        {!! Form::textarea('benefits_in_number', $lavelina->benefits_in_number, ['class' => 'form-control']) !!}
    </div>

    <!-- tax_breack Field -->
    <div class="form-group col-sm-6" style="height:350px">
        {!! Form::label('tax_breack', 'Quali agevolazioni:') !!}
        <textarea name="tax_breack" id="tax_breack" class="form-control">{!! $lavelina->tex_breack !!}</textarea>
    </div>

    <!-- source Field -->
    <div class="form-group col-sm-6" style="height:350px">
        {!! Form::label('source', 'Fonti:') !!}
        {!! Form::textarea('source', $lavelina->source, ['class' => 'form-control']) !!}
    </div>
</div> --}}
