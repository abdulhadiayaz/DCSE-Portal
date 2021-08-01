@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-bottom: 8rem; margin-top: 10rem;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Dashboard</h3></div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr class="table-row" data-href="{{ route('job.show', [$job->id, $job->slug]) }}">
                                    <td><img src="{{ asset($job->company->logo) }}" width="70"></td>
                                    <td><a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="fa"><span style="font-size: 17px;">{{ Str::title($job->position) }}</span></a>
                                        <br>
                                        <i class="fa fa-clock-o"></i> <span style="font-size: 15px;">{{ $job->type }}</span>
                                    </td>
                                    <td><i class="fa fa-map-marker"></i> {{ Str::title($job->address) }}</td>
                                    <td><i class="fa fa-calendar"></i> {{ $job->created_at->diffForHumans() }}</td>
                                    <td><a href="{{ route('job.edit', [$job->id, $job->slug]) }}" class="btn btn-dark"><i class="fa fa-edit"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $jobs->render() }}
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
