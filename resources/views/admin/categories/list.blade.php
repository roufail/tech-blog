@extends('admin.template.master')

@section('page-title','Categories')
@section('content')

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
            <td>edit/delete</td>
          </tr>
        @endforeach

    </tbody>
  </table>


  {{ $categories->render('admin.components.pagination') }}


@endsection

