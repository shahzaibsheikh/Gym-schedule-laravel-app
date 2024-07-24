<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScheduledClass extends Model
{
    use HasFactory;

    protected $guarded = null;
    protected $primaryKey = 'sc_id';

    protected $casts = [
      'date_time' =>'datetime'
    ];

    public function instructor(){
     return $this->belongsTo(User::class,'instructor_id');
    }

    public function classType(){
        return $this->belongsTo(classType::class,'class_type_id','ct_id');
       }

    public function members(){
      return $this->belongsToMany(User::class,'bookings','scheduled_class_sc_id');
    } 
    
    public function scopeUpComing(Builder $query){
     return  $query->where('date_time','>',now());
    }

    public function scopeNotBooked(Builder $query){
      return  $query->whereDoesntHave('members',function($query){
        $query->where('user_id',auth()->user()->id);
      });
     }
}
