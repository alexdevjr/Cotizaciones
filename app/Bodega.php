<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bodega extends Model
{   
    use SoftDeletes;

    protected $fillable =[
        'nombre',
        'stock',
        'descripcion'
    ];
    public function children()
    {
    return $this->hasMany(Folder::class,'folder_id','id');
    }

    public function parent()
    {
    return $this->belongsTo(Folder::class,'id','folder_id');
    }
}
