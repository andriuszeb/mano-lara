@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Books</div>
                <div class="card-body">
                    <form method="POST" action="{{route('book.update',[$book])}}">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="book_title" value="{{$book->title}}" class="form-control">
                            <small class="form-text text-muted">Knygos pavadinimas.</small>
                        </div>
                        <div class="form-group">
                            <label>ISBN</label>
                            <input type="text" name="book_isbn" value="{{$book->isbn}}" class="form-control">
                            <small class="form-text text-muted">Kodas</small>
                        </div>
                        <div class="form-group">
                            <label>Pages</label>
                            <input type="text" name="book_pages" value="{{$book->pages}}" class="form-control">
                            <small class="form-text text-muted">Puslapių skaičius</small>
                        </div>
                        <div class="form-group">
                            <label>About</label>
                            <textarea name="book_about" class="form-control">{{$book->about}}</textarea>
                            <small class="form-text text-muted">Apie</small>
                        </div>
                        <select name="author_id"  class="form-control"  aria-label="Default select example">
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                                {{$author->name}} {{$author->surname}}
                            </option>
                            @endforeach
                        </select>
                        @csrf
                        
                        <button type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection