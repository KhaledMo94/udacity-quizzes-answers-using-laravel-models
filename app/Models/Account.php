<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['name','website','latitude','longitude','primary_poc','sales_rep_id'];

    protected $table = 'accounts';

    protected $primaryKey = 'id';

    public function salesRep()
    {
        return $this->belongsTo(SalesRep::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function webEvents()
    {
        return $this->hasMany(WebEvent::class);
    }

    
}
