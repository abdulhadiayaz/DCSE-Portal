@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 10rem; margin-bottom: 8rem;">
        <div class="col-md-10">
            @if(Auth::user()->user_type == 'seeker')
                @foreach($jobs as $job)
                    <div class="card">
                        <div class="card-header">{{ $job->title }}</div>
                        <small class="badge badge-dark" style="width: 25rem"><h6>{{ $job->position }}</h6></small>
                        <div class="card-body">
                            {{ $job->description }}
                        </div>
                        <div class="card-footer">
                            <span><a href="{{ route('job.show', [$job->id, $job->slug]) }} ">Read</a></span>
                            <span class="float-right">Application Deadline: <span style="color: darkred">{{ date('F d, Y', strtotime($job->deadline)) }}</span></span>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
