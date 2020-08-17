<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'parent_id', 'order'];

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function tree()
    {
        return $this->children()->with('tree');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($category) {
            foreach ($category->children()->get() as $child) {
                $child->delete();
            }
        });
    }
}
