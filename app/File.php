<?php

namespace App;

use App\Helpers\HumanReadable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    protected $fillable = ['material_id', 'filename', 'path'];


    public function size()
    {
        return HumanReadable::bytesToHuman(Storage::size($this->path));
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
