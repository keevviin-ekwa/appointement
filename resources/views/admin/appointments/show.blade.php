@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      Reservation
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
                            {{ $appointment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date
                        </th>
                        <td>
                            {{ $appointment->start_time ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Client
                        </th>
                        <td>
                            {{ $appointment->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Employe
                        </th>
                        <td>
                            {{ $appointment->employee->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Durre
                        </th>
                        <td>
                            {{ $duree }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Cout
                        </th>
                        <td>
                            {{$cost}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.comments') }}
                        </th>
                        <td>
                            {!! $appointment->comments !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Soins
                        </th>
                        <td>
                            @foreach($appointment->services->cares as $id => $cares)
                                <span class="label label-info label-many">{{ $cares->name }} ;</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Liste des reservations
            </a>
        </div>


    </div>
</div>
@endsection
