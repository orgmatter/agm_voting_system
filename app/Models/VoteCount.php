<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoteItem;
use App\Models\Shareholder;

class VoteCount extends Model
{
    use HasFactory;


    protected $fillable = [
        'vote_item_id',
        'shareholder_id',
        'votes',
    ];

    public function vote_item()
    {
        return $this->belongsTo(VoteItem::class);
    }

    public function shareholder()
    {
        return $this->belongsTo(Shareholder::class);
    }
}
