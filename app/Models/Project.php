<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type_id',
        'slug',
        'description',
        'repository_link',
        'languages',
        'softwares',
        'authors',
        'img'
    ];
    
    protected $appends = ['img_full_path'];

    protected function imgFullPath(): Attribute
    {
        return new Attribute(
            get: fn () =>
            $this->img ? asset('storage/' . $this->img) : null
        );
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
