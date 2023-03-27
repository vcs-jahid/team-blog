@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center text-uppercase">All Teacher Info</h4>
                    <h1 class="text-center text-success">{{ session('message') }}</h1>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($category->image) }}" alt="Loading..." height="100" width="120">
                                </td>
                                <td>{{ $category->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-warning btn-sm mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="post" onsubmit="return confirm('Are you sure to delete this')">
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
