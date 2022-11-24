<!-- Name Field -->
<div class="form-group col-sm-12">
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'Name:' , ['class' => 'form-control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<br>

<!-- Companies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('companies', 'Company ( VAT Number )' , ['class' => 'form-control-label']) !!}
    {{-- {!! Form::select('companies', $companies, null, ['class' => 'form-control select2', 'placeholder' => '']) !!} --}}
    
    <select name="companies" id="companies" class= 'form-control select2'>
        <option value="" selected >Company ( Vat Number )</option>
        @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->company_name }} ( {{ $company->vat_number }} )</option>
        @endforeach
    </select>
    {{-- {!! Form::text('companies', null, ) !!} --}}
</div>

<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('benefits', 'Type of Benefits', ['class' => 'form-control-label']) }}
        {{ Form::select('benefits', $benefits, null, ['class' => 'form-control select2', 'placeholder' => 'Select Benefits...']) }}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        {{ Form::label('inc_send_date', 'Incarico Send Date', ['class' => 'form-control-label']) }}
        {{ Form::date('inc_send_date', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        {{ Form::label('certificate_issue_date', 'Certification Issue Date', ['class' => 'form-control-label']) }}
        {{ Form::date('certificate_issue_date', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        {{ Form::label('file_date', 'File Creation Date', ['class' => 'form-control-label']) }}
        {{ Form::date('file_date', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('advisor_name', 'Advisor Name', ['class' => 'form-control-label']) }}
        {{ Form::text('advisor_name', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('opration_email', 'E-Mail Opration', ['class' => 'form-control-label']) }}
        {{ Form::text('opration_email', null, ['class' => 'form-control']) }}
    </div>
</div>