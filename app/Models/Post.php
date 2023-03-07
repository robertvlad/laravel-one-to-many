<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\Type;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'type_id'];

    use HasFactory;

    public static function generateSlug($title) {

        return Str::slug($title, '-');
    }

    public function type(){

        return $this->belongsTo(Type::class);
    }
}
