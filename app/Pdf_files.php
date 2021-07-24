<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf_files extends Model
{
	protected $fillable = ["pdf_file"];
    public function getPdfFileAttribute($value)
    {
        return asset('public/resources/').'/'.$value;
    }
}
