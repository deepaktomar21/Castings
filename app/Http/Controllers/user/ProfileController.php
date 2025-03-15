<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('website.profileEdit', compact('profile'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'stage_name' => 'nullable|string|max:255',
            'contact' => 'required|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'acting_techniques' => 'nullable|string|max:255',
            'theater_experience' => 'nullable|string',
            'visibility' => 'required|in:public,private',
            'reel_video' => 'nullable|mimes:mp4,mov,avi|max:51200',
        ]);

        $videoPath = null;
        if ($request->hasFile('reel_video')) {
            $video = $request->file('reel_video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $videoPath = 'video/reel_video/' . $videoName;

            $video->move(public_path('video/reel_video'), $videoName);
        }

        Profile::create([
            'user_id' => auth()->id(),
            'full_name' => $request->full_name,
            'stage_name' => $request->stage_name,
            'contact' => $request->contact,
            'location' => $request->location,
            'bio' => $request->bio,
            'acting_techniques' => $request->acting_techniques,
            'theater_experience' => $request->theater_experience,
            'visibility' => $request->visibility,
            'reel_video' => $videoPath,
        ]);

        return redirect()->back()->with('success', 'Profile created successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'stage_name' => 'nullable|string|max:255',
            'contact' => 'required|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'acting_techniques' => 'nullable|string|max:255',
            'theater_experience' => 'nullable|string',
            'visibility' => 'required|in:public,private',
            'reel_video' => 'nullable|mimes:mp4,mov,avi|max:51200',
        ]);
    
        $profile = Profile::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }
    
        $profile->user_id = auth()->id();
        $profile->full_name = $request->full_name;
        $profile->stage_name = $request->stage_name;
        $profile->contact = $request->contact;
        $profile->location = $request->location;
        $profile->bio = $request->bio;
        $profile->acting_techniques = $request->acting_techniques;
        $profile->theater_experience = $request->theater_experience;
        $profile->visibility = $request->visibility;
    
        // Handle video upload in public/video/reel_video
        if ($request->hasFile('reel_video')) {
            // Delete old video if exists
            if ($profile->reel_video && file_exists(public_path($profile->reel_video))) {
                unlink(public_path($profile->reel_video));
            }
    
            // Upload new video
            $video = $request->file('reel_video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $videoPath = 'video/reel_video/' . $videoName;
    
            // Move file to public/video/reel_video/
            $video->move(public_path('video/reel_video'), $videoName);
    
            // Save new path in the database
            $profile->reel_video = $videoPath;
        }
    
        $profile->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
   
}
