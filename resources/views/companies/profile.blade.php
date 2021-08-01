@extends('layouts.main')

@section('content')
    <div class="container" style="margin-bottom: 8rem; margin-top: 12rem;">
        @include('includes.flash_message')
        <div class="row">
            <div class="col-md-3 text-center">

                <img src="{{ Auth::user()->company->logo ? asset(Auth::user()->company->logo) : asset('avatar/serwman1.jpg')  }}" class="rounded-circle" id="one"  style="width: 100%;">
                <form action="{{ route('company.profile.logo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="card">
                        <div class="card-header">Update Company Logo</div>
                        <div class="card-body">
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" onchange="readURL(this)">
                            @if($errors->has('logo'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('logo') }}
                                </div>
                            @endif
                            <br>
                            <button type="submit" class="btn btn-dark"><i class="fa fa-upload"></i> Upload</button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div class="col-md-5">
                <div class="card">
                    <form action="{{ route('company.profile.update') }}" method="post">
                        @csrf
                        <div class="card-header">Update Your Company Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', Auth::user()->company->address) }}">
                                @if($errors->has('address'))
                                    <div class="error" style="color: red">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', Auth::user()->company->phone) }}">
                                @if($errors->has('phone'))
                                    <div class="error" style="color: red">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', Auth::user()->company->website) }}">
                                @if($errors->has('website'))
                                    <div class="error" style="color: red">
                                        {{ $errors->first('website') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" name="slogan" class="form-control @error('slogan') is-invalid @enderror" value="{{ old('slogan', Auth::user()->company->slogan) }}">
                                @if($errors->has('slogan'))
                                    <div class="error" style="color: red">
                                        {{ $errors->first('slogan') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control">{{ old('description', Auth::user()->company->description) }}</textarea>
                                @if($errors->has('description'))
                                    <div class="error" style="color: red">
                                        {{ $errors->first('description') }}
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
            <br>
            <div class="col-md-4">
                <div class="card">
                    <ul class="list-group">
                        <li class="list-group-item" style="background-color: rgba(0, 0, 0, 0.03);">About your Company</li>
                        <li class="list-group-item"><strong>Name:</strong><span class="float-right">{{ ucfirst(Auth::user()->company->company_name) }}</span></li>
                        @if(Auth::user()->company->website)
                            <li class="list-group-item"><strong>Website:</strong><span class="float-right"><a href="{{ Auth::user()->company->website }}">{{ Auth::user()->company->website }}</a></span></li>
                        @endif
                        <li class="list-group-item"><strong>Member Since:</strong><span class="float-right">{{ date('F j, Y', strtotime(Auth::user()->created_at)) }}</span></li>
                        <li class="list-group-item"><strong>Company Page:</strong><span class="float-right"><a
                                    href="{{ route('company.show', [Auth::user()->company->id, Auth::user()->company->slug]) }}"><i class="icon-eye"></i> View</a></span></li>
                    </ul>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Update Cover Photo</div>
                    <form action="{{ route('company.profile.cover') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <input type="file" class="form-control @error('cover_photo') is-invalid @enderror" name="cover_photo" onchange="readURL2(this)">
                            <img src="" id="two" width="160">
                            @if($errors->has('cover_photo'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('cover_photo') }}
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

    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(160)
                        .height(160);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
