<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'DCSE Portal') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('includes.head')

</head>
<body>

<div class="site-wrap">

    @include('includes.nav')

    @include('includes.hero')

    @include('includes.category')


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="mb-5 h3">Topics</h2>
                    <div class="rounded border jobs-wrap">

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

                    <div class="col-md-12 text-center mt-5">
                        <a href="{{ route('all.jobs') }}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Profiles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

   {{-- @include('includes.testimonial') --}}


    <div class="site-blocks-cover overlay inner-page" style="background-image: url('{{ asset('external/images/img_5.jpg') }}');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 text-center" data-aos="fade">
                    <h1 class="h3 mb-0">Join Now</h1>
                    <p class="h3 text-white mb-5">What are you waiting for?</p>
                    <p>
                        <a href="{{ route('register') }}" class="btn btn-outline-success py-3 px-4">Help Seeker</a>
                        <a href="{{ route('helper') }}" class="btn btn-outline-warning py-3 px-4">Helper</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')

</body>
</html>
