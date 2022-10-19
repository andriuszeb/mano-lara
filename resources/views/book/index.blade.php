@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <!-- <div class="card">
        <div class="card-header">Books</div>
        <div class="card-body">
          @foreach ($books as $book)
          <a href="{{route('book.edit',[$book])}}">{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</a>
          <form method="POST" action="{{route('book.destroy', [$book])}}">
            @csrf
            <button type="submit">DELETE</button>
          </form>
          <br>
          @endforeach

        </div>
      </div> -->


      <div class="card-deck">
        <div class="card-header">Books</div>
        @foreach ($books as $book)
        <div class="card">
          <div class="card-body">
            <h5><a href="{{route('book.edit',[$book])}}" class="card-title">Title: {{$book->title}}</a></h5>
            <p class="card-text">Author: {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</p>
            <p class="card-text">ISBN:{{$book->isbn}}</p>
            <p class="card-text">Pages:{{$book->pages}}</p>
            <p class="card-text">About:{{$book->about}}</p>
            <form method="POST" action="{{route('book.destroy', [$book])}}">
              @csrf
              <button type="submit" class="btn btn-primary">DELETE</button>
            </form>
            <br>
          </div>
        </div>
        @endforeach
      </div>



    </div>
  </div>
</div>
@endsection