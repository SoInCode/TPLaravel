@extends('template')
@section('content')
    @if (session()->has('success'))
        <p class="text-white">{{ session()->get('success') }}</p>
    @endif
    <form class="needs-validation" action="{{ route('client.store') }}" method="POST">
        @csrf
        @method('post')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="text-white" for="civilite_id"></label>
                <select class="form-select" aria-label="Default select example" name="civilite_id" placeholder="civilite">
                    @foreach ($civilites as $civilite)
                        <option value="{{ $civilite['id'] }}" {{ $civilite['id'] == old('civilite_id') ? 'selected' : '' }}>
                            {{ $civilite['libelle'] }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-md-6">
                <label class="text-white" for="nom">Nom</label>
                <input type="text" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror"
                    id="nom" placeholder="nom" name="nom">
                @error('nom')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="text-white" for="prenom">Prénom</label>
                <input type="text" value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror"
                    id="prenom" placeholder="prenom" name="prenom">
                @error('prenom')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="text-white" for="email">Email</label>
            <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                id="mail" placeholder="email" name="email">
            @error('email')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="text-white" for="tel">Telephone</label>
                <input type="text" value="{{ old('tel') }}" class="form-control @error('tel') is-invalid @enderror" id="tel"
                    placeholder="tel" name="tel">
                @error('tel')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>


        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
