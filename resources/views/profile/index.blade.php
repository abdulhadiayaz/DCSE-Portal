@extends('layouts.main')

@section('content')
    <div class="container" style="margin-bottom: 8rem; margin-top: 10rem;">
        @include('includes.flash_message')
        <div class="row">
            <div class="col-md-3 text-center">

                <img src="{{ Auth::user()->profile->avatar ? asset(Auth::user()->profile->avatar) : asset('avatar/serwman1.jpg')  }}" class="rounded-circle" id="one"  style="width: 100%;">
                <form action="{{ route('profile.seeker.avatar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="card">
                        <div class="card-header">Update Avatar</div>
                        <div class="card-body">
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" onchange="readURL(this)">
                            <div style="color: darkred; font-size: 11px;">250px x 250px to fit better</div>
                            @if($errors->has('avatar'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('avatar') }}
                                </div>
                            @endif
                            <br>
                            <button type="submit" class="btn btn-dark"><i class="fa fa-upload"></i> Upload</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-5">
                <div class="card">
                    <form action="{{ route('profile.seeker.update') }}" method="post">
                        @csrf
                        <div class="card-header">Update Your Profile</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', Auth::user()->profile->address) }}">
                                @if($errors->has('address'))
                                    <div class="error" style="color: red">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', Auth::user()->profile->phone) }}">
                                @if($errors->has('phone'))
                                    <div class="error" style="color: red">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Experience</label>
                                <textarea name="experience" placeholder="Enter your experience" class="form-control @error('experience') is-invalid @enderror">{{ old('experience', Auth::user()->profile->experience) }}</textarea>
                                @if($errors->has('experience'))
                                    <div class="error" style="color: red">
                                        {{ $errors->first('experience') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Biography</label>
                                <textarea name="biography" placeholder="Enter your biography" class="form-control @error('biography') is-invalid @enderror">{{ old('biography', Auth::user()->profile->biography) }}</textarea>
                                @if($errors->has('biography'))
                                    <div class="error" style="color: red">
                                        {{ $errors->first('biography') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark"><i class="fa fa-pencil-square-o"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <ul class="list-group">
                        <li class="list-group-item" style="background-color: rgba(0, 0, 0, 0.03);">Your Information</li>
                        <li class="list-group-item"><strong>Name:</strong><span class="float-right">{{ Auth::user()->name }}</span></li>
                        <li class="list-group-item"><strong>Email:</strong><span class="float-right">{{ Auth::user()->email }}</span></li>
                        <li class="list-group-item"><strong>Address:</strong><span class="float-right">{{ Auth::user()->profile->address }}</span></li>
                        <li class="list-group-item"><strong>Gender:</strong><span class="float-right">{{ ucfirst(Auth::user()->profile->gender) }}</span></li>
                        <li class="list-group-item"><strong>Member Since:</strong><span class="float-right">{{ date('F j, Y', strtotime(Auth::user()->created_at)) }}</span></li>
                        <li class="list-group-item">
                            @if(Auth::user()->profile->cover_letter)
                                <strong><i class="fa fa-file-pdf-o"></i> <a href="{{ asset(Auth::user()->profile->cover_letter) }}" target="_blank">Cover Letter</a></strong>
                            @else
                                <strong style="color: red">Upload your Cover Letter</strong>
                            @endif

                            @if(Auth::user()->profile->resume)
                                <span class="float-right"><strong><i class="fa fa-file-pdf-o"></i> <a href="{{ asset(Auth::user()->profile->resume) }}" target="_blank">Resume</a></strong></span>
                            @else
                                <strong><span class="float-right" style="color: red">Upload your Resume</span></strong>
                            @endif


                        </li>
                    </ul>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Update Cover Letter</div>
                    <form action="{{ route('profile.seeker.cover') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <input type="file" class="form-control @error('cover_letter') is-invalid @enderror" name="cover_letter">
                            @if($errors->has('cover_letter'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('cover_letter') }}
                                </div>
                            @endif
                            <br>
                            <button type="submit" class="btn btn-dark"><i class="fa fa-upload"></i> Upload</button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Update Resume</div>
                    <form action="{{ route('profile.seeker.resume') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <input type="file" class="form-control @error('resume') is-invalid @enderror" name="resume">
                            @if($errors->has('resume'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('resume') }}
                                </div>
                            @endif
                            <br>
                            <button type="submit" class="btn btn-dark"><i class="fa fa-upload"></i> Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <!-- Ajax code to preview images -->
    <script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(160)
                        .height(160);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
