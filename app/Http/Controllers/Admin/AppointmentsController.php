<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Care;
use App\Client;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Service;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AppointmentsController extends Controller
{
    public function index(Request $request)
    {

        $appointments= Appointment::all();

        return view('admin.appointments.index',compact('appointments'));
    }

    public function create()
    {
        abort_if(Gate::denies('appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employees = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cares = Care::all();

        return view('admin.appointments.create', compact('clients', 'employees', 'cares'));
    }




    public function store(StoreAppointmentRequest $request)
    {





        $time=0;
        foreach ($request->services as $care){
            $car= Care::find($care);
            $time=$time+$car->time;
        }
        $start_time=$request->start_time;
        $finish_time=Carbon::parse($request->start_time)->addMinute($time);
        $employee_appointemnt= DB::table('appointments')->whereDate('created_at',Carbon::today())->get();
        $date=[];
        $i=0;
        foreach ($employee_appointemnt as $app)
        {
            echo $app->start_time;
            $date [$app->id]=$app->start_time;
        }


        usort($date, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });

        dd($date);







        $appointment= new Appointment();
        $appointment->start_time=$request->start_time;
        $appointment->finish_time=Carbon::parse($request->start_time)->addMinute($time);
        $appointment->client_id=$request->client_id;
        $appointment->employee_id =$request->employee_id;
        $appointment->save();
        $service= new Service();
        $som=0.0;
        foreach ($request->services as $_service)
        {
            $care= Care::find($_service);
            $som=$som+$care->cost;

        }


        $service->name= "nom";
        $service->price= $som;
        $service->appointment_id= $appointment->id;
        $service->save();
        $service->cares()->sync($request->services);

       // $appointment->save();

        return redirect()->route('admin.appointments.index');
    }

    public function edit(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employees = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::all()->pluck('name', 'id');

        $appointment->load('client', 'employee', 'services');

        return view('admin.appointments.edit', compact('clients', 'employees', 'services', 'appointment'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->all());
        $appointment->services()->sync($request->input('services', []));

        return redirect()->route('admin.appointments.index');
    }

    public function show($id)

    {
        $appointment=Appointment::find($id);
        $cost=0;
        $duree=0;
        foreach ($appointment->services->cares as $care){
            $cost=$cost+$care->cost;
            $duree=$duree+$care->time;
        }


        return view('admin.appointments.show', ['appointment'=>$appointment,'cost'=>$cost,'duree'=>$duree]);
    }

    public function destroy(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppointmentRequest $request)
    {
        Appointment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
