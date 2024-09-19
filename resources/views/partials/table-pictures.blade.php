@if($elements->isEmpty())
    <div class="alert alert-info">
        There are no pictures to display. Please add a new picture.
    </div>
@else
<div class="container">
    <div class="row">
        @foreach($pictures as $picture)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <img src="{{ asset('storage/' . $picture->image) }}" class="img-fluid" alt="Image {{  }}">
            </div>
        @endforeach
    </div>
</div>


@endif 