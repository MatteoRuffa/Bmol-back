@section('title', 'Admin Dashboard / Picures')
@extends ('layouts.admin')

@section('content')
    <section class="my-5">
        <h1 class="mb-4 m-3">Total pictures: {{ $totalPictures }}</h1>
        <a role="button" class="btn-2 strong draw-border-2 m-3" href="{{ route('admin.pictures.create') }}"><i class=" text-secondary fa-solid fa-plus"></i>  Add a picture</a> 
        <div class="container mt-5">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @include('partials.table-pictures', ['elements' => $pictures, 'elementName' => 'pictures'])
            {{$pictures->links('vendor.pagination.bootstrap-5')}}
        </div>
    </section>
@endsection 