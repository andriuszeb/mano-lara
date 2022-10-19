@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">user</div>

            <div class="card-body">
               <form method="POST" action="{{route('user.update',$user)}}">
                  Name: <input type="text" name="name"  value="{{old('name', $user->name)}}" >
                  Surname: <input type="text" name="surname" value="{{$user->surname}}">
<br>
                  @foreach($roles as $role)
                     {{$role->role}}<input type="checkbox" name="role[]" <?=($user->hasRole($role->role)) ? "checked":""?> id="" value="{{$role->id}}"><br>
                  @endforeach
                  @csrf
                  <button type="submit">EDIT</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection