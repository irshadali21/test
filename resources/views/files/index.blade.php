@extends('layouts.app')
@push('pg_btn')
@can('create-post')
    <a href="{{ route('file.create') }}" class="btn btn-sm btn-neutral">Create New File</a>
@endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">All Files</h3>
                        </div>
                        <div class="col-lg-4">
                    {!! Form::open(['route' => 'post.index', 'method'=>'get']) !!}
                        <div class="form-group mb-0">
                        {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Search post']) }}
                    </div>

                    {!! Form::close() !!}
                </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">VAT Number </th>
                                    <th scope="col">PEC Email</th>
                                    <th scope="col">Create By</th>
                                    <th scope="col">Director</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($files as $post)
                                    <tr>
                                        <th scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$post->company_name }}
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$post->vat_number}}
                                        </td>
                                        <td class="budget">
                                            {{$post->email_address}}

                                        </td>
                                        <td class="budget">
                                            {{$post->auditor->name}}
                                        </td>
                                        <td class="budget">
                                            {{$post->company_administrator}}
                                            
                                        </td>
                                        <td class="text-center">
                                            {{-- @can('destroy-post')
                                            {!! Form::open(['route' => ['post.destroy', $post],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan
                                            @can('view-post')
                                            <a class="btn btn-primary btn-sm m-1" data-toggle="tooltip" data-placement="top" title="View and edit post details" href="{{route('post.show', $post)}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            @endcan
                                            @can('update-post')
                                            <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Edit post details" href="{{route('post.edit',$post)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            @endcan
                                            @can('destroy-post')
                                                <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Delete post" href="">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                            @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot >
                                <tr>
                                    <td colspan="6">
                                        {{$files->links()}}
                                    </td>
                                </tr>
                                </tfoot>
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
@endpush
