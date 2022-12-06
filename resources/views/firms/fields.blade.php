<!-- Firm Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firm_name', 'Firm Name:') !!}
    {!! Form::text('firm_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Firm Vat No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firm_vat_no', 'Firm Vat No:') !!}
    {!! Form::text('firm_vat_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Firm Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firm_type', 'Firm Type:') !!}
    {{-- {!! Form::text('firm_type', null, ['class' => 'form-control']) !!} --}}
    <select name="firm_type" id="firm_type" class="form-control select2">
        <option value="Società di Capitali" @if ($firm->firm_type == "Società di Capitali") Selected @endif>Società di Capitali</option>
        <option value="Società di Persone" @if ($firm->firm_type == "Società di Persone") Selected @endif>Società di Persone</option>
    </select>
</div>

<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Province:') !!}
    {{-- {!! Form::text('province_id', null, ['class' => 'form-control']) !!} --}}
    <select name="province_id" id="province_id" class="form-control select2">
        @foreach ($province as $province_item)
            <option value="{{ $province_item->id }}" @if ($firm->province_id == $province_item->id) Selected @endif>{{ $province_item->province }}</option>
        @endforeach
    </select>
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {{-- {!! Form::text('category', null, ['class' => 'form-control']) !!} --}}
    <select name="category" id="category" class="form-control select2">
        <option value="MICRO" @if ($firm->category == "MICRO") Selected @endif>MICRO</option>
        <option value="PICCOLA" @if ($firm->category == "PICCOLA") Selected @endif>PICCOLA</option>
        <option value="MEDIA" @if ($firm->category == "MEDIA") Selected @endif>MEDIA</option>
        <option value="GRANDE" @if ($firm->category == "GRANDE") Selected @endif>GRANDE</option>
    </select>
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Firm Owner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firm_owner', 'Firm Owner:') !!}
    {!! Form::text('firm_owner', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Email2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email2', 'Email2:') !!}
    {!! Form::text('email2', null, ['class' => 'form-control']) !!}
</div>

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sector_id', 'Sector:') !!}
    {{-- {!! Form::text('sector_id', null, ['class' => 'form-control']) !!} --}}
    <select name="sector_id" id="sector_id" class="form-control select2">
        @foreach ($sector as $sector_item)
            <option value="{{ $sector_item->id }}" @if ($firm->sector_id == $sector_item->id) Selected @endif>{{ $sector_item->name }}</option>
        @endforeach
    </select>
</div>

<!-- Ateco Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ateco_id', 'Ateco:') !!}
    
    {{-- {!! Form::text('ateco_id', null, ['class' => 'form-control']) !!} --}}

    <select name="ateco_id" id="ateco_id" class="form-control select2">
        @foreach ($ateco as $ateco_item)
            <option value="{{ $ateco_item->id }}" @if ($firm->ateco_id == $ateco_item->id) Selected @endif>{{ $ateco_item->code }}</option>
        @endforeach
    </select>
</div>



{{-- 
<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control']) !!}
</div> --}}