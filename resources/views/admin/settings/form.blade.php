@extends('admin.template.master')

@section('page-title','Settings')
@section('content')

<form role="form" method="POST" action="{{ route('admin.settings.update')  }}">
    @csrf
    @method('put')
    <div class="card-body">

        @if(Session::has('success'))
        <div class="callout callout-success">
            <h5>{{ Session::get('success') }}</h5>
        </div>
        @endif


        <div class="form-group">
            <label for="facebook_url">Facebook</label>

            <input type="text"
                value="{{ (old('facebook_url') ? old('facebook_url') : isset($db_settings['facebook_url'])) ? $db_settings['facebook_url'] : '' }}"
                class="form-control @error('facebook_url') is-invalid @enderror" name="facebook_url" id="facebook_url"
                placeholder="Enter facebook URL">

            @error('facebook_url')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-group">
            <label for="twitter_url">Twitter</label>

            <input type="text"
                value="{{ (old('twitter_url') ? old('twitter_url') : isset($db_settings['twitter_url'])) ? $db_settings['twitter_url'] : '' }}"
                class="form-control @error('twitter_url') is-invalid @enderror" name="twitter_url" id="twitter_url"
                placeholder="Enter twitter URL">

            @error('twitter_url')
            <small class="text-danger">{{ $message }}</small>
            @enderror
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
