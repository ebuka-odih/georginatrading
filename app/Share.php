<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Share extends Model
{
    protected $guarded = [];

//    public function getReferenceAttribute()
//    {
//        $this->reference =  (string) Str::uuid();
//        if (strlen( $this->reference) >= 15) {
//            return substr($this->reference, 0, 10). "#" . substr( $this->reference, -5);
//        }
//        else {
//           return "#".$this->reference;
//        }
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
