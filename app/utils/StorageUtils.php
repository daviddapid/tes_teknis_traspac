<?php

namespace App\Utils;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageUtils
{
   static function saveFile(Request $request, string $foldername): string
   {
      return '/storage/' . $request->file('foto')->store($foldername);
   }
   static function deleteFile(string $filepath)
   {
      Storage::delete(str_replace('/storage/', '', $filepath));
   }
}
