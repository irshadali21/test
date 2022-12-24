@extends('layouts.app')

@push('pg_btn')

@can('create-post')
    <a href="{{ route('files.create') }}" class="btn btn-sm btn-neutral">{{ __('lang.create_files') }}</a>
@endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">{{ __('lang.All Files') }}</h3>
                        </div>
                        {{-- <div class="col-lg-4">
                            {!! Form::open(['route' => 'users.index', 'method'=>'get']) !!}
                                <div class="form-group mb-0">
                                {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Search files']) }}
                            </div>
                            {!! Form::close() !!}
                        </div> --}}
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center" id="file_tabel">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('lang.Company Name') }}</th>
                                    <th scope="col">{{ __('lang.VAT Number') }} </th>
                                    <th scope="col">{{ __('lang.Benefit') }}</th>
                                    <th scope="col">{{ __('lang.Year') }}</th>
                                    <th scope="col">{{ __('lang.ADVISOR') }}</th>
                                    <th scope="col" class="text-center">{{ __('lang.ACTIONS') }}</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($files as $post)
                                    <tr>
                                        <th scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$post->company->company_name }}
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$post->company->vat_number}}
                                        </td>
                                        <td class="budget">
                                            {{$post->benefit->column1}}
                                        <td class="budget">
                                            {{$post->year}}
                                        </td>
                                        <td class="budget">
                                            @if ($post->advisor)
                                            {{$post->advisor->name}}
                                                @else
                                                <span style="color: red"> {{ __('lang.Advisor Deleted') }} </span>
                                            @endif
                                        </td>
                                        {{-- <td class="budget">
                                            {{$post->company_administrator}}
                                        </td> --}}
                                        <td class="text-center">
                                            <div class="btn-group ">
                                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{ __('lang.Options') }}</i></button>
                                                <div class="dropdown-menu " style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -183px, 0px);" x-placement="top-start">
                                                    @can('view-file')
                                                        <a class="dropdown-item"  href="{{route('files.show', $post->id)}}">{{ __('lang.View File') }}</a>
                                                    @endcan
                                                    @can('update-file')
                                                        <a class="dropdown-item"  href="{{route('files.edit',$post->id)}}">{{ __('lang.Edit File') }}</a>
                                                    @endcan


                                                    {{-- <a class="dropdown-item"  href="{{route('files.advoiser_assignment_download',$post->id)}}">Download for Advoiser</a> --}}
                                                </div>
                                            </div>

                                            {{-- {!! Form::close() !!} --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- <script>
        jQuery(document).ready(function(){
            $('.delete').on('click', function(e){
                e.preventDefault();
                let that = jQuery(this);
                jQuery.confirm({
                    icon: 'fas fa-wind-warning',
                    closeIcon: true,
                    title: 'Are you sure!',
                    content: 'You can not undo this action.!',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        confirm: function () {
                            that.parent('form').submit();
                            //$.alert('Confirmed!');
                        },
                        cancel: function () {
                            //$.alert('Canceled!');
                        }
                    }
                });
            })
        })

    </script> --}}
    <script>
    jQuery(document).ready( function () {
        $('#file_tabel').DataTable({
                language: {
                    lengthMenu: '{{ __("lang.lengthMenu") }}',
                    zeroRecords: '{{ __("lang.zeroRecords") }}',
                    info: '{{ __("lang.info") }}',
                    infoEmpty: '{{ __("lang.infoEmpty") }}',
                    infoFiltered: '{{ __("lang.infoFiltered") }}',
                },
            });
        });
</script>
@endpush
