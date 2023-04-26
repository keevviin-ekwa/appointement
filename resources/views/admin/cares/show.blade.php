@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Soin
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
                            {{ $care->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Nom
                        </th>
                        <td>
                            {{ $care->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Duree
                        </th>
                        <td>
                            {{ $care->time}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Prix
                        </th>
                        <td>
                            {{ $care->cost}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Produits
                        </th>
                        <td>
                            @foreach($care->products as $product)
                                <span class="label label-info label-many">{{ $product->libelle }}</span>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    Liste des soins
                </a>
            </div>


        </div>
    </div>
@endsection
