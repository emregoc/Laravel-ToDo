@extends('layouts.master')

@section('content')
<h4 class="text-center my-3 pb-3">Admin Page</h4>
<div class="col-12" style="text-align: center">
    <a href="/todo" class="btn btn-primary">Home Page</a>
  </div>

<form class="row row-cols-lg-auto g-3 justify-content-center"  method="POST" action="{{ route('user.todo') }}" enctype="multipart/form-data">
  @csrf
  
    <div style="text-align: center">
      <h4 style="margin: 30px"> Görmek İstediğiniz Kullanıcıyı Seçin </h4>
      <select style="text-align: center" name="user_id">
        @foreach ($users as $user)
    
            <option value="{{ $user->id }}"> {{ $user->name }} </option>

        @endforeach
      </select>
    </div>
  </div>
   
      <div>
        <div class="form-outline" style="text-align: center">
        
          <input type="submit" class="btn btn-primary" value="Search">
        
        </div>
      </div>
 </form>
    

@endsection