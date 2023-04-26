@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Founisseur
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
                            {{ $provider->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nom
                        </th>
                        <td>
                            {{ $provider->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Phone
                        </th>
                        <td>
                            {{ $provider->phone}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{ $provider->email}}
                        </td>
                    </tr>

                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    Liste des fournisseurs
                </a>
            </div>


        </div>
    </div>
@endsection
