@extends('admin.master')

@section('body')
    <h4 class="card-title text-center text-uppercase">All Training Info</h4>
    <h1 class="text-center text-success">{{ session('message') }}</h1>
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
                            <th>Status</th>
                            <th>Starting Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($trainings as $training)
                            <tr class="{{ $training->status == 1 ? '' : 'bg-warning text-white' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($training->image) }}" alt="Loading..." height="100" width="120">
                                </td>
                                <td>{{ mb_substr($training->title, 0, 18, 'UTF-8') }}...</td>
                                <td>{!! $training->description !!}</td>
                                <td>{{ $training->price }}</td>
                                <td>{{ $training->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>{{ $training->starting_date }}</td>
                                <td class="d-flex">

                                    <a href="{{ route('admin.training.detail', ['id' => $training->id]) }}" class="btn btn-info btn-sm mr-1">
                                        <i class="fa fa-book-open"></i>
                                    </a>

                                    <a href="{{ route('admin.training.update.status', ['id' => $training->id]) }}" class="btn btn-success btn-sm mr-1">
                                        <i class="fa fa-arrow-circle-up"></i>
                                    </a>

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

