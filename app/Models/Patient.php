<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{

    use SoftDeletes;

    const CREATED_AT = 'createdAt';

    const UPDATED_AT = 'updatedAt';

    const DELETED_AT = 'deletedAt';

    protected $guarded = [];

    protected $table = 'patients';

    public $timestamps = true;

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital',  'hospitalId', 'id');
    }
}
