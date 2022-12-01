<div class="row">

    <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'LA VELINA Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    {{-- 
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
    </div> --}}

    <div class="form-group col-sm-4">
        {!! Form::label('title', 'Tttolo articolo:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <!-- color Field -->
    <div class="col-sm-4">
        <label for="example-color-input">color</label>
        <input name="color" class="form-control" type="color" value="#6a1109" id="example-color-input">
    </div>


    <div class="col-md-12"><hr></div>


    <div class="form-group col-sm-2">
        <label>Body</label>
        <input type="checkbox" checked disabled>
    </div>
    <div class="form-group col-sm-2">
        <label for="chipuo_checkbox">Box 1</label>
        <input type="checkbox" name="chipuo_checkbox" id="chipuo_checkbox">
    </div>
    <div class="form-group col-sm-2">
        <label for="percosa_checkbox">Box 2</label>
        <input type="checkbox" name="percosa_checkbox" id="percosa_checkbox">
    </div>


    {{-- <!-- title Field -->
    <div class="col-sm-6">
        Add another Testo articolo
        <button class="button_plus" id="add_body" type="button">+</button>
    </div> --}}


</div>

<!-- body Field -->
<div id="body_div" class="row">
    <div class="form-group col-sm-12" id="lavelina_body" style="">
        {!! Form::label('body', 'Testo articolo: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body" class="form-control" rows="23"></textarea>
    </div>

    <div class="form-group col-sm-5" id="contatiner1" style="display: none">
        <div id="firms_div" style="display: none">
            <!-- firms Field -->
            {!! Form::label('firms', 'Box 1:') !!}
            {!! Form::textarea('firms', null, ['class' => 'form-control']) !!}
        </div>
        <div id="benefits_div" style="display: none">
            <!-- benefits Field -->
            {!! Form::label('benefits', 'Box 2:') !!}
            {!! Form::textarea('benefits', null, ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        <label for="body2_checkbox">Body Page 2</label>
        <input type="checkbox" class="body2div" name="body2_checkbox" id="body2_checkbox">
    </div>
    <div class="form-group col-sm-4">
        <label for="quanto_checkbox">Box 3</label>
        <input type="checkbox" class="body2div" name="quanto_checkbox" id="quanto_checkbox">
    </div>
    <div class="form-group col-sm-4">
        <label for="quali_checkbox">Box 4</label>
        <input type="checkbox" class="body2div" name="quali_checkbox" id="quali_checkbox">
    </div>
</div>
<div id="body2_row" class="row" style="display: none">
    <div class="form-group col-sm-12" style="display: none" id="body2_div">
        {!! Form::label('body', 'Testo articolo 2: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body2" class="form-control" rows="23"></textarea>
        <label for="body3div">Body page 3</label>
        <input type="checkbox" class="body3div" name="body3div" id="body3div">
    </div>

    <!-- Benefits Quantity Field -->
    <div class="form-group col-sm-5" style="display: none" id="body2right_div">
        <div id="benefits_in_number_div" style="display: none">
            {!! Form::label('benefits_in_number', 'Box 3:') !!}
            {!! Form::textarea('benefits_in_number', null, ['class' => 'form-control ']) !!}
        </div>
        <div id="tax_breack_div" style="display: none">
            <!-- tax_breack Field -->
            {!! Form::label('tax_breack', 'Box 4:') !!}
            {!! Form::textarea('tax_breack', null, ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12" style="display: none" id="body3_div">
        {!! Form::label('body', 'Testo articolo 3: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body3" class="form-control" rows="23"></textarea>
        <label for="body4div">Body page 4</label>
        <input type="checkbox" class="body4div" name="body4div" id="body4div">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12" style="display: none" id="body4_div">
        {!! Form::label('body', 'Testo articolo 4: ') !!}
        {{-- <span style="color:red">(less then 1500)</span> --}}
        <textarea name="body[]" id="body4" class="form-control" rows="23"></textarea>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-2">
        <label for="fonti_checkbox">Fonti</label>
        <input type="checkbox" class="body2div" name="fonti_checkbox" id="fonti_checkbox">
    </div>
</div>
<div class="row" id="source_div" style="display: none">
    <!-- source Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('source', 'Fonti:') !!}
        {!! Form::textarea('source', null, ['class' => 'form-control ']) !!}
    </div>
</div>
