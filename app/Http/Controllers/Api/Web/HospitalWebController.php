<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Services\ServiceImpl\Hospital\HospitalServiceImpl;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalWebController extends Controller
{

    public function dataTable(Request $request)
    {
        $data = HospitalServiceImpl::findAll(
            $request->length,
            $request->start,
            'hospitalName',
            $request->search['value'],
            $request->order[0]['column'],
            $request->order[0]['dir'],
            auth()->guard('web')->user()
        );

        foreach ($data as $item) {
            $deleteApiUrl = url(route('api.v1.web.hospital.delete', ['hospital' => $item->id, "redirectBack" => false]));
            $editUrl = url(route('hospital.edit', ['hospital' => $item->id]));

            if ($item->isCanDelete) {

                $item->action = "<a href='$deleteApiUrl' class='delete-link btn btn-xs btn-danger' data-delete-api-url='$deleteApiUrl'>Delete</a>&nbsp;";

            }

            $item->action .= "<a href='$editUrl' class='btn btn-xs btn-info'>Edit</a>&nbsp;";
        }

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => Hospital::count(),
            'recordsFiltered' => count($data) ? Hospital::count() : count($data),
            'data' => $data
        ]);
    }

    public function delete(Hospital $hospital, Request $request)
    {
        HospitalServiceImpl::delete($hospital);

        if ($request->redirectBack) {

            return redirect()->back();
        }

        return response()->json([
            'success' => true,
            'message' => null,
            'data' => null,
        ]);
    }

    public function updateStatus(Request $request, Hospital $hospital)
    {
        $hospital->update([
            'status' => $request->status
        ]);

        HospitalServiceImpl::addOrUpdateFirebaseDocument(HospitalServiceImpl::findOne($hospital->id, auth()->guard('web')->hospital()));

        return redirect()->back();
    }

    public function select2(Request $request)
    {
        $data = HospitalServiceImpl::findAll(
            20,
            0,
            'hospitalName',
            $request->q,
            'id',
            'desc',
            auth()->guard('web')->user()
        );

        return [
            'incomplete_results' => true,
            'items' =>  $data,
            'total_count' =>  count($data)
        ];
    }
}
