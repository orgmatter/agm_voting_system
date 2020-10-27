<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoteCount;

class VoteItem extends Model
{
    use HasFactory;

    public function company() {
        return $this->belongsTo(Comapny::class);
    }

    public function vote_count()
    {
        return $this->hasMany(VoteCount::class);
    }
}
