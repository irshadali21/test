<div class="row">

    <!-- Name Field -->
    <div class="form-group col-sm-12">
        <div class="form-group col-sm-4">
            {!! Form::label('name', __('lang.Cluster Name'), ['class' => 'form-control-label']) !!}
            {!! Form::datetime('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12" style="margin-top: -40px;">
        <h2>{{ __('lang.Cluster Search') }}</h2>
    </div>
</div>
<div class="row" style="margin-top: -10px">
    <!-- Companies Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('firm', __('lang.Firm Name'), ['class' => 'form-control-label']) !!}
        {{-- {!! Form::select('companies', $companies, null, ['class' => 'form-control select2', 'placeholder' => '']) !!} --}}

        {{-- <select name="firm" id="firm" class= 'form-control select2'>
        <option value="" selected >Company ( Vat Number )</option>
        @foreach ($firms as $company)
            <option value="{{ $company->id }}">{{ $company->firm_name }} ( {{ $company->firm_vat_no }} )</option>
        @endforeach
    </select> --}}
        {!! Form::text('firm', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {{ Form::label('advisor_name', __('lang.Cluster Advisor Name'), ['class' => 'form-control-label']) }}
            {{-- {{ Form::text('advisor_name', null, ['class' => 'form-control']) }} --}}
            <select name="advisor_name" id="advisor_name" class='form-control select2'>
                <option value="" selected>{{ __('lang.Cluster Advisor Name') }}</option>
                @foreach ($advisors as $advisor)
                    <option value="{{ $advisor->id }}">{{ $advisor->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-lg-3">
        <div class="form-group">
            {{ Form::label('sector', __('lang.Sector'), ['class' => 'form-control-label']) }}
            {{-- {{ Form::select('sector', $sector, null, ['class' => 'form-control select2', 'placeholder' => 'Select sector code...']) }} --}}
            <select name="sector" id="sector" class='form-control select2'>
                <option value="" selected>{{ __('lang.Sector') }}</option>
                @foreach ($sector as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {{ Form::label('ateco_code', __('lang.Ateco Code'), ['class' => 'form-control-label']) }}
            {{-- {{ Form::select('ateco_code', $ateco_code, null, ['class' => 'form-control select2', 'placeholder' => 'Select Ateco code...']) }} --}}

            <select name="ateco_code" id="ateco_code" class='form-control select2'>
                <option value="" selected>{{ __('lang.Ateco Code') }} </option>
                @foreach ($ateco_code as $ateco)
                    <option value="{{ $ateco->id }}">{{ $ateco->code }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row" style="margin-top: -20px" id="lastrow">
    <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('province', __('lang.Province'), ['class' => 'form-control-label']) }}
            {{-- {{ Form::select('province', $province, null, ['class' => 'form-control select2', 'placeholder' => 'Select Province...']) }} --}}

            <select name="province" id="province" class='form-control select2'>
                <option value="" selected>{{ __('lang.Province') }}</option>
                @foreach ($province as $province)
                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('firm_type', __('lang.Firm Type'), ['class' => 'form-control-label']) }}
            <select name="firm_type" id="firm_type" class='form-control'>
                <option value="" selected>{{ __('lang.Firm Type') }}</option>
                <option value="Società di Capitali">Società di Capitali</option>
                <option value="Società di Persone">Società di Persone</option>

            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="category" class="form-control-label">{{ __('lang.Category') }} </label> <span id="addcat" class="btn btn-sm btn-outline-success" style="float: right">+</span>
            <select name="category[]" id="category" class='form-control category'>
                <option value="" selected>{{__('lang.Category')}}</option>
                <option value="MICRO">MICRO</option>
                <option value="PICCOLA">PICCOLA</option>
                <option value="MEDIA">MEDIA</option>
                <option value="GRANDE">GRANDE</option>
            </select>
        </div>
    </div>
    {{-- <div class="col-md-1">

    </div> --}}
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
