@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">1</li>
                        <li class="list-group-item">2</li>
                        <li class="list-group-item">3</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="title">Image</label>
                            <input type="file" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Status</label>
                            <select name="status" id=""></select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
