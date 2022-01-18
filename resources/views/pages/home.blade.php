@extends('layouts.app')

@section('title') Home @endsection

@section('content')

<div class="p-5 mb-4 text-center bg-light rounded-3">
    <div class="py-5 container-fluid">
        <h1 class="display-5 fw-bold">LocaChem</h1>
        <p class="fs-4">Louer tout types de biens ou d'objects ici à moindre coût</p>

        <div class="mx-auto mb-3 col-md-8">
            <input type="email" class="form-control form-control-lg rounded-pill " id="search"
                placeholder="Groupe éléctrogène, Chaises, Ciseaux jardinage, etc." autocomplete="off">
        </div>
    </div>
</div>

<div class="mb-4 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($advertisements as $advertisement)
    <div class="col d-flex align-items-stretch">
        <div class="shadow-sm card">
            <a href="{{ route('ads.show',  Str::slug($advertisement->label)) }}" class="position-relative">
                <img class="bd-placeholder-img card-img-top" src="storage/{{ $advertisement->image }}" width="100%"
                    height="340" alt="" style="object-fit: cover">
                <div class="bottom-0 mb-2 position-absolute end-0" style="margin-right: 0.5rem">
                    <span class="badge bg-light text-dark">{{ $advertisement->cost }}F/Jour</span>
                </div>
            </a>

            <div class="card-body d-flex flex-column">
                <a href="{{ route('ads.show',  Str::slug($advertisement->label)) }}"
                    class="text-decoration-none text-dark">
                    <h5 class="card-title">{{ $advertisement->label }}</h5>
                </a>

                <p class="card-text">
                    {{ Str::limit($advertisement->description, 120, '...') }}
                </p>
                <p class="text-muted">
                    {{ $advertisement->city }}/{{ $advertisement->street }}
                </p>
                <div class="mt-auto d-flex justify-content-between align-items-center">
                    <span>Publié il y'a : </span>
                    <small class="text-white badge rounded-pill" style="background-color: #717477">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14"
                            height="14" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $advertisement->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>

@endsection

@push('javascripts')

@endpush