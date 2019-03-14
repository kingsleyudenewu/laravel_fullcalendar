<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'start_date', 'end_date'];

    public function setStartDateAttribute($value){
        $this->attributes['start_date'] = Carbon::createFromFormat('Y-m-d', $value);
    }

    public function setEndtDateAttribute($value){
        $this->attributes['end_date'] = Carbon::createFromFormat('Y-m-d', $value);
    }

//    public function getStartDateAttribute($value)
//    {
//        return Carbon::createFromFormat('Y-m-d', $value)
//            ->format('d-m-Y');
//    }
//    public function getEndDateAttribute($value)
//    {
//        return Carbon::createFromFormat('Y-m-d', $value)
//            ->format('d-m-Y');
//    }
}
