@extends('layouts.app')

@section('title') Tableau de bord @endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="mb-3 text-white card bg-primary">
            <div class="card-body">
                <h2 class="card-title">{{ $advertisements->total() }}</h2>
                <p class="card-text">Annonces</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 text-white card bg-success">
            <div class="card-body">
                <h2 class="card-title">-</h2>
                <p class="card-text">En ligne</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 text-white card bg-warning">
            <div class="card-body">
                <h2 class="card-title">-</h2>
                <p class="card-text">En attente</p>
            </div>
        </div>
    </div>
</div>

<div class="my-4"></div>

@if ($message = session('message'))
    <div class="row">
        <div class="col-md">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Succès!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>    
@endif

<div class="mb-4 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($advertisements as $advertisement)
    <div class="col d-flex align-items-stretch">
        <div class="shadow-sm card">
            <a href="{{ route('ads.show',  Str::slug($advertisement->label)) }}" target="_blank"
                class="position-relative">
                <img class="bd-placeholder-img card-img-top"
                    src="{{ Storage::disk('public')->url($advertisement->image) }}" width="100%" height="250" alt="">
                <div class="top-0 mt-2 position-absolute start-0" style="margin-left: 0.5rem">
                    <span class="badge bg-success">En ligne</span>
                </div>
                <div class="bottom-0 mb-2 position-absolute end-0" style="margin-right: 0.5rem">
                    <span class="badge bg-light text-dark">{{ $advertisement->cost }}F/Jour</span>
                </div>
            </a>

            <div class="card-body d-flex flex-column">
                <a href="{{ route('ads.show',  Str::slug($advertisement->label)) }}" target="_blank"
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
                    <span><a href="{{ route('ads.edit', $advertisement->id) }}">Modifier</a></span>
                    <span><a onclick="return confirm('Êtes-vous sûre de vouloir supprimer?')" href="{{ route('ads.delete', $advertisement) }}" class="text-danger">Supprimer</a></span>
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
@endsection