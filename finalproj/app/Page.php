<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_name', 'page_alias', 'page_desc'
    ];

    /**
     * Get the user name that created or modified the comment.
     * Based on design id public function creator()
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
    }ea by Nick and Devon
     */
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
}
