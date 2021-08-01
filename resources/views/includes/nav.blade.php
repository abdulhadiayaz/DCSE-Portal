<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->


<div class="site-navbar-wrap js-site-navbar bg-white fixed-top">

    <div class="container">
        <div class="site-navbar bg-light">
            <div class="py-1">
                <div class="row align-items-center">
                    <div class="col-2">
                        <h2 class="mb-0 site-logo"><a href="{{ url('/') }}">Job<strong class="font-weight-bold">Portal</strong><sup><i class="icon-briefcase"></i></sup> </a></h2>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">
                            <div class="container">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li><a href="{{ route('company') }}">Companies</a></li>
                                    @auth
                                        @if(Auth::user()->user_type == 'employer')
                                            <li><a href="{{ route('job.create') }}"><span class="bg-primary btn btn-primary btn-lg rounded"><span class="icon-plus mr-3"></span>Post New Job</span></a></li>
                                        @endif
                                            <li class="nav-item dropdown">

                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    @if(Auth::user()->user_type == 'seeker')
                                                        <a class="dropdown-item" href="{{ route('user.profile') }}">{{ __('Profile') }}</a>
                                                        <a class="dropdown-item" href="{{ route('home') }}">{{ __('Saved Jobs') }}</a>
                                                    @elseif(Auth::user()->user_type == 'employer')
                                                        <a class="dropdown-item" href="{{ route('company.profile') }}">{{ __('Company Profile') }}</a>
                                                        <a class="dropdown-item" href="{{ route('jobs.applicants') }}">{{ __('Applicants') }}</a>
                                                        <a class="dropdown-item" href="{{ route('job.my.jobs') }}">{{ __('My Jobs') }}</a>
                                                    @endif
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                    @else
                                        <li><a href="{{ route('register') }}">For Candidates</a></li>
                                        <li><a href="{{ route('employer') }}">For Employers</a></li>
                                        <li><a class="bg-primary text-white py-3 px-4 rounded" data-toggle="modal" data-target="#exampleModal"><i class="icon-sign-in"></i> Login</a></li>
                                    @endauth
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="modal-body">

                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <label for="password">{{ __('Password') }}</label>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
