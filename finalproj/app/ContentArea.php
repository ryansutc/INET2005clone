<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentArea extends Model
{
    protected $fillable = [
        'cont_name', 'cont_alias', 'cont_desc', 'disp_order',
        'page_id', 'cont_id', 'art_text'
    ];

    //this code copy/pasted from page model. DUPLICATE>[todo] fix
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
