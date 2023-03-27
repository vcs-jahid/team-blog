@extends('teacher.master')
@section('body')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-center text-uppercase">Add Training Form</h4>
                    <h1 class="text-center text-success">{{ session('message') }}</h1>
                    <form action="{{ route('training.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-image-input" class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" id="horizontal-image-input">
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-category-input" class="col-sm-3 col-form-label">Training Category</label>
                            <div class="col-sm-9">
                                <select name="category_id" id="horizontal-category-input" class="form-control" required>
                                    <option value="" disabled selected>-- Select Training Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-title-input" class="col-sm-3 col-form-label">Training Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="horizontal-title-input" value="{{ old('title') }}">
                                <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-description-input" class="col-sm-3 col-form-label">Training Description</label>
                            <div class="col-sm-9">
                                <textarea id="horizontal-description-input" name="description" class="form-control summernote">{{ old('description') }}</textarea>
                                <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-starting_date-input" class="col-sm-3 col-form-label">Starting Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="starting_date" class="form-control" id="horizontal-starting_date-input" value="{{ old('starting_date') }}">
                                <span class="text-danger">{{ $errors->has('starting_date') ? $errors->first('starting_date') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-price-input" class="col-sm-3 col-form-label">Training Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" id="horizontal-price-input" value="{{ old('price') }}">
                                <span class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Training</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
