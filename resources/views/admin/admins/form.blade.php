@extends('admin.template.master')


@push('extra-css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-switch.min.css') }}" media="all" />
@endpush



@section('page-title','Admin')
@section('content')
<!-- start of content -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $admin->id ? 'Edit '.$admin->title : 'Create new admin'}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST"
        action="{{ $admin->id ? route('admin.admins.update', $admin->id) : route('admin.admins.store') }}"
        enctype="multipart/form-data">
        @csrf
        @if($admin->id)
        @method('put')
        @endif
        <div class="card-body">


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{ old('name') ? old('name') : $admin->name }}"
                    class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="Enter name">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{ old('email') ? old('email') : $admin->email }}"
                    class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    placeholder="Enter email">
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputFile">Image</label>

                @if($admin->image)
                <div>
                    <a target="_blank" href="{{ \Storage::disk('admins')->url($admin->image) }}"><img
                            src="{{ \Storage::disk('admins')->url($admin->image) }}" height="150px" width="150px" /></a>
                </div>
                @endif

                <div class="input-group">
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
                @error('image')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>



            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password" placeholder="Enter password" />
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                    name="confirm_password" id="password" placeholder="Enter confirm password" />
                @error('confirm_password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="approved">Approved</label>
                <input id="approved" type="checkbox" name="approved" @if($admin->approved == "Approved")checked @endif
                data-bootstrap-switch>
            </div>




        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-secondary float-right">Submit</button>
        </div>
    </form>
</div>
<!-- end of content -->

@endsection




@section('extra-scripts')
<script>
    jQuery(function(){
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
@endsection



@push('extra-js')
<script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>
@endpush
