<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
        'active',
        'user_id'
    ];

    protected $appends = [
        'editable',
        'studied'
    ];

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getEditableAttribute()
    {
        $user = Auth::guard('api')->user();
        return $this->user->id === $user->id || $user->hasRole('admin');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getStudiedAttribute()
    {
        return Auth::guard('api')->user()->courses()->pluck('id')->contains($this->id);
    }
}
