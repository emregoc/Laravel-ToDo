@extends('layouts.master')

@section('content')
<h4 class="text-center my-3 pb-3">Admin Page</h4>
<div class="col-12" style="text-align: center">
    <a href="/todo" class="btn btn-primary">Home Page</a>
  </div>


    

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
        </tr>

      @endforeach    
    </tbody>
  </table>


@endsection