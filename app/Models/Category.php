<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function allChildrenIds()
    {
        $ids = collect([$this->id]);

        foreach ($this->children as $child) {
            $ids = $ids->merge($child->allChildrenIds());
        }

        return $ids;
    }

    protected static function booted()
    {
        static::deleting(function ($category) {

            foreach ($category->ads as $ad) {
                if ($ad->image_path) {
                    Storage::disk('public')->delete($ad->image_path);
                }
            }

        });
    }
}
