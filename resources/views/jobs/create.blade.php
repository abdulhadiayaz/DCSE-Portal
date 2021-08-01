@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 10rem; margin-bottom: 8rem;">
            <div class="col-md-8">
                <div class="card">
                    @include('includes.flash_message')
                    <div class="card-header"><h3>Create a Job</h3></div>

                    <form action="{{ route('job.store') }}" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                @error('title')
                                <div class="error" style="color: red">
                                    {{ $errors->first('title') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea  name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="error" style="color: red">
                                    {{ $errors->first('description') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="roles">Roles</label>
                                <textarea name="roles" class="form-control @error('roles') is-invalid @enderror">{{ old('roles') }}</textarea>
                                @error('roles')
                                <div class="error" style="color: red">
                                    {{ $errors->first('roles') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select Category...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="error" style="color: red">
                                    {{ $errors->first('category_id') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
                                @error('position')
                                <div class="error" style="color: red">
                                    {{ $errors->first('position') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                @error('address')
                                <div class="error" style="color: red">
                                    {{ $errors->first('address') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="number_of_vacancy">No of vacancy:</label>
                                <input type="text" name="number_of_vacancy" class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}"  value="{{ old('number_of_vacancy') }}">
                                @if ($errors->has('number_of_vacancy'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="experience">Year of experience:</label>
                                <input type="text" name="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"  value="{{ old('experience') }}">
                                @if ($errors->has('experience'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="type">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value="any">Any</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="type">Salary/year:</label>
                                <select class="form-control" name="salary">
                                    <option value="negotiable">Negotiable</option>
                                    <option value="2000-5000">2000-5000</option>
                                    <option value="50000-10000">5000-10000</option>
                                    <option value="10000-20000">10000-20000</option>
                                    <option value="30000-500000">50000-500000</option>
                                    <option value="500000-600000">500000-600000</option>
                                    <option value="600000 plus">600000 plus</option>
                                </select>
                            </div>

                            <div class="form-group">
                                @php
                                    $types = ['casual', 'fulltime', 'part-time'];
                                @endphp
                                <label for="type">Type</label>
                                <select name="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="">Select type...</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="error" style="color: red">
                                    {{ $errors->first('type') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                @php
                                    $status = ['Draft', 'Live'];
                                @endphp
                                <label for="status">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Select status...</option>
                                    @foreach($status as $key => $row)
                                        <option value="{{ $key }}">{{ $row }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="error" style="color: red">
                                    {{ $errors->first('status') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deadline">Application Deadline</label>
                                <input type="date" id="datepicker" name="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline') }}">
                                @error('deadline')
                                <div class="error" style="color: red">
                                    {{ $errors->first('v') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
