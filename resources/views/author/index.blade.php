@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Authors</div>

        <div class="card-body">
        <ul class="list-group list-group-flush">
          @foreach ($authors as $author)
          <li class="list-group-item"><a href="{{route('author.edit',[$author])}}">{{$author->name}} {{$author->surname}}</a>
          @if(Auth::user()->hasRole('administrator'))
          <form method="POST" action="{{route('author.destroy', $author)}}">
            @csrf
            <button type="submit" class="btn btn-primary">DELETE</button>
          </form>
          @endif
          <br>
          </li>
          @endforeach
        <ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection