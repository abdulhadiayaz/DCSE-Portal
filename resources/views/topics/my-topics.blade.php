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
                            @foreach($topics as $topic)
                                <tr class="table-row" data-href="{{ route('topic.show', [$topic->id, $topic->slug]) }}">
                                    <td><img src="{{ asset($topic->advisor->logo) }}" width="70"></td>
                                    <td><a href="{{ route('topic.show', [$topic->id, $topic->slug]) }}" class="fa"><span style="font-size: 17px;">{{ Str::title($topic->position) }}</span></a>
                                        <br>
                                        <i class="fa fa-clock-o"></i> <span style="font-size: 15px;">{{ $topic->type }}</span>
                                    </td>
                                    <td><i class="fa fa-map-marker"></i> {{ Str::title($topic->address) }}</td>
                                    <td><i class="fa fa-calendar"></i> {{ $topic->created_at->diffForHumans() }}</td>
                                    <td><a href="{{ route('topic.edit', [$topic->id, $topic->slug]) }}" class="btn btn-dark"><i class="fa fa-edit"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $topics->render() }}
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
