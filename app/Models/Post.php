<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    protected $fillable = [
        'name',
        'photo',
        'category_id',
        'user_id',
        'description'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
