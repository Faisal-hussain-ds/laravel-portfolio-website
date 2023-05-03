<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class InternshipRequest extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function supervisor()
    {
        return $this->hasOne(User::class,'id','assign_to');
    }
    public function head()
    {
        return $this->hasOne(User::class,'id','checked_by');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
