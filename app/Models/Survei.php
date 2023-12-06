<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Survei extends Model
{
    use HasFactory;

    protected $guarded=[

    ];

    public function kreator():BelongsTo
    {
        return $this->belongsTo(User::class,'kreator_id');
    }

}
