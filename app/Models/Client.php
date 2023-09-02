<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';
    protected $guarded=false;

    use HasFactory;

    public function avatar()
    {
        return $this->morphOne(Avatar::class,'avatarable');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class,'reviewable');
    }


}
