@extends('layouts.app')
@push('styles')
<style>
    .image-box {
    width: 100%;
    overflow: hidden;
    margin: 0px auto;
    height: 100%;
    background-color: #d9d9d9;
    font-size: 40px;
    border-radius: 10px;
    border: 5px dashed #898989;
}
</style>
@endpush
@push('pg_btn')
@can('create-post')
    <a href="{{ route('files.create') }}" class="btn btn-sm btn-neutral">Create New File</a>
@endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    {{-- <div class="row images-container">
                        <div class="col-md-6 file-upload-box mt-1">
                            <div class="text-white text-center upload-box">
                                <i style="margin-top: 50px;" class="fa fa-upload"></i>
                            </div>
                            <input type="file" name="images[]" class="file-selector" style="display:none" id="">
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">All Files</h3>
                        </div>
                        
                        
                        <div class="col-lg-4">
                    {{-- {!! Form::open(['route' => 'post.index', 'method'=>'get']) !!}
                        <div class="form-group mb-0">
                        {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Search post']) }}
                    </div>

                    {!! Form::close() !!} --}}
                </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            
                           

                            <table class="table table-hover align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Company Name</th>
                                    
                                    <th scope="col">Benefit</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Certificat status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($uncertified as $post)
                                @if (!$post->certificate)
                                    

                                    <tr>
                                        <th scope="row">
                                            <div class="mx-w-300 d-flex flex-wrap">
                                                {{$post->company->company_name }}
                                            </div>
                                        </th>
                                      
                                        <td class="budget">
                                            {{$post->benefit->column1}}
                                        <td class="budget">
                                            {{$post->year}}
                                        </td>
                                        <td class="budget">
                                            to be certified
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group ">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Options</i></button>
                                                <div class="dropdown-menu " style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -183px, 0px);" x-placement="top-start">
                                                    @can('view-file')
                                                        <a class="dropdown-item"  href="{{route('files.show', $post->id)}}">View File</a>
                                                    @endcan
                                                    @can('update-file')
                                                        <a class="dropdown-item"  href="{{route('files.edit',$post->id)}}">Edit File</a>
                                                    @endcan
                                                    @can('view-certificate')
                                                        <a class="dropdown-item"  href="{{route('certificate.show',$post->id)}}">Create Certificate</a>
                                                    @endcan

                                                    {{-- <a class="dropdown-item"  href="{{route('files.advoiser_assignment_download',$post->id)}}">Download for Advoiser</a> --}}
                                                </div>
                                            </div>
                                            
                                            {{-- {!! Form::close() !!} --}}
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                @foreach($unpaid_files as $certificate)
                                    <tr>
                                        <th scope="row">
                                            <div class="mx-w-300 d-flex flex-wrap">
                                                {{$certificate->company_name }}
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$certificate->benefits}}
                                        <td class="budget">
                                            {{$certificate->benefits_year}}
                                        </td>
                                        <td class="budget">
                                            certified and unpaid
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group ">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Options</i></button>
                                                <div class="dropdown-menu " style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -183px, 0px);" x-placement="top-start">
                                                    @can('view-file')
                                                        <a class="dropdown-item"  href="{{route('files.show', $certificate->id)}}">View File</a>
                                                    @endcan
                                                    @can('update-file')
                                                        <a class="dropdown-item"  href="{{route('files.edit',$certificate->id)}}">Edit File</a>
                                                    @endcan
                                                    @can('update-certificate')
                                                        <a class="dropdown-item"  href="{{route('certificate.edit',$certificate->id)}}">Modify Certificate</a>
                                                    @endcan
                                                    @can('view-certificate')
                                                        <a class="dropdown-item"  href="{{route('certificate.show',$certificate->id)}}">Download Certificate</a>
                                                        <a class="dropdown-item"  href="{{route('certificate.send',$certificate->id)}}">Send Certificate</a>
                                                    @endcan
                                                    

                                                    {{-- <a class="dropdown-item"  href="{{route('files.advoiser_assignment_download',$post->id)}}">Download for Advoiser</a> --}}
                                                </div>
                                            </div>
                                            
                                            {{-- {!! Form::close() !!} --}}
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($paid_files as $certificate)
                                    <tr>
                                        <th scope="row">
                                            <div class="mx-w-300 d-flex flex-wrap">
                                                {{$certificate->company_name }}
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$certificate->benefits}}
                                        <td class="budget">
                                            {{$certificate->benefits_year}}
                                        </td>
                                        <td class="budget">
                                            certified and already paid
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group ">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Options</i></button>
                                                <div class="dropdown-menu " style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -183px, 0px);" x-placement="top-start">
                                                    @can('view-file')
                                                        <a class="dropdown-item"  href="{{route('files.show', $certificate->id)}}">View File</a>
                                                    @endcan
                                                    @can('update-file')
                                                        <a class="dropdown-item"  href="{{route('files.edit',$certificate->id)}}">Edit File</a>
                                                    @endcan
                                                    <a class="dropdown-item"  href="{{route('certificate.edit',$certificate->id)}}">Modify Certificate</a>
                                                    <a class="dropdown-item"  href="{{route('certificate.show',$certificate->id)}}">Download Certificate</a>
                                                    <a class="dropdown-item"  href="{{route('certificate.send',$certificate->id)}}">Send Certificate</a>

                                                    {{-- <a class="dropdown-item"  href="{{route('files.advoiser_assignment_download',$post->id)}}">Download for Advoiser</a> --}}
                                                </div>
                                            </div>
                                            
                                            {{-- {!! Form::close() !!} --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot >
                                <tr>
                                    <td colspan="6">
                                        {{-- {{$files->links()}} --}}
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



    <script>
        $(document).on('change', '.file-selector', function(e) {
            let file = e.target.files[0];
            if (typeof(file) == 'undefined') {
                $(this).parents('.file-upload-box').remove();
                return;
            }
            var selector = $(this);
            let reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    if (typeof(selector.siblings('.image-box').html()) != "string") {
                        selector.parents('.images-container').append(`
                            <div class="col-xs-2 file-upload-box mt-1">
                            
                            <div class="text-white text-center upload-box">
                                <i style="margin-top: 50px;" class="fa fa-upload"></i>
                            </div>
                            <input type="file" name="images[]" class="file-selector" style="display:none" id="">
                        </div>`);
                        selector.siblings('.upload-box').removeClass('upload-box').addClass('image-box').html(`
                        <button class="btn-remove-image text-danger"><i class="fa fa-times"></i></button>
                        <img src="${e.target.result}" alt="">
                            `);
                    } else {
                        selector.siblings('.image-box').html(`
                        <button class="btn-remove-image text-danger"><i class="fa fa-times"></i></button>
                        <img src="${e.target.result}" alt="">
                            `);
                    }




                };
            })(file);

            // Read in the image file as a data URL.
            reader.readAsDataURL(file);

        });
    </script>
@endpush
