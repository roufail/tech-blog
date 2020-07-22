@extends('admin.template.master')

@section('page-title','Comments')
@section('content')
<!-- start of content -->
<div class="card">
    <div class="card-header">
        <h5 class="m-0">Comments</h5>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Approved</th>
                        <th>Post</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->approved }}</td>
                        <td>{{ $comment->post ? $comment->post->title : ''}}</td>
                        <td>
                            <div class="float-left">
                                <form style="display:inline-flex" method="post"
                                    action="{{ route('admin.comments.destroy',$comment->id) }}">
                                    @csrf
                                    @method('delete')
                                    <a class="delete-btn" href="javascript:;"><i
                                            class="fas fa-trash"></i>&nbsp;Delete</a>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


            {{ $comments->render('admin.components.pagination') }}
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
