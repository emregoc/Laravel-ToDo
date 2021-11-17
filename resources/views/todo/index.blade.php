@extends('layouts.master')

@section('content')
 
<form class="row row-cols-lg-auto"  method="POST" action="{{ route('save.todo') }}" enctype="multipart/form-data">
  @csrf
  <div class="col-12">
    <div class="form-outline">
      <input type="text" id="form1" name="todo" class="form-control" placeholder="Enter a task here" />
    </div>
  </div>
 

  <div class="col-12">
    <input type="submit" class="btn btn-primary" value="Add">
  </div>

  <div class="col-12">
    <a href="/all" class="btn btn-primary">All</a>
  </div>
  <div class="col-12">
      <a href="/active" class="btn btn-primary">Active</a>
    </div>
    <div class="col-12">
      <a href="/completed" class="btn btn-primary">Completed</a>
    </div>
</form>

    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
          {{ Session::get('success') }}
      </div>
    @endif
    @if(Session::has('unsuccessful'))
      <div class="alert alert-danger" role="alert">
          {{ Session::get('unsuccessful') }}
      </div>
    @endif

   <form method="POST" action="{{ route('search.todo') }}" enctype="multipart/form-data">
      @csrf 
      <div style="margin: 30px">
        <div class="form-outline">
          <input type="text" id="form1" name="search" class="form-control" placeholder="Enter Seach Word"/>
          <input type="submit" class="btn btn-primary" value="Search">
        
        </div>
      </div>
   </form>
    

<table class="table mb-4">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Todo item</th>
        <th scope="col"></th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($todos as $todo)
        
        <tr>
          <input type="hidden" name="id" value="{{$todo->id}}">
          <th scope="row">{{ $todo->id }}</th>
          <td>{{ $todo->todo }}</td>
          <td> <a href="{{ route('status.todo', $todo->id) }}" class="btn btn-success ms-1">Complete</a></td>
          <td>
            <a href="{{ route('delete.todo', $todo->id) }}" class="btn btn-danger">Delete</a>
            <a href="{{ route('update.todo', $todo->id) }}" class="btn btn-success ms-1">Update</a>
          </td>
        </tr>

      @endforeach    
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $todos->links() }} <!-- verileri sayfalara ayırdıgımız yer -->
  </div>

@endsection