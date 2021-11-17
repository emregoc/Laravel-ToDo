@extends('layouts.master')

@section('content')

<form class="row row-cols-lg-auto g-3 justify-content-center" style="margin-bottom: 80px"  method="POST" action="{{ route('edit.todo') }}" enctype="multipart/form-data">
  @csrf
  <div class="col-12">
      
    <div class="form-outline">
        <input type="hidden" name="id" value="{{ $todo->id }}">
      <input type="text" id="form1" name="todo" class="form-control" value="{{ $todo->todo }}"/>
      <label class="form-label" for="form1">Enter a task here for update</label>
    </div>
  </div>

  <div class="col-12">
    <input type="submit" class="btn btn-primary" value="Update">
  </div>

</form>
    @if(Session::has('todo_updated'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('todo_updated') }}
    </div>
    @endif
<div class="col-12">
    <a href="/todo" class="btn btn-primary">Back</a>
  </div>


@endsection