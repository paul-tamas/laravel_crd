@extends('todo.layout');
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Check the list</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('todo.create') }}"> Create new ToDo</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Description</th>
        <th width="250px">Action</th>
    </tr>
    @foreach ($td as $blog)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $blog->title}}</td>
        <td>{{ $blog->des}}</td>
        <td>
            <form action="{{ route('todo.destroy',$blog->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('todo.show',$blog->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('todo.edit',$blog->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $td->links() !!}

@endsection