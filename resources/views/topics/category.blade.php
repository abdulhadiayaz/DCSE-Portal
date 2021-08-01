@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top:10rem; margin-bottom: 4rem;">
            <h1 style="margin-bottom: 5rem;">{{ $category->name }}</h1>

            <div class="rounded border jobs-wrap" style="width: 100%; margin-bottom: 3rem;%" >

                @foreach($topics as $topic)
                    <a href="{{ route('topic.show', [$topic->id, $topic->slug]) }}" class="topic-item d-block d-md-flex align-items-center  border-bottom fulltime">
                        <div class="company-logo blank-logo text-center text-md-left pl-3">
                            <img src="{{ asset($topic->advisor->logo) }}" alt="Image" class="img-fluid mx-auto">
                        </div>
                        <div class="job-details h-100">
                            <div class="p-3 align-self-center">
                                <h3>{{ $topic->position }}</h3>
                                <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="icon-home2 mr-1">{{ $topic->advisor->advisor_name }}</span> </div>
                                    <div class="mr-3"><span class="icon-room mr-1"></span> {{ $topic->address }}</div>
                                    <div><span class="icon-money mr-1"></span> {{ $topic->salary }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="job-category align-self-center">
                            @if($topic->type == 'Fulltime')
                                <div class="p-3">
                                    <span class="text-info p-2 rounded border border-info">{{ $topic->type }}</span>
                                </div>
                            @elseif($topic->type == 'Part-Time')
                                <div class="p-3">
                                    <span class="text-warning p-2 rounded border border-warning">{{ $topic->type }}</span>
                                </div>
                            @else
                                <div class="p-3">
                                    <span class="text-primary p-2 rounded border border-primary">{{ $topic->type }}</span>
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
            {{ $topics->appends(Request::except('page'))->render() }}
        </div>

    </div>

@endsection

