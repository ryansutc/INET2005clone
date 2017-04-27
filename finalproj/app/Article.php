<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'art_name', 'art_title', 'art_desc', 'all_pages',
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

    public function contentType()
    {
        return $this->hasOne('App\ContentArea', 'id', 'cont_id');
    }
}
