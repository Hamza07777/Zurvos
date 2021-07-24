<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packages_user extends Model
{
    public function packages_user_packges()
    {
        return $this->belongsTo(packages::class,'package_id');
    }
}
