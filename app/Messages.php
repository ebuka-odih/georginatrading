<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        if ($this->read > 0){
            return "<span class='badge badge-success'>Read</span>";
        }else {
            return "<span class='badge badge-warning'>Unread</span>";
        }
    }
}
