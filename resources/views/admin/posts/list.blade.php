@extends('admin.template.master')

@section('page-title','Posts')
@section('content')
 <!-- start of content -->
 <div class="card">
    <div class="card-header">
      <h5 class="m-0">Posts</h5>
    </div>
    <div class="card-body">
      {{-- <h6 class="card-title"></h6> --}}

    @if(Session::has('success'))
      <div class="callout callout-success">
        <h5>{{ Session::get('success') }}</h5>
      </div>
    @endif

      <p class="card-text">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Title</th>
                <th>Categories</th>
                <th>Approved</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        @foreach($post->categories as $category)
                            - {{ $category->title }}<br />
                        @endforeach
                    </td>
                    <td>
                        {{ $post->approved ? 'Approved' : 'Rejected' }}
                    </td>
                    <td>
                        <div class="float-left">
                          <a href="{{ route('admin.posts.edit',$post->id) }}"><i class="fas fa-edit"></i>&nbsp;Edit</a>
                        </div>

                        <div class="float-left">
                            /
                            <form style="display:inline-flex" method="post" action="{{ route('admin.posts.destroy',$post->id) }}">
                                @csrf
                                @method('delete')
                                <a class="delete-btn" href="javascript:;"><i class="fas fa-trash"></i>&nbsp;Delete</a>
                            </form>
                        </div>

                        <div class="float-left">
                            /
                            <a href="{{ $post->approved ? route('admin.posts.reject',$post->id) : route('admin.posts.approve',$post->id) }}"><i class="fas fa-edit"></i>&nbsp;{{ $post->approved ? 'Reject' : 'Approve' }}</a>
                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>


        {{ $posts->render('admin.components.pagination') }}
    </p>
    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
  </div>
</div>
<!-- end of content -->

@endsection





@section('extra-scripts')
  <script>
      jQuery(function($){
        $('.delete-btn').click(function(event){
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    $(this).parent().submit();
                }
                })



        });
      })

  </script>
@endsection

@push('extra-js')
<script src="{{ asset('js/sweetalert.js') }}"></script>
@endpush

