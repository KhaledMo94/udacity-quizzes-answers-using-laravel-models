<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'region';

    protected $primaryKey = 'id';

    public function salesReps()
    {
        return $this->hasMany(SalesRep::class);
    }
}
