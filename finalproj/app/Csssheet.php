<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csssheet extends Model{
    protected $fillable = [
        'css_name', 'css_desc', 'css_state', 'css_text'
    ];

    public function creator()
    {
        //User::with('posts')->get();
        //return $this->belongsTo('App\User', 'user_id', 'created_by');
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function updater()
    {
        //User::with('posts')->get();
        //return $this->belongsTo('App\User', 'user_id', 'created_by');
        return $this->hasOne('App\User', 'id', 'updated_by');
    }

    public static function active($id)
    {
        //make a certain sheet active and all others inactive

        foreach (Csssheet::all() as $css){
            if($css->id == $id){
                $css->css_state = 1;
                $css->save();
            }
            else {
                $css->css_state = 0;
                $css->save();
            }
        }
    }
}