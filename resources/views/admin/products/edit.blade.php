@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Creer un produit
        </div>

        <div class="card-body">
            <form action="{{ route("admin.products.update") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('libelle') ? 'has-error' : '' }}">
                    <label for="start_time">Designation *</label>
                    <input type="text" id="start_time" name="libelle" class="form-control " value="{{ old('libelle', isset($produit) ? $produit->libelle : '') }}" required>
                    @if($errors->has('libelle'))
                        <em class="invalid-feedback">
                            {{ $errors->first('libelle') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="start_time">Description </label>
                    <input type="text" id="start_time" name="description" class="form-control " value="{{ old('description', isset($produit) ? $produit->description : '') }}" required>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="start_time">Quantite *</label>
                    <input type="number" id="start_time" name="quantity" class="form-control " value="{{ old('quantity', isset($produit) ? $produit->quantity : '') }}" required>
                    @if($errors->has('quantity'))
                        <em class="invalid-feedback">
                            {{ $errors->first('quantity') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('quantityMin') ? 'has-error' : '' }}">
                    <label for="start_time">Quantite minimal *</label>
                    <input type="number" id="start_time" name="quantityMin" class="form-control " value="{{ old('quantityMin', isset($produit) ? $produit->quantityMin : '') }}" required>
                    @if($errors->has('quantityMin'))
                        <em class="invalid-feedback">
                            {{ $errors->first('quantityMin') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="prix">Prix *</label>
                    <input type="number" id="prix" name="price" class="form-control " value="{{ old('price', isset($produit) ? $produit->price : '') }}" required>
                    @if($errors->has('price'))
                        <em class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                    <label for="type">Type de produit</label>
                    <select name="type" id="type" class="form-control select2">
                        <option selected value="{{$type->id}}">{{$type->libelle}}</option>
                        @foreach($types as $_type)
                            <option value="{{ $_type->id }}">{{ $_type->libelle }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('type'))
                        <em class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </em>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('provider') ? 'has-error' : '' }}">
                    <label for="provider">Fournisseur *</label>
                    <select name="provider" id="provider" class="form-control select2">
                        <option value="{{$produit->provider->id}}">{{$produit->provider->name}}</option>
                        @foreach($providers as $provider)
                            <option value="{{$provider->id}}">{{ $provider->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provider'))
                        <em class="invalid-feedback">
                            {{ $errors->first('provider') }}
                        </em>
                    @endif
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="Enregistrer">
                </div>
            </form>


        </div>
    </div>
@endsection
