@extends('layouts.app')

@section('title') Editer une annonce @endsection

@section('content')
<div class="mx-auto col-md-7 col-lg-8">
    <h4 class="mb-3">Editer une annonce</h4>
    <form class="needs-validation" novalidate method="POST" action="{{ route('ads.update', ['advertisement' => $advertisement]) }}" enctype="multipart/form-data">
        @csrf    
        @method('PUT')
        <div class="row g-3">
            <div class="col-12">
                <label for="label" class="form-label">Titre</label>
                <input type="text" class="form-control @error('label') is-invalid @enderror" id="label" name="label" placeholder="Ex. Groupe électrogène" value="{{ $advertisement->label }}" required>
                @error('label')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="col-12">
                <img class="mb-2" width="120" src="{{ Storage::disk('public')->url($advertisement->image) }}"/>
                <label class="px-4 border @error('image') border-danger is-invalid @enderror w-100 d-flex flex-column align-items-center justify-content-center" style="cursor: pointer; padding-top: 1.5rem; padding-bottom: 1.5rem;">
                    <svg class="w-8 h-8 text-secondary" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="24" height="24">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2">Sélectionner un nouveau fichier</span>
                    <input type='file' class="d-none" name="image" accept="image/*" id="image"/>
                </label>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror                    
            </div>
            
            
            <div class="col-12">
                <label for="address" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" placeholder="Ex. Objet à louer ...">{{ $advertisement->description }}</textarea>
            </div>

            <div class="col-md-6">
                <label for="cost" class="form-label">Prix <span class="text-muted">(/Jour)</span></label>
                <input type="text" class="form-control @error('cost') is-invalid @enderror" name="cost"  value="{{ $advertisement->cost }}" placeholder="Ex. 15000">
                @error('cost')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="caution" class="form-label">Caution</label>
                <input type="text" class="form-control @error('deposit') is-invalid @enderror" id="caution" name="deposit" value="{{ $advertisement->deposit }}" placeholder="Ex. 6000">
                @error('deposit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror                
            </div>

            <div class="col-md-6">
                <label for="city" class="form-label">Ville</label>
                <select id="city" class="form-select @error('city') is-invalid @enderror" name="city" required>
                    <option selected disabled>Choisissez une ville...</option>
                    <option value="Afanyagan">Afanyagan</option>
                    <option value="Agbodrafo">Agbodrafo</option>
                    <option value="Aného">Aného</option>
                    <option value="Atakpamé">Atakpamé</option>
                    <option value="Badou">Badou</option>
                    <option value="Bafilo">Bafilo</option>
                    <option value="Baguida">Baguida</option>
                    <option value="Bassar">Bassar</option>
                    <option value="Cinkassé">Cinkassé</option>
                    <option value="Dapaong">Dapaong</option>
                    <option value="Kandé">Kandé</option>
                    <option value="Kara">Kara</option>
                    <option value="Kpagouda">Kpagouda</option>
                    <option value="Kpalimé">Kpalimé</option>
                    <option value="Lomé">Lomé</option>
                    <option value="Mango">Mango</option>
                    <option value="Niamtougou">Niamtougou</option>
                    <option value="Notsé">Notsé</option>
                    <option value="Sokodé">Sokodé</option>
                    <option value="Sotouboua">Sotouboua</option>
                    <option value="Tabligbo">Tabligbo</option>
                    <option value="Tchamba">Tchamba</option>
                    <option value="Tsévié">Tsévié</option>
                    <option value="Vogan">Vogan</option>
                </select>
                @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror                  
            </div>
            <div class="col-md-6">
                <label for="street" class="form-label">Quartier</label>
                <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="{{ $advertisement->street }}" placeholder="Ex. Adidogomé">
                @error('street')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror                  
            </div>
        </div>

        <hr class="my-4">

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Envoyer ma position actuelle</label>
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-success btn-lg" type="submit">Enregistrer</button>
    </form>
</div>
@endsection