<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public static function getDetailById(int $id)
    {
        return self::findOrFail($id);
    }
}
