<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class FirebaseController extends Controller
{

    public function store(Request $request)
    { 
        return redirect()->back();
    }
     public function create()
    {
        
        return view('admincp.firebase.form');
    }
    public function uploadVideo(Request $request)
    {
        if ($request->hasFile('video')) {
            $video = $request->file('video');

            $storage = FirebaseStorage::storage();
            $bucket = $storage->getBucket();
            $file = fopen($video->getRealPath(), 'r');
            $bucket->upload($file, [
                'name' => 'videos/' . $video->getClientOriginalName()
            ]);

            // Additional processing...

            return response()->json(['message' => 'Video uploaded successfully.'], 200);
        } else {
            return response()->json(['message' => 'No video file found.'], 400);
        }
    }
}


   


