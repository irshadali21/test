<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', 'LA VELINA Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- advisor Field -->
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
</div>

<div class="form-group col-sm-4">
    {!! Form::label('title', 'Tttolo articolo:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-12">
    <hr>
</div>

<!-- title Field -->
<div class="col-sm-6">
    Add another Testo articolo
    <button class="button_plus" id="add_body" type="button">+</button>
</div>
<!-- color Field -->
<div class="col-sm-6">
    Color
    <input name="color" class="form-control" type="color" value="{{ $lavelina->body }}" id="example-color-input">
</div>


<div id="body_div" class="row">

@foreach ($body as $body_text)
@php
    $count++;
@endphp
        <!-- body Field -->
        <div class="form-group col-sm-6" id="lavelina_body">
            <label>Testo articolo: @if ($count > 1){{ $count }}@endif</label>
            {!! Form::label('body', ' ') !!}<span style="color:red">
                @if ($count > 1)
                (less then 2350)
                @else
                (less then 1500)
                @endif</span>
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
