<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'userinfo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'company_id',
        'userinfo_name',
        'userinfo_address',
        'userinfo_phonenumber'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
