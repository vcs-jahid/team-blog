@extends('admin.master')
@section('title')
    View Details
@endsection
@section('body')
    <h4 class="card-title text-center text-uppercase">Training Info</h4>
    <h1 class="text-center text-success">{{ session('message') }}</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tr>
                            <th>Training Image</th>
                            <td><img src="{{ asset($training->image) }}" alt="" height="100" width="120"></td>
                        </tr>
                        <tr>
                            <th>Training ID</th>
                            <td>{{ $training->id }}</td>
                        </tr>
                        <tr>
                            <th>Training Title</th>
                            <td>{{ $training->title }}</td>
                        </tr>
                        <tr>
                            <th>Training Category</th>
                            <td>{{ $training->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Teacher Info</th>
                            <td>{{ $training->teacher->name. '(' . $training->teacher->mobile . ')' }}</td>
                        </tr>
                        <tr>
                            <th>Training Description</th>
                            <td>{!! $training->description !!}</td>
                        </tr>
                        <tr>
                            <th>Training Starting Date</th>
                            <td>{{ $training->starting_date }}</td>
                        </tr>
                        <tr>
                            <th>Training Price</th>
                            <td>{{ $training->price }}</td>
                        </tr>
                        <tr>
                            <th>Training Status</th>
                            <td>{{ $training->status == 1 ? 'Published' : 'Unpublished' }}></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
