<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteItem extends Model
{
    use HasFactory, Notifiable;

    public function company() {
        return $this->belongsTo(Comapny::class);
    }
}
