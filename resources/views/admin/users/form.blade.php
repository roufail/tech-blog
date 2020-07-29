@extends('admin.template.master')


@push('extra-css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-switch.min.css') }}" media="all" />
@endpush



@section('page-title','users')
@section('content')
<!-- start of content -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->id ? 'Edit '.$user->title : 'Create new user'}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST"
        action="{{ $user->id ? route('admin.users.update', $user->id) : route('admin.users.store') }}">
        @csrf
        @if($user->id)
        @method('put')
        @endif
        <div class="card-body">


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{ old('name') ? old('name') : $user->name }}"
                    class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="Enter name">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{ old('email') ? old('email') : $user->email }}"
                    class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    placeholder="Enter email">
                @error('email')
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
                <input id="approved" type="checkbox" name="approved" @if($user->approved == "Approved") checked @endif
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
