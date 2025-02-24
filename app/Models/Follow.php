<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
    'following_id', 'followed_id'];

public function followingIds(Int $user_id)
    {
    return $this->where('following_id', $user_id)->get();
    }
}
