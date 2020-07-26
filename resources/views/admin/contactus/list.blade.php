@extends('admin.template.master')

@section('page-title','Contact us')
@section('content')
<!-- start of content -->
<div class="card">
    <div class="card-header">
        <h5 class="m-0">Contact us</h5>
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
                        <th>Read</th>
                        <th>View</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($contactus_messages as $contactus_message)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $contactus_message->name }}</td>
                        <td>{{ $contactus_message->email }}</td>
                        <td>{{ $contactus_message->read }}</td>
                        <td><a class="load-message" href="javascript:;" data-id="{{ $contactus_message->id }}"
                                data-toggle="modal" data-target="#MessageModal"><i class="fas fa-eye"></i>&nbsp;View</a>
                        </td>
                        <td>
                            <div class="float-left">
                                <form style="display:inline-flex" method="post"
                                    action="{{ route('admin.contactus.destroy',$contactus_message->id) }}">
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


            {{ $contactus_messages->render('admin.components.pagination') }}
        </p>
        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    </div>
</div>
<!-- end of content -->


<!-- Modal -->
<div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body message-area">
                Loading
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary toggle-url"></a>

                <form class="delete-url" action="#">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Delete</a>

                </form>
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


        $('.load-message').click(function($event){
            $id = $(this).data('id');
            $('#MessageModal .message-area').text('Loading');
            $.ajax({
                url: '/admin/contactus/'+$id,
                type: 'GET',
                data: { '_token': '{{ csrf_token() }}'},
                dataType: 'json',
                success: function( data ) {
                    $('#MessageModal .message-area').text(data.message);
                    $('#MessageModal .toggle-url').attr('href',data.toggle_read);
                    $('#MessageModal .delete-url').attr('action',data.delete_url);

                    if(data.message_status === 'Read') {
                        $('#MessageModal .toggle-url').text('Unread');
                    }else {
                        $('#MessageModal .toggle-url').text('Read');
                    }
                }
            })
        });
      })

</script>
@endsection

@push('extra-js')
<script src="{{ asset('js/sweetalert.js') }}"></script>
@endpush
