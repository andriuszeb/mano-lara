@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Book</div>
                <div class="card-body">
                    <form method="POST" action="{{route('book.store')}}" class="card-text">
                        Title:<input type="text" name="book_title" class="form-control">
                        ISBN:<input type="text" name="book_isbn" class="form-control">
                        Pages:<input type="text" name="book_pages" class="form-control"><br>
                        About:<textarea name="book_about" class="form-control"></textarea><br>
                        Author:<select name="author_id" class="form-control custom-select">
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select><br>
                        @csrf
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection