<?php

namespace App\Services\ServiceImpl\Patient;

use App\ModelData\PatientSaveModelData;
use App\ModelData\PatientUpdateModelData;
use App\Services\Patient\PatientService;
use Carbon\Carbon;


use App\Models\Patient;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class PatientServiceImpl implements PatientService
{
    private static $collectionId = "patients";

    private static $withRelations = ['hospital'];

    private static $withCount = [];
    public static $columnOrder = [
        'id',
        'patientName',
        'address',
        'email',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function findAll($length, $start, $columnToSearch, $search, $columnOrderName, $columnOrderDir, Model|Authenticatable $patient)
    {
        if (empty($search) && !$start) {

            $data = Patient::limit($length);
        } else {

            $data = Patient::limit($length)->offset($start);
        }

        $data->with(self::$withRelations);
        $data->withCount(self::$withCount);

        $data->where($columnToSearch, 'like', '%' . $search . '%');

        $data->orderBy(self::$columnOrder[$columnOrderName] ?? $columnOrderName, $columnOrderDir);

        $data = $data->get();

        foreach ($data as $item) {
            $item = self::addAttributes($item, $patient);
        }

        return $data;
    }


    // parameter patient belum saya pakai
    static function addAttributes(Patient|Builder|Model|array $item, Patient|Authenticatable|Model $patient): Patient|Model|stdClass
    {
        if (is_array($item)) {
            $item = json_decode(json_encode($item));
        }

        $item->createdAtHuman = Carbon::parse($item->createdAt)->diffForHumans();
        $item->updatedAtHuman = Carbon::parse($item->updatedAt)->diffForHumans();
        $item->deletedAtHuman = Carbon::parse($item->deletedAt)->diffForHumans();

        $item->isCanDelete = true;


        return $item;
    }


    public static function delete(Patient $patient)
    {
        DB::transaction(function () use ($patient) {

            $patient->delete();
        });
    }


    /**
     * @param Request $request
     * @param PatientSaveModelData $patientSave
     * @param Patient|Authenticatable $patient
     * @return Patient|Model|stdClass
     */
    public static function save(Request $request, PatientSaveModelData $patientSave, Patient|Authenticatable $patient): Patient|Model|stdClass
    {

        $item = null;
        DB::transaction(function () use ($request, $patientSave, $patient, &$item) {
            self::validateSaveData($request, $patientSave, $patient);

            $dataToSave = [
                'hospitalId' => $patientSave->getHospitalId(),
                'patientName' => $patientSave->getPatientName(),
                'address' => $patientSave->getAddress(),
                'email' => $patientSave->getEmail(),
                'phone' => $patientSave->getPhone(),
            ];

            $item = Patient::create($dataToSave);

            $item = self::findOne($item->id, $item);
        });

        return $item;
    }

    public static function findOne($id, Model|Authenticatable $patient)
    {

        $data = Patient::with(self::$withRelations)->where(['id' => $id])->withCount(self::$withCount);

        $data = self::addAttributes($data->first()->toArray(), $patient);

        return $data;
    }


    public static function validateSaveData(Request $request, PatientSaveModelData $patientSave, Patient|Authenticatable $patient)
    {
        $request->validate([
            'hospitalId' => 'required|exists:hospitals,id|string',
            'patientName' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|unique:patients,email',
            'phone' => 'required|unique:patients,phone',
        ]);
    }


    /**
     * @param Request $request
     * @param PatientUpdateModelData $patientSave
     * @param Patient $item
     * @param Patient|Authenticatable $patient
     * @return Patient|Model|stdClass
     */
    public static function update(Request $request, PatientUpdateModelData $patientSave, Patient $item, Patient|Authenticatable $patient): Patient|Model|stdClass
    {
        DB::transaction(function () use ($request, $patientSave, $patient, &$item) {
            self::validateUpdateData($request, $patientSave, $item, $patient);

            $dataToSave = [
                'hospitalId' => $patientSave->getHospitalId(),
                'patientName' => $patientSave->getPatientName(),
                'address' => $patientSave->getAddress(),
                'email' => $patientSave->getEmail(),
                'phone' => $patientSave->getPhone(),
            ];

            $item->update($dataToSave);

            $item = self::findOne($item->id, $item);
        });

        return $item;
    }


    public static function validateUpdateData(Request $request, PatientUpdateModelData $patientUpdate, Patient $item, Patient|Authenticatable $patient)
    {
        $request->validate([
            'hospitalId' => "required|string",
            'patientName' => "required|string",
            'address' => "required|string",
            'email' => "required|unique:patients,email,{$patientUpdate->getEmail()},email|string",
            'phone' => "required|unique:patients,phone,{$patientUpdate->getPhone()},phone|string",
        ]);
    }

}
