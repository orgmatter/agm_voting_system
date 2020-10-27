<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoteItem;

class VoteCount extends Model
{
    use HasFactory;


    public function vote_item()
    {
        return $this->belongsTo(VoteItem::class);
    }
}
