<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    /** @use HasFactory<\Database\Factories\FolderFactory> */
    use HasFactory;

    protected $fillable = ['name','parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Folder::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Folder::class,'parent_id');
    }

    public function getCreatedAtFarsiAttribute()
    {
        return (new Verta($this->created_at))->format('D, d M Y - h:i a');
    }

    public function getUpdatedAtFarsiAttribute()
    {
        return (new Verta($this->updated_at))->formatDifference();
    }
}
