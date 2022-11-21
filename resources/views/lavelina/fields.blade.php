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

<div id="body_div" class="row">

    <!-- body Field -->
    <div class="form-group col-sm-6" id="lavelina_body">
        
        {!! Form::label('body', 'Testo articolo: ') !!}<span style="color:red">(less then 1500)</span>
        <textarea name="body[]" id="summernote_body_1"></textarea>
    </div>

</div>

<!-- firms Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firms', 'Chi Può:') !!}
    {!! Form::textarea('firms', null, ['class' => 'form-control summernote']) !!}
</div>

<!-- benefits Field -->
<div class="form-group col-sm-6">
    {!! Form::label('benefits', 'Per Cosa:') !!}
    {!! Form::textarea('benefits', null, ['class' => 'form-control summernote']) !!}
</div>

<!-- Benefits Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('benefits_in_number', 'Quanto:') !!}
    {!! Form::textarea('benefits_in_number', null, ['class' => 'form-control summernote']) !!}
</div>

<!-- tax_breack Field -->
<div class="form-group col-sm-6" style="height:350px">
    {!! Form::label('tax_breack', 'Quali agevolazioni:') !!}
    {!! Form::textarea('tax_breack', null, ['class' => 'form-control summernote']) !!}
</div>

<!-- source Field -->
<div class="form-group col-sm-6" style="height:350px">
    {!! Form::label('source', 'Fonti:') !!}
    {!! Form::textarea('source', null, ['class' => 'form-control summernote']) !!}
</div>
