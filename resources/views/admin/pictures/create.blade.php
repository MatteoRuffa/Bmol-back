@section('title', 'Admin Dashboard / Pictures')
@extends('layouts.admin')

@section('content')
<section class="container py-5">
    <div class="container rounded-2 container-table">
        <h1 class=" fw-bolder">Add a new Picture:</h1>
        <div id="ls-edit" class=""></div>
            <form action="{{ route('admin.pictures.store') }}" method="POST" enctype="multipart/form-data" id="" >
                @csrf
                <div class="mb-3 d-flex justify-content-between @error('image_cover') @enderror gap-5 img_edit">
                    <div class="w-50">
                        <div class="w-75  text-center">
                            <img id="uploadPreview" class="w-100 uploadPreview" width="100"src="{{ asset('storage/images/placeholder.png') }}" alt="preview">
                        </div>
        
                        <div class="w-75 mb-3">
                            <label for="image" class="form-label text-white">Image </label>
                            <input type="file" accept="image/*" class="form-control upload_image" id="uploadImage" name="image_cover"
                                value="{{ old('image_cover') }}">
                            @error('image_cover')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 
</section> 
@endsection