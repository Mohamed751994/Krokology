<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait AttachmentTrait
{
    /**************Upload File Trait*****************/
    public function uploadRequestFile($model, $request, $file_input_name)
    {
        $file_name = Str::random(20).md5(microtime()).'.'.$request->file($file_input_name)->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($model, $request->file($file_input_name), $file_name);
        return "{$model}/".$file_name;
    }
    /**************End Upload File Trait*****************/

    /**************Get FullPath of File Trait*****************/
    public function getFileUrl($value)
    {
        return url(Storage::disk('public')->url($value));
    }
    /**************End FullPath of File Trait*****************/

}

