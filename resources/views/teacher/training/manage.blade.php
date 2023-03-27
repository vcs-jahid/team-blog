@extends('teacher.master')

@section('body')
    <h4 class="card-title text-center text-uppercase">All Teacher Info</h4>
    <h1 class="text-center text-success">{{ session('message') }}</h1>
    <div class="row">
        <div class="col-md-5 p-4 mx-auto">
            <form action="{{ route('training.search') }}" method="post">
                <div class="input-group">
                    @csrf
                    <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <input type="submit" class="btn btn-outline-primary" value="Search">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Starting Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($trainings as $training)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($training->image) }}" alt="Loading..." height="100" width="120">
                                </td>
                                <td>{{ $training->title }}</td>
                                <td>{{ $training->description }}</td>
                                <td>{{ $training->price }}</td>
                                <td>{{ $training->starting_date }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('training.edit', ['id' => $training->id]) }}" class="btn btn-warning btn-sm mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('training.delete', ['id' => $training->id]) }}" method="post" onsubmit="return confirm('Are you sure to delete this')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
