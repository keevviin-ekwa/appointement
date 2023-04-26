<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Provider;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProviderController extends Controller
{
    public function index()
    {
        $providers= Provider::all();

        return view('admin.providers.index',compact('providers'));
    }

    public function create()
    {
        return view('admin.providers.create');
    }

    public function store(Request $request)
    {
        $provider = new Provider();
        $provider->name=$request->name;
        $provider->phone=$request->phone;
        $provider->email=$request->email;
        $provider->save();
        return redirect('admin/providers');
    }

    public function show($id)
    {
        $provider=Provider::find($id);
        return view('admin.providers.show',compact('provider'));
    }

}
