@extends('auth.main')
@section('title', 'Login')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Masuk</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="/checklogin">
                    @csrf
                    <div class="form-group">
                        <label class="small mb-1" for="username">Username</label>
                            <input class="form-control py-4" id="username" name="username" type="text" placeholder="Enter username" required/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                            <input class="form-control py-4 {{$errors->has('password_2') ? 'is-invalid' : ''}}" id="inputPassword" type="password" placeholder="Enter password" name="password">
                            @if ($errors->has('password_2'))
                                <div class="invalid-feedback"> {{$errors->first('password_2')}}</div>
                            @endif
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                    </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small" href="{{route ('password.request')}}">Forgot Password?</a>
                        <button class="btn btn-primary" type="submit">Login</a>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
            </div>
        </div>
    </div>
</div>
@endsection
