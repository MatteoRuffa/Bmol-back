 {{-- @include('partials.modal-show') DA VEDERE SE AGGIUNGERE IN SEGUITO O NO! --}}  
@if($elements->isEmpty())
    <div class="alert alert-info">
        There are no events to display. Please add a new event.
    </div>
@else
<table id="mr-table" class="table table-hover shadow mb-2 mt-4 ms-3">
    <thead>
        <tr>
            <th class="text-white w-15 d-none fw-normal d-xl-table-cell" scope="col">Event cover</th>
            <th class="text-white w-20 d-xl-table-cell fw-normal" scope="col">Event name</th>
            <th class="text-white w-15 fw-normal d-lg-table-cell" scope="col">Date</th>
            <th class="text-white w-15 fw-normal d-lg-table-cell" scope="col">Time</th>
            <th scope="col" class="text-white w-15 fw-normal d-lg-table-cell">Visibility</th>
            <th scope="col" class="text-white w-15 fw-normal d-lg-table-cell">Description</th>
            <th scope="col" class="text-white w-15 fw-normal {{ Route::currentRouteName() === 'admin.apartments.index' }}">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($elements as $element)
            <tr>
                <td id="td-image-cover" class=" d-xl-table-cell"><img class="img-fluid rounded" src="{{ asset('storage/' . $element->image_cover) }}" alt="{{ $element->name }}"></td>
                <td class="d-xl-table-cell align-content-center">{{ $element->name }}</td>
                <td class="d-lg-table-cell align-content-center">{{ \Carbon\Carbon::parse($element->date)->format('d/m/Y') }}</td>
                <td class="d-lg-table-cell align-content-center">{{ \Carbon\Carbon::createFromFormat('H:i:s', $element->hour)->format('H:i') }}</td>
                <td class="d-xl-table-cell align-content-center">
                    @if ($element->visibility == 1)
                    <div>
                        <i class="fa-solid fa-eye"></i>
                        <span>Active</span>
                    </div>
                    @else
                        <div>
                        <i class="fa-solid fa-eye-slash"></i>
                        <span>Disabled</span>
                        </div>
                    @endif
                </td>
                <td class="d-lg-table-cell align-content-center">{{ $element->description }}</td>
                <td class="{{ Route::currentRouteName() === 'admin.events.index' ? '' : 'd-none' }} align-content-center pe-3 d-lg-table-cell">
                        <!-- Administration Actions -->
                            {{-- <a href="{{ route('admin.apartments.show', $element) }}" class="btn draw-border">
                                <div class="icon-container">
                                    <i class="fs-3 fas fa-info-circle"></i>
                                </div>
                            </a> --}}
                            <a href="{{ route('admin.events.edit', $element) }}" class="btn draw-border">
                                <div class="icon-container">
                                    <i class="fs-3 fas fa-pencil-alt"></i>
                                </div>
                            </a>
                            <form class="d-inline" id="delete-form-{{ $element->id }}" action="{{ route('admin.events.destroy', $element->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn draw-border" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $element->id }}">
                                    <i class="fs-3 text-danger fa-solid fa-trash"></i>
                                </button>
                            </form>
                </td>
            </tr>
            @include('partials.modal-delete', ['element' => $element]) 
        @endforeach
    </tbody>
</table>
@endif 
