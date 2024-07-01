<?php

namespace App\Models;

use App\Models\Scopes\OccurredAt;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['account_id','occurred_at','standard_qty','gloss_qty',
    'poster_qty','standard_amt_usd','gloss_amt_usd','poster_amt_qty'];


    public function getTotalAmountAttribute()
    {
        return (int)$this->standard_qty + (int)$this->gloss_qty + (int)$this->poster_qty ;
    }

    public function getTotalUSDAttribute()
    {
        return (float)$this->standard_amt_usd + (float)$this->gloss_amt_usd + (float)$this->poster_amt_usd ;
    }

    public function getUnitPriceStandardAttribute()
    {
        if($this->standard_qty == 0){
            return 'undefined';
        }
        return $this->standard_amt_usd / $this->standard_qty ;
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    // protected static function booted(): void
    // {
    //     static::addGlobalScope(OccurredAt::class);
    // }

    public function scopeEarly(EloquentBuilder $builder)
    {
        $builder->orderBy('occurred_at');
    }

    public function webEvents()
    {
        return $this->belongsToMany(WebEvent::class)
        ->using(Account::class)
        ->withPivot(['name','website','latitude','longitude','primary_poc']);
    }

    protected $appends = ['totalAmount','totalUSD','unitPriceStandard'];
}
