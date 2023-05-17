<?php
 
namespace App\Http\Controllers;
 
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
 
class VideoController extends Controller
{
    public function getVideoUploadForm()
    {
        return view('video-upload');
    }
    public function show($id)
    {
        return view('admincp.video.video-upload');
    }
 
    public function uploadVideo(Request $request)
   {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimetypes:video/mp4',
        ]);
 
        $sourcePath = public_path('uploads/videos');
        $fileName = $request->video->getClientOriginalName();
        $destinationPath = public_path('uploads/videos/' . $fileName);

        File::move($sourcePath, $destinationPath);

        $isFileUploaded = Storage::disk('public')->putFile('uploads/videos', $request->video);
 
        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath);
        // echo $url;
 
        if ($isFileUploaded) {
            $video = new Video();
            $video->title = $request->title;
            $video->path = $filePath;
            $video->save();
 
            return back()
            ->with('success','Video has been successfully uploaded.');
        }
 
        return back()
            ->with('error','Unexpected error occured');
    }
}