@extends('auth.main')
@section('title', 'Register')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Akun</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">First Name</label>
                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Last Name</label>
                                    <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Username</label>
                                <input class="form-control py-4" id="inputEmailAddress" name="username" type="username" aria-describedby="emailHelp" placeholder="Enter email address" />
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                    <input class="form-control py-4 {{$errors->has('password_2') ? 'is-invalid' : ''}}" id="inputPassword" name="password_2" type="password" placeholder="Enter password">
                                    @if ($errors->has('password_2'))
                                        <div class="invalid-feedback"> {{$errors->first('password_2')}}</div>
                                    @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                        <input class="form-control py-4" id="inputConfirmPassword" name="password_2_confirmation" type="password" placeholder="Confirm password"/>
                                        @if ($errors->has('password_2'))
                                        <div class="invalid-feedback"> {{$errors->first('password_2')}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-0"><button type="submit" href="login.php">Create Account</a></div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection

