<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Company;

class Shareholder extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'shareholder';

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
