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
                        <th>View</th>
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
                        <td><a class="load-comment" href="javascript:;" data-id="{{ $comment->id }}" data-toggle="modal"
                                data-target="#CommentModal"><i class="fas fa-eye"></i>&nbsp;View</a></td>
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


<!-- Modal -->
<div class="modal fade" id="CommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body comment-area">
                Loading
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary reject-url">Reject</a>
                <a href="#" class="btn btn-primary approve-url">Approve</a>
            </div>
        </div>
    </div>
</div>




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


        $('.load-comment').click(function($event){
            $id = $(this).data('id');
            $('#CommentModal .comment-area').text('Loading');
            $.ajax({
                url: '/admin/comments/'+$id,
                type: 'GET',
                data: { '_token': '{{ csrf_token() }}'},
                dataType: 'json',
                success: function( data ) {
                    $('#CommentModal .comment-area').text(data.comment);
                    $('#CommentModal .reject-url').attr('href',data.reject_url);
                    $('#CommentModal .approve-url').attr('href',data.approve_url);
                }
            })
        });
      })

</script>
@endsection

@push('extra-js')
<script src="{{ asset('js/sweetalert.js') }}"></script>
@endpush