@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-bottom: 8rem; margin-top: 10rem;">
            <div class="col-md-8">
                <div class="card">
                    @include('includes.flash_message')
                    <div class="card-header"><h3>Edit Specialized Profile</h3></div>

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
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
