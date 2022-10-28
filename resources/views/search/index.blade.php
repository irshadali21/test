@extends('layouts.app')
@push('pg_btn')
@endpush
@push('styles')
    
@endpush    
@section('content')
@foreach ($user_result as $users)
<div class="card">
    {{-- @dd() --}}
    <div class="card-body">
        <h5 class="card-title">{{ $users->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">
            @if ($users->roles()->pluck('name'))
                {{ $users->roles()->pluck('name')[0] }}
            @endif
        </h6>
        <p class="card-text">{{ $users->email }}</p>
      </div>
  </div>
@endforeach
@foreach ($company_result as $company)
<div class="card">
    {{-- @dd() --}}
    <div class="card-body">
        <h5 class="card-title">{{ $company->company_name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">
            Company
        </h6>
        <p class="card-text"><strong>VAT NUMBER</strong> {{ $company->vat_number }}</p>
      </div>
  </div>
@endforeach
  
@endsection
