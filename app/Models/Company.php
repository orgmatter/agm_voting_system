<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shareholder;

class Company extends Model
{
    use HasFactory;

    public function shareholders() {
        return $this->hasMany(Shareholder::class);
    }

    public function vote_items() {
        return $this->hasMany(VoteItem::class);
    }
}
