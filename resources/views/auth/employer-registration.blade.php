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
                                @include('includes.flash_message')
                                <h1 style="padding-left: 6rem">Employer Registration</h1>
                                <form method="POST" action="{{ route('employer.register') }}" class="p-5 bg-white">
                                    @csrf

                                    <input type="hidden" value="employer" name="user_type">

                                    <div class="form-group row">

                                        <div class="col-md-12">Company name</div>

                                        <div class="col-md-12">
                                            <input id="name" type="text" placeholder="Company name" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name') }}" required autofocus>

                                            @if ($errors->has('company_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('company_name') }}</strong>
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
                                            <input type="submit" value="Register as Employer" class="btn btn-primary  py-2 px-5">
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
