<!-- Firm Name Field -->
<div class="col-sm-3">
    {!! Form::label('firm_name', 'Firm Name:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->firm_name }}</p>
</div>

<!-- Firm Vat No Field -->
<div class="col-sm-3">
    {!! Form::label('firm_vat_no', 'Firm Vat No:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->firm_vat_no }}</p>
</div>

<!-- Firm Type Field -->
<div class="col-sm-3">
    {!! Form::label('firm_type', 'Firm Type:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->firm_type }}</p>
</div>

<!-- Province Id Field -->
<div class="col-sm-3">
    {!! Form::label('province_id', 'Province:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->province->province }}</p>
</div>

<!-- Category Field -->
<div class="col-sm-3">
    {!! Form::label('category', 'Category:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->category }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-3">
    {!! Form::label('phone_number', 'Phone Number:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->phone_number }}</p>
</div>

<!-- Firm Owner Field -->
<div class="col-sm-3">
    {!! Form::label('firm_owner', 'Firm Owner:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->firm_owner }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-3">
    {!! Form::label('email', 'Email:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->email }}</p>
</div>

<!-- Email2 Field -->
<div class="col-sm-3">
    {!! Form::label('email2', 'Email2:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->email2 }}</p>
</div>

<!-- Sector Id Field -->
<div class="col-sm-3">
    {!! Form::label('sector_id', 'Sector:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->sector->name }}</p>
</div>

<!-- Ateco Id Field -->
<div class="col-sm-3">
    {!! Form::label('ateco_id', 'Ateco:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->ateco->code }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-3">
    {!! Form::label('created_by', 'Created By:', ['class' => 'form-control-label']) !!}
    <p>{{ $firm->levlelina_advisor->name }}</p>
</div>
