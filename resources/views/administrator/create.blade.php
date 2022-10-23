@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header fw-bold">New User</div>

            <!-- <div class="card-body">
               <form method="POST" action="">
                  <div class="form-row d-grid gap-2">
                     <div class="form-group col-md-6">
                        Name: <input type="text" name="user_name" value="" class="form-control">
                     </div>
                     <div class="form-group col-md-6">
                        Surname: <input type="text" name="user_surname" value="" class="form-control">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                     </div>
                     <div class="col-md-6 text-center align-self-right">
                        <label for="inputPassword4">Roles</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="One or multiple">
                     </div>
                     <div class="col text-center align-self-end">
                        <button type="submit" class="btn btn-primary">ADD</button>
                     </div>
                  </div>
                  @csrf
               </form>
            </div> -->


            <div class="card-body">
               <form method="POST" action="{{route('administrator.store',$user)}}">
                  <div class="container">
                     <div class="row">
                        <div class="col">
                           <div class="mt-2 form-group ">
                              Name: <input type="text" name="user_name" value="" class="form-control">
                           </div>
                           <div class="mt-2 form-group ">
                              Surname: <input type="text" name="user_surname" value="" class="form-control">
                           </div>
                           <div class="mt-2 form-group ">
                              <label for="inputEmail4">Email</label>
                              <input type="email" class="form-control" name="user_email" id="inputEmail4" placeholder="Email">
                           </div>
                           <div class="mt-2 form-group ">
                              <label for="inputPassword4">Password</label>
                              <input type="password" class="form-control" name="user_password" id="inputPassword4" placeholder="Password">
                           </div>
                        </div>
                        <div class="col">
                           <div class="mt-2 form-group ">
                              <label for="roles" aria-describedby="help text">Roles</label>
                              <div id="help text" class="form-text">
                                 Select one or multiple roles
                              </div>
                              <ul class="list-group list-group-flush text-capitalize">
                                 @foreach($roles as $role)
                                 <li class="list-group-item"><input type="checkbox" name="new_role" id="new_role" value="{{$role->role}}"> {{$role->role}}</li>
                                 @endforeach
                              </ul>
                           </div>

                           <div class="row justify-content-center">
                              <div class="col-auto">
                                 <button type="submit" class="btn btn-outline-success">Add</button>
                              </div>
                              <div class="col-auto">  
                                 </form>
                                 <!-- Kodel nesuveikia taip pat kaip ant darant edit > cancel-->
                                 <form action="{{route('administrator.index',$user)}}" method=""><button type="submit"  name="cancel" value="cancel" class="btn btn-primary">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     @csrf
               </form>
            </div>











         </div>
      </div>
   </div>
</div>
</div>

@endsection