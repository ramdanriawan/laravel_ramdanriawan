<?php

namespace App\Services\Hospital;

use App\ModelData\HospitalSaveModelData;
use App\ModelData\HospitalUpdateModelData;
use Carbon\Carbon;


use App\Models\Hospital;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

interface HospitalService
{
    public static function findAll($length, $start, $columnToSearch, $search, $columnOrderName, $columnOrderDir, Model|Authenticatable $hospital)
    ;


    // parameter hospital belum saya pakai
    static function addAttributes(Hospital|Builder|Model|array $item, Hospital|Authenticatable|Model $hospital): Hospital|Model|stdClass
    ;


    public static function delete(Hospital $hospital)
    ;


    /**
     * @param Request $request
     * @param HospitalSaveModelData $hospitalSave
     * @param Hospital|Authenticatable $hospital
     * @return Hospital|Model|stdClass
     */
    public static function save(Request $request, HospitalSaveModelData $hospitalSave, Hospital|Authenticatable $hospital): Hospital|Model|stdClass
    ;

    public static function findOne($id, Model|Authenticatable $hospital)
    ;


    public static function validateSaveData(Request $request, HospitalSaveModelData $hospitalSave, Hospital|Authenticatable $hospital)
    ;

    /**
     * @param Request $request
     * @param HospitalUpdateModelData $hospitalSave
     * @param Hospital $item
     * @param Hospital|Authenticatable $hospital
     * @return Hospital|Model|stdClass
     */
    public static function update(Request $request, HospitalUpdateModelData $hospitalSave, Hospital $item, Hospital|Authenticatable $hospital): Hospital|Model|stdClass
    ;


    public static function validateUpdateData(Request $request, HospitalUpdateModelData $hospitalUpdate, Hospital $item, Hospital|Authenticatable $hospital)
    ;
}
