@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Users</div>

        <div class="card-body">
          <ul class="list-group list-group-flush">
            @foreach ($users as $user)
            <li class="list-group-item"><a href="{{route('user.edit',[$user])}}">{{$user->name}}</a>
              @if(Auth::user()->hasRole('administrator'))
              <form method="POST" action="{{route('user.destroy', $user)}}" class="text-end">
                @csrf
                <button type="submit" class="btn btn-danger">DELETE</button>
              </form>
              <br>
              <form method="GET" action="{{route('user.edit', $user)}}" class="text-end">
                @csrf
                <button type="submit" class="btn btn-primary">EDIT</button>
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


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <h5 class="card-header fw-bold">Users</h5>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Role</th>
              <th scope="col" class="text-center">Actions</th>
            </tr>
          </thead>
          @foreach ($users as $user)
          <tbody>
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->surname}}</td>
              <td>{{$user->role}}</td>
              <td>
              <div class="d-grid gap-2 d-md-flex justify-content-center">
                @if(Auth::user()->hasRole('administrator'))
                <form method="GET" action="{{route('user.edit', $user)}}" >
                  @csrf
                  <button type="submit" class="btn btn-primary btn-sm">EDIT</button>
                </form>
                <form method="POST" action="{{route('user.destroy', $user)}}" >
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                </form>
                @endif
                </div>
              </td>
              <td>
                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button class="btn btn-primary me-md-2" type="button">Button</button>
                  <button class="btn btn-primary" type="button">Button</button>
                </div> -->
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection