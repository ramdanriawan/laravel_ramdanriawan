<?php

namespace App\Http\Controllers;

use App\ModelData\PatientSaveModelData;
use App\ModelData\PatientUpdateModelData;
use App\Services\ServiceImpl\Email\EmailServiceImpl;
use App\Services\ServiceImpl\Patient\PatientServiceImpl;
use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //

        return view('patient.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {

        return view('patient.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $patientSaveModelData = new PatientSaveModelData(
            $request->hospitalId,
            $request->patientName,
            $request->address,
            $request->email,
            $request->phone,
        );

        PatientServiceImpl::save(
            $request,
            $patientSaveModelData,
            auth()->guard('web')->user()
        );

        return redirect()->route('patient.index')->with('success', 'Data added!');

    }

    /**
     * Display the specified resource.
     *
     * @param Patient $patient
     * @return Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Patient $patient
     * @return Application|Factory|View
     */
    public function edit(Patient $patient)
    {
        //
        $data['data'] = $patient;

        return view('patient.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Patient $patient
     * @return RedirectResponse
     */
    public function update(Request $request, Patient $patient)
    {
        $patientSaveModelData = new PatientUpdateModelData(
            $request->hospitalId,
            $request->patientName,
            $request->address,
            $request->email,
            $request->phone,
        );

        PatientServiceImpl::update(
            $request,
            $patientSaveModelData,
            $patient,
            auth()->guard('web')->user()
        );

        return redirect()->route('patient.index')->with('success', 'Data updated!');
    }


}
