<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use app\Models\user;
use App\Models\Doctor;
class UserDetails extends Model
{
    use HasFactory;

    // these are fillable input
    protected $fillable =[
        'user_id',
        'bio_data',
        'status',
    ];

    // state this is belong to user table

    public function user(){
        return $this->belongsTo(User::class);
    }
}
