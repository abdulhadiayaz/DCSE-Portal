@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 8rem; margin-bottom: 8rem;">
                <div class="advisor-profile">
                    <img src="{{ $advisor->cover_photo ? asset($advisor->cover_photo) : asset('cover/tumblr-image-sizes-banner.png') }}" style="width: 100%;">
                    <div class="advisor-description">
                        <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                            <div class="col-sm-2">
                                <img src="{{ $advisor->logo ? asset($advisor->logo) : asset('avatar/man.jpg') }}" class="img-fluid img-thumbnail">
                            </div>
                            <div class="col-sm-10">
                                <p>{{ $advisor->description }}</p>
                            </div>
                        </div>
                        <h1 class="d-flex justify-content-center">{{ $advisor->advisor_name }}</h1>
                        <div class="row text-center">
                            <div class="col-md-3"><i class="icon-lightbulb-o"></i> <strong>Semester:</strong> {{ $advisor->semester }}</div>
                            <div class="col-md-3"><i class="icon-map-marker"></i> {{ $advisor->address }}</div>
                            <div class="col-md-3"><i class="icon-phone"></i> {{ $advisor->phone }}</div>
                            <div class="col-md-3"><i class="icon-globe"></i> <a href="{{ $advisor->website }}" target="_blank">{{ $advisor->website }}</a></div>
                        </div>
                    </div>
                </div>
                <br>
                <h4 style="margin-top: 3rem">Specialized Profile</h4>
                <div class="rounded border jobs-wrap">

                    @foreach($advisor->jobs as $job)
                        <a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                            <div class="company-logo blank-logo text-center text-md-left pl-3">
                                <img src="{{ $job->advisor->logo ? asset($job->advisor->logo) : asset('avatar/man.jpg') }}" alt="Image" class="img-fluid mx-auto">
                            </div>
                            <div class="job-details h-100">
                                <div class="p-3 align-self-center">
                                    <h3>{{ $job->position }}</h3>
                                    <div class="d-block d-lg-flex">
                                        <div class="mr-3"><span class="icon-home2 mr-1">{{ $job->advisor->advisor_name }}</span> </div>
                                        <div class="mr-3"><span class="icon-room mr-1"></span> {{ $job->address }}</div>
                                        <div><span class="icon-money mr-1"></span> {{ $job->salary }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-category align-self-center">
                                @if($job->type == 'Fulltime')
                                    <div class="p-3">
                                        <span class="text-info p-2 rounded border border-info">{{ $job->type }}</span>
                                    </div>
                                @elseif($job->type == 'Part-Time')
                                    <div class="p-3">
                                        <span class="text-warning p-2 rounded border border-warning">{{ $job->type }}</span>
                                    </div>
                                @else
                                    <div class="p-3">
                                        <span class="text-primary p-2 rounded border border-primary">{{ $job->type }}</span>
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
@endsection
