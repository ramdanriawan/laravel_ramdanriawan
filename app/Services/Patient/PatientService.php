<?php

namespace App\Services\Patient;

use App\ModelData\PatientSaveModelData;
use App\ModelData\PatientUpdateModelData;
use Carbon\Carbon;


use App\Models\Patient;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

interface PatientService
{
    public static function findAll($length, $start, $columnToSearch, $search, $columnOrderName, $columnOrderDir, Model|Authenticatable $patient);


    // parameter patient belum saya pakai
    static function addAttributes(Patient|Builder|Model|array $item, Patient|Authenticatable|Model $patient): Patient|Model|stdClass;


    public static function delete(Patient $patient);

    /**
     * @param Request $request
     * @param PatientSaveModelData $patientSave
     * @param Patient|Authenticatable $patient
     * @return Patient|Model|stdClass
     */
    public static function save(Request $request, PatientSaveModelData $patientSave, Patient|Authenticatable $patient): Patient|Model|stdClass;

    public static function findOne($id, Model|Authenticatable $patient);

    public static function validateSaveData(Request $request, PatientSaveModelData $patientSave, Patient|Authenticatable $patient);


    /**
     * @param Request $request
     * @param PatientUpdateModelData $patientSave
     * @param Patient $item
     * @param Patient|Authenticatable $patient
     * @return Patient|Model|stdClass
     */
    public static function update(Request $request, PatientUpdateModelData $patientSave, Patient $item, Patient|Authenticatable $patient): Patient|Model|stdClass;

    public static function validateUpdateData(Request $request, PatientUpdateModelData $patientUpdate, Patient $item, Patient|Authenticatable $patient);

}
