@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 8rem; margin-bottom: 4rem;">
            <form action="{{ route('all.topics') }}" method="get" style="margin-top: 3rem;">
                <div class="form-inline">
                    <div class="form-group">
                        <label for="Keyword">Keyword&nbsp;</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        @php
                            $types = ['casual', 'fulltime', 'part-time'];
                        @endphp
                        <label for="type">Type&nbsp;</label>
                        <select name="type" class="form-control">
                            <option value="">Select...</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category">Category&nbsp;</label>
                        <select name="category_id" class="form-control" style="margin-right: 5px">
                            <option value="">Select...</option>
                            @foreach(\App\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Address&nbsp;</label>
                        <input type="text" name="address" class="form-control" style="margin-right: 5px">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </div>
                </div>
                <br>
            </form>


            <div class="rounded border jobs-wrap" style="width: 100%; margin-bottom: 3rem;%" >
                @if(count($topics) > 0)
                    @foreach($topics as $topic)
                        <a href="{{ route('topic.show', [$topic->id, $topic->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
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
                @else
                    <div style="text-align: center;">No topics Found</div>
                @endif
            </div>
            {{ $topics->appends(Request::except('page'))->render() }}
        </div>

    </div>

@endsection

