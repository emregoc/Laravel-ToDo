@extends('layouts.master')
<title> Completed Todo </title>
@section('content')
    
<form class="row row-cols-lg-auto g-3 justify-content-center">

    <div class="col-12">
      <a href="/todo" class="btn btn-primary">Home</a>
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

<table class="table mb-4">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Todo item</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($todos as $todo)

        <tr>
          <th scope="row">{{ $todo->id }}</th>
          <td>{{ $todo->todo }}</td>
          <td> <a href="{{ route('status.todo.active', $todo->id) }}" class="btn btn-success ms-1">take it back</a></td>
        </tr>
      
      @endforeach
    </tbody>
  </table>

@endsection