@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">New Author</div>

            <div class="card-body">
               <form method="POST" action="{{route('author.store')}}">
                  <div class="row">
                  <div class="col">
                     Name: <input type="text" name="author_name" value="{{old('author_name')}}" class="form-control">
                     </div>
                     <div class="col">
                     Surname: <input type="text" name="author_surname" value="{{old('author_surname')}}" class="form-control">
                     @csrf
                     </div>
                     <div class="col text-center align-self-end">
                     <button type="submit" class="btn btn-primary">ADD</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection