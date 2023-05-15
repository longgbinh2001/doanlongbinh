<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FirebaseController extends Controller
{
    public function uploadVideo(Request $request)
{
    // Kiểm tra xem có tệp được tải lên không
    if ($request->hasFile('video')) {
        // Lưu tệp vào bộ nhớ tạm của máy chủ
        $file = $request->file('video');
        $path = $file->store('videos', 'firebase');

        // Trả về đường dẫn đến tệp được lưu trữ trên Firebase Storage
        $url = Storage::disk('firebase')->url($path);

        return "Video đã được tải lên: " . $url;
    }

    return "Không có tệp nào được tải lên.";
}
}

