@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-bottom: 8rem; margin-top: 10rem;">
            <div class="col-md-8">
                <div class="card">
                    @include('includes.flash_message')
                    <div class="card-header"><h3>Edit Job</h3></div>

                    <form action="{{ route('job.update') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $job->id }}" name="id">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $job->title) }}">
                                @error('title')
                                <div class="error" style="color: red">
                                    {{ $errors->first('title') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea  name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $job->description) }}</textarea>
                                @error('description')
                                <div class="error" style="color: red">
                                    {{ $errors->first('description') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="roles">Roles</label>
                                <textarea name="roles" class="form-control @error('roles') is-invalid @enderror">{{ old('roles', $job->roles) }}</textarea>
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
                                        <option value="{{ $category->id }}"
                                        @if($category->id == $job->category_id)
                                            selected
                                        @endif
                                        >{{ $category->name }}</option>
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
                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $job->position) }}">
                                @error('position')
                                <div class="error" style="color: red">
                                    {{ $errors->first('position') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $job->address) }}">
                                @error('address')
                                <div class="error" style="color: red">
                                    {{ $errors->first('address') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="number_of_vacancy">No of vacancy:</label>
                                <input type="text" name="number_of_vacancy" class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}"  value="{{ old('number_of_vacancy', $job->number_of_vacancy) }}">
                                @if ($errors->has('number_of_vacancy'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="experience">Year of experience:</label>
                                <input type="text" name="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"  value="{{ old('experience', $job->experience) }}">
                                @if ($errors->has('experience'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="type">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value="any" {{ $job->gender == 'any' ? 'selected': '' }}>Any</option>
                                    <option value="male" {{ $job->gender == 'male' ? 'selected': '' }}>male</option>
                                    <option value="female" {{ $job->gender == 'female' ? 'selected': '' }}>female</option>
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
                                    <option value="negotiable" {{ $job->salary == 'negotiable' ? 'selected': '' }}>Negotiable</option>
                                    <option value="2000-5000" {{ $job->salary == '2000-5000' ? 'selected': '' }}>2000-5000</option>
                                    <option value="50000-10000" {{ $job->salary == '50000-10000' ? 'selected': '' }}>5000-10000</option>
                                    <option value="10000-20000" {{ $job->salary == '10000-20000' ? 'selected': '' }}>10000-20000</option>
                                    <option value="30000-500000" {{ $job->salary == '30000-500000' ? 'selected': '' }}>50000-500000</option>
                                    <option value="500000-600000" {{ $job->salary == '500000-600000' ? 'selected': '' }}>500000-600000</option>
                                    <option value="600000 plus" {{ $job->salary == '600000 plus' ? 'selected': '' }}>600000 plus</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" name="type">
                                    <option value="fulltime" {{$job->type=='fulltime'?'selected':''}}>fulltime</option>
                                    <option value="part-time" {{$job->type=='part-time'?'selected':''}}>part-time</option>
                                    <option value="casual" {{$job->type=='casual'?'selected':''}}>casual</option>
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
                                    @foreach($status as $key => $row)
                                        <option value="{{ $key }}"
                                        @if($key == $job->status)
                                            selected
                                        @endif
                                        >{{ $row }}</option>
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
                                <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline', $job->deadline) }}">
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
