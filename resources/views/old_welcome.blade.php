@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Recent Jobs</h1>
        <br>
        <div class="row">
            <div class="col-md-12">
                <search-component></search-component>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr class="table-row" data-href="{{ route('job.show', [$job->id, $job->slug]) }}">
                        <td><img src="{{ asset($job->company->logo) }}" width="70"></td>
                        <td><a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="fa"><span style="font-size: 17px;">{{ $job->position }}</span></a>
                            <br>
                            <i class="fa fa-clock-o"></i> <span style="font-size: 15px;">{{ $job->type }}</span>
                        </td>
                        <td><i class="fa fa-map-marker"></i> {{ $job->address }}</td>
                        <td><i class="fa fa-calendar"></i> {{ $job->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <a href="{{ route('all.jobs') }}" class="btn btn-dark btn-lg btn-block">Browse all Jobs</a>
        </div>
        <br><br>
        <h1>Featured Companies</h1>
        <br>
    </div>

    <div class="container">
        <div class="row">
            @foreach($companies as $company)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ $company->cover_photo ? asset($company->cover_photo) : asset('cover/tumblr-image-sizes-banner.png') }}" class="card-img-top" height="150">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $company->company_name }}</strong></h5>
                            <p class="card-text">{{ Str::limit($company->description, 30) }}</p>
                            <a href="{{ route('company.show', [$company->id, $company->slug]) }}" class="btn btn-outline-primary">Visit Company</a>
                        </div>
                    </div>
                    <br>
                </div>
            @endforeach
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
