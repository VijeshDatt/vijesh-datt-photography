<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
  // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function index()
  {
    $path = public_path('/assets/images/home');
    $allFiles = File::allFiles($path);
    $files = array();
    foreach ($allFiles as $file) {
      [$width, $height] = getimagesize($file);
      $files[] = array('filename' => $file->getFilename(), 'width' => $width, 'height' => $height);
    }

    return [
      'data' => collect($files)->shuffle(),
    ];
  }

  public function gallery()
  {
    $path = public_path('/assets/images/gallery/');
    $subdirectories = File::directories($path);
    $data = array();

    foreach ($subdirectories as $subdir) {
      try {
        $folder_name = preg_replace("/-/", ' ', preg_split("/gallery\//", $subdir)[1]);
        $folder_path = preg_split("/gallery\//", $subdir)[1];
      } catch (\Throwable $th) {
        $folder_name = preg_replace("/-/", ' ', preg_split("/gallery\\\\/", $subdir)[1]);
        $folder_path = preg_split("/gallery\\\\/", $subdir)[1];
      }

      $data[] = array('name' => ucwords($folder_name), 'folder' => $folder_path);
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
    // $count = sizeof($files);
    for ($i = 0; $i < $count; $i++) {
      $data[] = array('name' => $files[$i]->getFilename());
    }

    return [
      'files' => $data,
      'max' => sizeof($files),
    ];
  }

  public function email(Request $request)
  {
    $data = (object)[
      'name' => $request->name,
      'phone' => $request->phone,
      'email' => $request->email,
      'subject' => $request->subject,
      'message' => $request->message,
    ];

    try {
      Mail::send(new ContactForm($data));

      return response("Email sent successfully", 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
