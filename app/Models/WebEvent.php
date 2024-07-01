<?php

namespace App\Models;

use App\Models\Scopes\OccurredAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebEvent extends Model
{
    use HasFactory;

    protected $fillable = ['account_id','occurred_at','channel'];

    protected $table = 'web_events';

    protected $primaryKey = 'id';

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)
        ->using(Account::class)
        ->withPivot(['name','website','latitude','longitude','primary_poc']);
    }

    protected static function booted() : void 
    {
        static::addGlobalScope(OccurredAt::class);
    }
}
