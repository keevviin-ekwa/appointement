@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
          Ajouter un produit
        </div>

        <div class="card-body">
            <form action="{{ route("admin.cares.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Libelle *</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($care) ? $care->name : '') }}" step="0.01">
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.appointment.fields.price_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
                    <label for="time">Duree *</label>
                    <input type="number" id="time" name="time" class="form-control" value="{{ old('time', isset($care) ? $care->time : '') }}" step="0.01">
                    @if($errors->has('time'))
                        <em class="invalid-feedback">
                            {{ $errors->first('time') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.appointment.fields.price_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                    <label for="care">Cout *</label>
                    <input type="number" id="care" name="cost" class="form-control" value="{{ old('cost', isset($care) ? $care->cost : '') }}" step="0.01">
                    @if($errors->has('cost'))
                        <em class="invalid-feedback">
                            {{ $errors->first('cost') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.appointment.fields.price_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control ">{{ old('description', isset($care) ? $care->description : '') }}</textarea>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.appointment.fields.comments_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('produits') ? 'has-error' : '' }}">
                    <label for="services">Produits *
                        </label>
                    <select name="products[]" id="produits" class="form-control select2" multiple="multiple">
                        @foreach($products as $id => $product)
                            <option value="{{ $product->id }}" >{{ $product->libelle }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('produits'))
                        <em class="invalid-feedback">
                            {{ $errors->first('services') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.appointment.fields.services_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="Enregistrer">
                </div>
            </form>


        </div>
    </div>
@endsection
