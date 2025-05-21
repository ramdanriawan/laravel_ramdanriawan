<?php

namespace App\Services\ServiceImpl\Hospital;

use App\ModelData\HospitalSaveModelData;
use App\ModelData\HospitalUpdateModelData;
use App\Services\Hospital\HospitalService;
use Carbon\Carbon;


use App\Models\Hospital;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class HospitalServiceImpl implements HospitalService
{
    private static $collectionId = "hospitals";

    private static $withRelations = [];
    private static $withCount = [];
    public static $columnOrder = [
        'id',
        'hospitalName',
        'address',
        'email',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function findAll($length, $start, $columnToSearch, $search, $columnOrderName, $columnOrderDir, Model|Authenticatable $hospital)
    {
        if (empty($search) && !$start) {

            $data = Hospital::limit($length);
        } else {

            $data = Hospital::limit($length)->offset($start);
        }

        $data->with(self::$withRelations);
        $data->withCount(self::$withCount);

        $data->where($columnToSearch, 'like', '%' . $search . '%');

        $data->orderBy(self::$columnOrder[$columnOrderName] ?? $columnOrderName, $columnOrderDir);

        $data = $data->get();

        foreach ($data as $item) {
            $item = self::addAttributes($item, $hospital);
        }

        return $data;
    }


    // parameter hospital belum saya pakai
    static function addAttributes(Hospital|Builder|Model|array $item, Hospital|Authenticatable|Model $hospital): Hospital|Model|stdClass
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


    public static function delete(Hospital $hospital)
    {
        DB::transaction(function () use ($hospital) {

            $hospital->delete();
        });
    }


    /**
     * @param Request $request
     * @param HospitalSaveModelData $hospitalSave
     * @param Hospital|Authenticatable $hospital
     * @return Hospital|Model|stdClass
     */
    public static function save(Request $request, HospitalSaveModelData $hospitalSave, Hospital|Authenticatable $hospital): Hospital|Model|stdClass
    {

        $item = null;
        DB::transaction(function () use ($request, $hospitalSave, $hospital, &$item) {
            self::validateSaveData($request, $hospitalSave, $hospital);

            $dataToSave = [
                'hospitalName' => $hospitalSave->getHospitalName(),
                'address' => $hospitalSave->getAddress(),
                'email' => $hospitalSave->getEmail(),
                'phone' => $hospitalSave->getPhone(),
            ];

            $item = Hospital::create($dataToSave);

            $item = self::findOne($item->id, $item);
        });

        return $item;
    }

    public static function findOne($id, Model|Authenticatable $hospital)
    {

        $data = Hospital::with(self::$withRelations)->where(['id' => $id])->withCount(self::$withCount);

        $data = self::addAttributes($data->first()->toArray(), $hospital);

        return $data;
    }


    public static function validateSaveData(Request $request, HospitalSaveModelData $hospitalSave, Hospital|Authenticatable $hospital)
    {
        $request->validate([
            'hospitalName' => 'required|unique:hospitals,hospitalName|string',
            'address' => 'required|unique:hospitals,address',
            'email' => 'required|unique:hospitals,email',
            'phone' => 'required|unique:hospitals,phone',
        ]);
    }


    /**
     * @param Request $request
     * @param HospitalUpdateModelData $hospitalSave
     * @param Hospital $item
     * @param Hospital|Authenticatable $hospital
     * @return Hospital|Model|stdClass
     */
    public static function update(Request $request, HospitalUpdateModelData $hospitalSave, Hospital $item, Hospital|Authenticatable $hospital): Hospital|Model|stdClass
    {
        DB::transaction(function () use ($request, $hospitalSave, $hospital, &$item) {
            self::validateUpdateData($request, $hospitalSave, $item, $hospital);

            $dataToSave = [
                'hospitalName' => $hospitalSave->getHospitalName(),
                'address' => $hospitalSave->getAddress(),
                'email' => $hospitalSave->getEmail(),
                'phone' => $hospitalSave->getPhone(),
            ];

            $item->update($dataToSave);

            $item = self::findOne($item->id, $item);
        });

        return $item;
    }


    public static function validateUpdateData(Request $request, HospitalUpdateModelData $hospitalUpdate, Hospital $item, Hospital|Authenticatable $hospital)
    {
        $request->validate([
            'hospitalName' => "required|unique:hospitals,hospitalName,{$hospitalUpdate->getHospitalName()},hospitalName|string",
            'address' => "required|unique:hospitals,address,{$hospitalUpdate->getAddress()},address|string",
            'email' => "required|unique:hospitals,email,{$hospitalUpdate->getEmail()},email|string",
            'phone' => "required|unique:hospitals,phone,{$hospitalUpdate->getPhone()},phone|string",
        ]);
    }

}
