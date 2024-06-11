<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    public function services()
    {
        return $this->belongsToMany(Service::class, 'plan_services');
    }

    public function user() {
        return $this->hasOne(User::class);
    }

    public function planService() {
        return $this->hasOne(PlanService::class);
    }

}
