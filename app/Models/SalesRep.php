<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRep extends Model
{
    use HasFactory;

    protected $fillable = ['name','region_id'];

    protected $table = 'sales_reps';

    protected $primaryKey = 'id';

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
