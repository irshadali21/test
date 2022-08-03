@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{-- {{ Form::open(['route' => 'api.test', 'files'=>false]) }} --}}
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">API Test</h3></div>
                <div class="card-body">
                        <div class="row">
                           <button type="button" id="check-button" class="btn btn-secondary">Click to check API</button> 
                        </div>
                        <div id="check">

                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
            </div>
            {{-- {{ Form::close() }} --}}
            {{-- <div class="card mb-5">
                <div class="card-header bg-transparent"><h4 class="mb-0">Display Settings</h4></div>
                <div class="card-body">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h4 class="mb-0">Other Settings</h4></div>
                <div class="card-body">
                    <div class="row">
                        
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#check-button').on('click', function(){
            $.ajax({
                type: 'post',
                url: '{{ route('api.test') }}',
                // data: '',
                success: function(countries){
                    // alert($(countries).length);
                    var contry = '';
                    $.each(countries, function(){
                        $.each(this, function(k, v) {
                            $.each(this, function(k, v) {
                                contry += '<br>';
                                contry += v.countryName;
                        });
                        });
                        
                    })


                    $('#check').empty();
                    $('#check').append('<div class="success"><p> api is connected successfull the reult was list of cuntries are'+contry+'</p></div>');
                }
            })
        })
    })
</script>
@endpush
