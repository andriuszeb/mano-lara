@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Authors</div>

            <div class="card-body">
               <form method="POST" action="{{route('author.update',$author)}}">
                  Name: <input type="text" name="author_name"  value="{{old('author_name', $author->name)}}" >
                  Surname: <input type="text" name="author_surname" value="{{$author->surname}}">
                  @csrf
                  <button type="submit">EDIT</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection