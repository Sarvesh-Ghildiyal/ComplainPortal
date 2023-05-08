<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complain extends Model
{
    use HasFactory;

    //fillable attributes
    protected $fillable=[
        'department', 'room_no', 'reported_by', 'requested_by', 'description',
    ];

    //relationship with user model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
