<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded=['id'];
    protected $dates = ['completion_date'];
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
     public function getRouteKeyName(){
         return 'slug';
     }
     public function user()
     {
         return $this->belongsTo('App\User');
     }
     public function assignee()
     {
         return $this->belongsTo('App\User');
     }
     
}
