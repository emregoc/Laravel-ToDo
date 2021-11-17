@extends('layouts.master')

@section('content')
 

  <div class="col-12">
    <div class="form-outline">
      <h3 style="text-align: center"> Search Result </h3>
    </div>
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
  <div class="d-flex justify-content-center">
    {{ $todos->links() }} <!-- verileri sayfalara ayırdıgımız yer -->
  </div>

@endsection