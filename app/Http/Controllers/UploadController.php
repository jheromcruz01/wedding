<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Services\DriveAPIService;

class UploadController extends Controller
{
    protected $driveService;

    public function __construct(DriveAPIService $driveService)
    {
        $this->driveService = $driveService;
    }

    public function index()
    {
        $photos = Photo::latest()->take(12)->get();
        return view('gallery', compact('photos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:5120',
        ]);

        $file = $request->file('photo');
        $originalName = $file->getClientOriginalName();
        $tempPath = $file->store('temp');
        $fullPath = storage_path('app/' . $tempPath);

        // Upload to Google Drive
        $driveResult = $this->driveService->uploadFileToDrive($fullPath);

        if (!$driveResult) {
            @unlink($fullPath);
            return back()->withErrors('Failed to upload to Google Drive.');
        }

        // Make file public
        $isPublic = $this->driveService->makeFilePublic($driveResult['id']);
        
        if (!$isPublic) {
            \Log::warning('DriveAPI: Could not make file public, but continuing - ' . $driveResult['id']);
        }

        // Save to database
        Photo::create([
            'user_id' => auth()->id(),
            'original_name' => $originalName,
            'drive_id' => $driveResult['id'],
            'drive_link' => $driveResult['link'],
            'mime' => $file->getClientMimeType(),
        ]);

        @unlink($fullPath);

        return back()->with('success', 'Photo uploaded successfully!');
    }
}
