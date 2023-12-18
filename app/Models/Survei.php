<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survei extends Model
{
    use HasFactory;

    protected $guarded=[

    ];

    public function kreator():BelongsTo
    {
        return $this->belongsTo(User::class,'kreator_id');
    }

    public function pertanyaan():HasMany
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function groups():BelongsToMany
    {
        return $this->belongsToMany(Group::class,"survei_groups");
    }

    public function pengerjaan()
    {
        return $this->hasMany(Pengerjaan::class);
    }

}
