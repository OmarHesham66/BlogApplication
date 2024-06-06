<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadFile
{
      public function UploadFile($file, $folder)
      {
            $name_file = $file->getClientOriginalName();
            $new_name = date('Hmi') . "_" . $name_file;
            $file->storeAs($folder, $new_name);
            return "$folder/$new_name";
      }
      public function update_file(Request $request, $file, $folder)
      {
            if ($request->hasFile('media')) {
                  if (!Storage::exists($file)) {
                        Storage::delete($file);
                        return $this->UploadFile($request->file('media'), $folder);
                  }
                  return $this->UploadFile($request->file('media'), $folder);
            }
      }
}
