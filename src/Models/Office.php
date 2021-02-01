<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['id','name','city_id'];
    public function callerInfo()
    {
        return $this->belongsTo(City::class);
    }
}