@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-bottom: 8rem; margin-top: 10rem;">
            <div class="col-md-12">
                <div class="card">
                    @foreach($jobs as $job)
                        <div class="card-header"><h3><strong><a href="{{ route('job.show', [$job->id, $job->slug]) }}">{{ $job->title }}</a></strong></h3></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Experience</th>
                                    <th>Biography</th>
                                    <th>Cover Letter</th>
                                    <th>Resume</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($job->users as $applicant)
                                    <tr>
                                        <td>{{ $applicant->name }}</td>
                                        <td>{{ $applicant->email }}</td>
                                        <td>{{ $applicant->profile->address }}</td>
                                        <td>{{ $applicant->profile->gender }}</td>
                                        <td>{{ $applicant->profile->experience }}</td>
                                        <td>{{ $applicant->profile->biography }}</td>
                                        <td><a target="_blank" href="{{ asset($applicant->profile->cover_letter) }}"><i class="fa fa-file-pdf-o"></i> Cover Letter</a></td>
                                        <td><a target="_blank" href="{{ asset($applicant->profile->resume) }}"><i class="fa fa-file-pdf-o"></i> Resume</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
