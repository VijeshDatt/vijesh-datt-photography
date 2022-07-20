<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
  // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function index()
  {
    $path = public_path('/assets/images/gallery/');
    $subdirectories = File::directories($path);
    $data = array();

    foreach ($subdirectories as $subdir) {
      $files = File::allFiles($subdir);
      $info = array();

      if (sizeof($files) > 0) {
        foreach ($files as $file) {
          // return preg_split("/gallery\//", $file->getPath());
          $folder_name = preg_replace("/-/", ' ', preg_split("/gallery\//", $file->getPath())[1]);
          $folder_path = preg_split("/gallery\\\\/", $file->getPath())[1];
          $info[] = [
            'filename' => $file->getBasename(),
          ];
        }

        $data[] = array('name' => ucwords($folder_name), 'folder' => $folder_path, 'files' => $info);
      }
    }

    return [
      'data' => $data,
    ];
  }

  public function files(Request $request)
  {
    $dir = public_path("/assets/images/gallery/{$request->folder}/");
    $files = \File::allFiles($dir);

    $data = array();
    $count = $request->current > sizeof($files) ? sizeof($files) : $request->current;
    for ($i = 0; $i < $count; $i++) {
      $data[] = array('name' => $files[$i]->getFilename());
    }

    return [
      'files' => $data,
      'max' => sizeof($files),
    ];
  }
}
