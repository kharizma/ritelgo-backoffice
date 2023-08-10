<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Province Model.
 */
class Province extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'provinces';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    /**
     * Province has many regencies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }

    public static function getName($id)
    {
        return Province::select('name')->where('id',$id)->first();
    }
}
