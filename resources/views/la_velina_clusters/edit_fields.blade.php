<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-12">
        <div class="form-group col-sm-4">
            {!! Form::label('name', 'Name:', ['class' => 'form-control-label']) !!}
            {!! Form::text('name', $laVelinaCluster->name, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12" style="margin-top: -40px;">
        <h2>Search By</h2>
    </div>
</div>

<div class="row" style="margin-top: -10px">
    <!-- Companies Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('firm', 'Firm Name', ['class' => 'form-control-label']) !!}
        {!! Form::text('companies', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {{ Form::label('advisor_name', 'Advisor', ['class' => 'form-control-label']) }}
            <select name="advisor_name" id="advisor_name" class='form-control select2'>
                <option value="" selected>Select Advisor ...</option>
                @foreach ($advisors as $advisor)
                    <option value="{{ $advisor->id }}">{{ $advisor->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-lg-3">
        <div class="form-group">
            {{ Form::label('sector', 'Sector', ['class' => 'form-control-label']) }}
            {{-- {{ Form::select('sector', $sector, null, ['class' => 'form-control select2', 'placeholder' => 'Select sector code...']) }} --}}
            <select name="sector" id="sector" class='form-control select2'>
                <option value="" selected>Select Sector ...</option>
                @foreach ($sector as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {{ Form::label('ateco_code', 'Ateco Code', ['class' => 'form-control-label']) }}
            {{-- {{ Form::select('ateco_code', $ateco_code, null, ['class' => 'form-control select2', 'placeholder' => 'Select Ateco code...']) }} --}}

            <select name="ateco_code" id="ateco_code" class='form-control select2'>
                <option value="" selected>ATECO </option>
                @foreach ($ateco_code as $ateco)
                    <option value="{{ $ateco->id }}">{{ $ateco->code }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row" style="margin-top: -20px">
    <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('province', 'Province', ['class' => 'form-control-label']) }}
            {{-- {{ Form::select('province', $province, null, ['class' => 'form-control select2', 'placeholder' => 'Select Province...']) }} --}}

            <select name="province" id="province" class='form-control select2'>
                <option value="" selected>Select Province ...</option>
                @foreach ($province as $province)
                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('firm_type', 'Firm Type', ['class' => 'form-control-label']) }}
            <select name="firm_type" id="firm_type" class='form-control'>
                <option value="" selected>Firm type</option>
                <option value="Società di Capitali">Società di Capitali</option>
                <option value="Società di Persone">Società di Persone</option>

            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('category', 'Category', ['class' => 'form-control-label']) }}
            <select name="category" id="category" class='form-control'>
                <option value="" selected>Category</option>
                <option value="MICRO">MICRO</option>
                <option value="PICCOLA">PICCOLA</option>
                <option value="MEDIA">MEDIA</option>
                <option value="GRANDE">GRANDE</option>
            </select>
        </div>
    </div>
    {{-- <div class="col-lg-4">
    <div class="form-group">
        {{ Form::label('phone_number', 'Phone Number', ['class' => 'form-control-label']) }}
        {{ Form::text('phone_number', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        {{ Form::label('firm_owner', 'Contact person', ['class' => 'form-control-label']) }}
        {{ Form::text('firm_owner', null, ['class' => 'form-control']) }}
    </div>
</div> --}}

    {{-- <div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('opration_email', 'E-Mail Opration', ['class' => 'form-control-label']) }}
        {{ Form::text('opration_email', null, ['class' => 'form-control']) }}
    </div>
</div> --}}

</div>
