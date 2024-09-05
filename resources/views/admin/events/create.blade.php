@section('title', 'Admin Dashboard / Events')
@extends('layouts.admin')


@section('content')
<section class="container py-5">
    <div class="container rounded-2 container-table">
        <h1 class=" fw-bolder">Add a new Events:</h1>
        <h3>General informations</h3>
        <div id="ls-edit" class="">
            <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data" id="create-apartment-form" >
                @csrf
                <div class="mb-3 @error('name') is-invalid @enderror">
                    <label for="name" class="form-label fs-5 fw-medium">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" name="name" value="{{ old('name') }}"  maxlength="255" minlength="3">
                        <label for="name">*required</label>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                    
                <h3 class="mt-4">date info</h3>
                <div class="row">
                    <div class="mb-3 col @error('time') @enderror">
                        <label for="time" class="form-label fs-5 fw-medium">Select Time</label>
                        <input class="form-control @error('time') is-invalid @enderror"
                            id="time" name="time" value="{{ old('time') }}" type="time" step="3600" required>
                        <label for="time">*required</label>
                        @error('time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

    
                    <div class="mb-3 col @error('date') @enderror">
                        <label for="date" class="form-label fs-5 fw-medium">Select Date</label>
                        <input class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" type="date" required>
                        <label for="date">*required</label>
                        @error('date')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
        
                <div class="mb-3 @error('description') @enderror">
                    <h3>Description</h3>
                    <label for="description" class="form-label fs-5 fw-medium">Write here</label>
                    <textarea rows="6" class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                        
                    
                <h3 class="mt-4">Visibility</h3>
                <div class="address d-flex justify-content-center flex-column">
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input mt-2"  type="checkbox" id="visibility" name="visibility" value="1" {{ old('visibility') ? 'checked' : ''}}>
                            <label class="form-check-label fs-5  fw-medium" for="visibility">
                                Make visible
                            </label>
                            <label for="fs-5">( this will allow your apartment to be visible in the research )</label>
                        </div>
                    </div>  
                </div>

                <h3 class="mt-4">Event cover</h3>
                <div class="mb-3 d-flex justify-content-between @error('image_cover') @enderror gap-5 img_edit">
                    <div class="w-50">
                        <div class="w-75  text-center">
                            <img id="uploadPreview" class="w-100 uploadPreview" width="100"src="{{ asset('image/placeholder.png') }}" alt="preview">
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

                <div class="text-center mx-auto justify-content-center d-flex gap-2">
                    <button type="submit" class="btn-2 draw-border-2 p-2 px-3 mt-3 mx-3"><i class="fa-solid fa-plus"></i> Add the Apartment</button>
                </div> 
            </form>
        </div>
    </div> 
</section>    
@endsection






