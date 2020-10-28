<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Company;
use App\Models\Admin;
use App\Models\VoteCount;

class Shareholder extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'shareholder';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'units',
        'company_id',
        'isEligible',
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function vote_counts()
    {
        return $this->hasMany(VoteCount::class);
    }
}
