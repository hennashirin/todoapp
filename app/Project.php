<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     protected $guarded=['id'];
     public function getRouteKeyName(){
         return 'slug';
     }

     public function tasks()
    {
        return $this->hasMany('App\Task');
    }
    public function progress()
    {
        $total = $this->tasks->count();
        if($total==0)
        {
            return 0;
        }
        $completed = $this->tasks->filter(function($t){
            return $t->completed;
        })->count();
        return $completed/$total*100;
        
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
  
}
