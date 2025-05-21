<?php

namespace App\Http\Controllers;

use App\ModelData\HospitalSaveModelData;
use App\ModelData\HospitalUpdateModelData;
use App\Services\ServiceImpl\Email\EmailServiceImpl;
use App\Services\ServiceImpl\Hospital\HospitalServiceImpl;
use App\Models\Hospital;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //

        return view('hospital.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {

        return view('hospital.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $hospitalSaveModelData = new HospitalSaveModelData(
            $request->hospitalName,
            $request->address,
            $request->email,
            $request->phone,
        );

        HospitalServiceImpl::save(
            $request,
            $hospitalSaveModelData,
            auth()->guard('web')->user()
        );

        return redirect()->route('hospital.index')->with('success', 'Data added!');

    }

    /**
     * Display the specified resource.
     *
     * @param Hospital $hospital
     * @return Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Hospital $hospital
     * @return Application|Factory|View
     */
    public function edit(Hospital $hospital)
    {
        //
        $data['data'] = $hospital;

        return view('hospital.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Hospital $hospital
     * @return RedirectResponse
     */
    public function update(Request $request, Hospital $hospital)
    {
        $hospitalSaveModelData = new HospitalUpdateModelData(
            $request->hospitalName,
            $request->address,
            $request->email,
            $request->phone,
        );

        HospitalServiceImpl::update(
            $request,
            $hospitalSaveModelData,
            $hospital,
            auth()->guard('web')->user()
        );

        return redirect()->route('hospital.index')->with('success', 'Data updated!');
    }

}
