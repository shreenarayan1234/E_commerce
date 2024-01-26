@extends('master')
@section("content")
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-5 mx-auto">
            <form action="{{url('/')}}/register" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label">User Name </label>
                <input type="text" name="name" class="form-control" placeholder="User name">
              </div>
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="email">
              </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
              </form>
        </div>
    </div>
</div>
@endsection