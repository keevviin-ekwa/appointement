@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Service
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
                            {{ $service->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date de reservation
                        </th>
                        <td>
                            {{ \Carbon\Carbon::parse($service->appointment->start_time) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Client
                        </th>
                        <td>
                            {{ $service->appointment->client->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Cout
                        </th>
                        <td>
                            {{ $service->price}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Soins
                        </th>
                        <td>
                            @foreach($service->cares as $care)
                                <span class="badge badge-primary">{{$care->name}}</span>
                                <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Employé
                        </th>
                        <td>
                            {{ $service->appointment->employee->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Liste des prestations
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
