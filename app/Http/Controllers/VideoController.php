<?php
 
namespace App\Http\Controllers;
 
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Movie;
use App\Models\Episode;
use Carbon\Carbon;

 
class VideoController extends Controller
{
    
    public function getVideoUploadForm()
    {
        $list_movie = Movie::orderBy('id','DESC')->pluck('title','id');
        return view('admincp.video.video-upload',compact('list_movie'));
    }
    public function show($id)
    {
        return view('admincp.video.video-upload');
    }
 
    public function uploadVideo(Request $request)
   {
        // $this->validate($request, [
        //     'title' => 'required|string|max:255',
        //     'video' => 'required|file|mimetypes:video/mp4',
        // ]);

        
        // $sourcePath = public_path().'uploads/videos';
        // $fileName = $request->video->getClientOriginalName();
        // $destinationPath = public_path().'uploads/videos/' . $fileName;

        // File::move($sourcePath, $destinationPath);


            $file = $request->file('video');
            $success = false;
            if($file){
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/videos/';
            $file->move($path, $filename);
            $filepath = '/uploads/videos/'.$filename;
            $success = true;
            }

        // $isFileUploaded = Storage::disk('public')->putFile('uploads/videos', $request->video);
 
        // // File URL to access the video in frontend
        // $url = Storage::disk('public')->url($filePath);
        // // echo $url;
 
        if ($success) {
            $data = $request->all();
            $ep = new Episode();
            $ep->movie_id = $data['movie_id'];
            $ep->linkphim = $filepath;
            $ep->episode = $data['episode'] ?? null;
            $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');  
            $ep->videotype = 'upload';
            $ep->save();

            return redirect()->back();
        }
 
        return back()
            ->with('error','Unexpected error occured');
    }
}