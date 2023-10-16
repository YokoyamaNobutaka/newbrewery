<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\comment;
use App\Models\User;
use App\Models\like;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'area',
    'rice',
    'flavor',
    'taste',
    'alcholcontent',
    'match'
    ];/*投稿作成処理モデル*/
    
    public function comments(){
    //投稿は多数のコメントがくる。
    return $this->hasMany(comment::class,"post_id");
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function likes() {
        return $this->hasMany(like::class);
    }
}
