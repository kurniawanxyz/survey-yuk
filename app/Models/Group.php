<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $guarded =[

    ];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class,'user_groups');
    }

    public function kreator()
    {
        return $this->belongsTo(User::class,'kreator_id');
    }

    public function surveis():BelongsToMany
    {
        return $this->belongsToMany(Survei::class,"user_groups");
    }

    public function pengerjaan()
    {
        return $this->hasMany(Pengerjaan::class);
    }

}
