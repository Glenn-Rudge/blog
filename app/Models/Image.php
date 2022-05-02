<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ["path", "post_id"];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function url()
    {
        return Storage::url($this->path);
    }
}
