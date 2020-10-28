<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Shareholder;
use App\Models\VoteItem;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function shareholders()
    {
        return $this->hasMany(Shareholder::class);
    }

    public function vote_items()
    {
        return $this->hasMany(VoteItem::class);
    }
}
