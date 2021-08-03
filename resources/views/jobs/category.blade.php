@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top:10rem; margin-bottom: 4rem;">
            <h1 style="margin-bottom: 5rem;">{{ $category->name }}</h1>

            <div class="rounded border jobs-wrap" style="width: 100%; margin-bottom: 3rem;%" >

            @foreach($jobs as $job)
                            <a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                                <div class="company-logo blank-logo text-center text-md-left pl-3">
                                    <img src="{{ $job->advisor->logo ? asset($job->advisor->logo) : asset('avatar/man.jpg') }}" alt="Image" class="img-fluid mx-auto">
                                </div>
                                <div class="job-details h-100">
                                    <div class="p-3 align-self-center">
                                        <h3>{{ $job->title }}</h3>
                                        <div class="d-block d-lg-flex">
                                            <div class="mr-4"><span class="icon-user mr-1">  {{ $job->advisor->advisor_name }}</span> </div>
                                            <div class="mr-4"><span class="icon-room mr-2"></span>{{ $job->advisor->address }}</div>
                                            <div><span class="icon-book mr-1"></span>{{ $job->advisor->semester }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-category align-self-center">
                                    
                                        <div class="p-3">
                                            <span class="text-success p-2 rounded border border-success">Contact</span>
                                        </div>
                                </div>
                            </a>
                        @endforeach
            </div>
            {{ $jobs->appends(Request::except('page'))->render() }}
        </div>

    </div>

@endsection

