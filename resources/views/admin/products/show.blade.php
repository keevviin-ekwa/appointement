@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Produit
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            Id
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Designation
                        </th>
                        <td>
                            {{ $product->libelle}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                           {{$product->description}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Quantite
                        </th>
                        <td>
                            {{$product->quantity}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Quantite Minimale
                        </th>
                        <td>
                            {{$product->quantityMin}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Prix
                        </th>
                        <td>
                            {{$product->price}}
                        </td>
                    </tr>

                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    Liste des produits
                </a>
            </div>


        </div>
    </div>
@endsection
