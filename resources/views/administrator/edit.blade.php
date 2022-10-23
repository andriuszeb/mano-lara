@extends('layouts.app')

@section('content')
<!-- <div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <h5 class="card-header fw-bold">User update</h5>

            <div class="card-body">
               <form method="POST" action="{{route('user.update',$user)}}">
                  Name: <input type="text" name="name" value="{{old('name', $user->name)}}">
                  Surname: <input type="text" name="surname" value="{{$user->surname}}">
                  <br>
                  @foreach($roles as $role)
                  {{$role->role}}<input type="checkbox" name="role[]" <?= ($user->hasRole($role->role)) ? "checked" : "" ?> id="" value="{{$role->id}}"><br>
                  @endforeach
                  @csrf
                  <button type="submit">Update</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div> -->


<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <h5 class="card-header fw-bold">User update</h5>

            <div class="card-body">
               <form method="POST" action="{{route('user.update',$user)}}">
                  <div class="col-md-6">
                     Name: <input type="text" name="name" value="{{old('name', $user->name)}}" class="form-control">
                     Surname: <input type="text" name="surname" value="{{$user->surname}}" class="form-control">
                  </div>
                  <br>
                  <h6 class="card-title">Select one or multiple roles for user:</h6>
                  <div class="col-md-6">
                     <ul class="list-group list-group-flush text-capitalize">
                        @foreach($roles as $role)
                        <li class="list-group-item"><input type="checkbox" name="role[]" <?= ($user->hasRole($role->role)) ? "checked" : "" ?> id="" value="{{$role->id}}"> {{$role->role}}</li>
                        @endforeach
                     </ul>
                  </div>
                  @csrf
                  <br>
                  <div class="row">
                     <div class="col-auto mr-auto">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                     </div>
                     <div class="col-auto mr-auto">
                        <form action="{{route('administrator.index',$user)}}" method="">
                           <button type="submit" name="cancel" value="cancel" class="btn btn-primary">Cancel</button>
                           @csrf
                        </form>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection