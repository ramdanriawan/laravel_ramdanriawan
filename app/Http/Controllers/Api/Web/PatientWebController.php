<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Services\ServiceImpl\Patient\PatientServiceImpl;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientWebController extends Controller
{

    public function dataTable(Request $request)
    {
        $data = PatientServiceImpl::findAll(
            $request->length,
            $request->start,
            'patientName',
            $request->search['value'],
            $request->order[0]['column'],
            $request->order[0]['dir'],
            auth()->guard('web')->user()
        );

        foreach ($data as $item) {
            $deleteApiUrl = url(route('api.v1.web.patient.delete', ['patient' => $item->id, "redirectBack" => false]));
            $editUrl = url(route('patient.edit', ['patient' => $item->id]));

            if ($item->isCanDelete) {

                $item->action = "<a href='$deleteApiUrl' class='delete-link btn btn-xs btn-danger' data-delete-api-url='$deleteApiUrl'>Delete</a>&nbsp;";

            }

            $item->action .= "<a href='$editUrl' class='btn btn-xs btn-info'>Edit</a>&nbsp;";
        }

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => Patient::count(),
            'recordsFiltered' => count($data) ? Patient::count() : count($data),
            'data' => $data
        ]);
    }

    public function delete(Patient $patient, Request $request)
    {
        PatientServiceImpl::delete($patient);

        if ($request->redirectBack) {

            return redirect()->back();
        }

        return response()->json([
            'success' => true,
            'message' => null,
            'data' => null,
        ]);
    }


    public
    function updateStatus(Request $request, Patient $patient)
    {
        $patient->update([
            'status' => $request->status
        ]);

        PatientServiceImpl::addOrUpdateFirebaseDocument(PatientServiceImpl::findOne($patient->id, auth()->guard('web')->patient()));

        return redirect()->back();
    }
}
