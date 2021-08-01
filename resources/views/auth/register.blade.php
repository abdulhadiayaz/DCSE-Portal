@extends('layouts.main')
@section('content')
    <div class="album text-muted">
        <div class="container">
            <br><br><br>
            <div class="row">
                <div class="site-section bg-light">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 col-lg-8 mb-5">
                                <h1 style="padding-left: 6rem">Job Seeker Registration</h1>
                                <form method="POST" action="{{ route('register') }}" class="p-5 bg-white">
                                    @csrf

                                    <input type="hidden" value="seeker" name="user_type">

                                    <div class="form-group row">
                                        <div class="col-md-12">Name</div>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-12">Email</div>
                                        <div class="col-md-12">
                                            <input id="email" type="text" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">Date of Birth</div>
                                        <div class="col-md-12">
                                            <input id="datepicker" type="text" placeholder="date of birth" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus>

                                            @if ($errors->has('date_of_birth'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">Gender</div>
                                        <div class="col-md-12">
                                            <select name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                                <option value="">select gender...</option>
                                                <option value="female">Female</option>
                                                <option value="male">Male</option>
                                            </select>

                                            @if ($errors->has('gender'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">Password</div>
                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">Confirm password</div>

                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <input type="submit" value="Register as Seeker" class="btn btn-primary  py-2 px-5">
                                        </div>
                                    </div>


                                </form>
                            </div>

                            <div class="col-lg-4">


                                <div class="p-4 mb-3 bg-white">
                                    <h3 class="h5 text-black mb-3">More Info</h3>
                                    <p><i class="icon-info"></i> Once you create an account a verification link will be sent to your email.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
@endsection
