@extends('admin.template.master')

@section('page-title','Categories')
@section('content')
 <!-- start of content -->
 <div class="card">
    <div class="card-header">
      <h5 class="m-0">Categories</h5>
      <div class="float-right"><a href="{{ route('admin.categories.create') }}"><i class="fas fa-plus"></i></a></div>
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
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $category->title }}</td>
                    <td><a href="{{ route('admin.categories.edit',$category->id) }}"><i class="fas fa-edit"></i>&nbsp;Edit</a>/

                        <form method="post" action="{{ route('admin.categories.destroy',$category->id) }}">
                            @csrf
                            @method('delete')
                            <a class="delete-btn" href="javascript:;"><i class="fas fa-trash"></i>&nbsp;Delete</a>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>


        {{ $categories->render('admin.components.pagination') }}
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

