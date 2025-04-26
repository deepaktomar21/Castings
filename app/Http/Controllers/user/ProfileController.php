<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'stage_name'        => 'nullable|string|max:255',
            'email'             => 'nullable|email|max:255',
            'professional_title' => 'nullable|string|max:255',
            'phone'             => 'nullable|string|max:20',
            'location'          => 'nullable|string|max:255',
            'gender'            => 'nullable|string|max:50',
            'age'               => 'nullable|integer|min:0',
            'date_of_birth'     => 'nullable|date',
            'height_feet'       => 'nullable|integer|min:0',
            'height_inches'     => 'nullable|integer|min:0|max:11',
            'weight'            => 'nullable|numeric|min:0',
            'body_type'         => 'nullable|string|max:255',
            'hair_color'        => 'nullable|string|max:255',
            'eye_color'         => 'nullable|string|max:255',
            // 'city_id'           => 'nullable|integer|exists:cities,id',
            'postal_code'       => 'nullable|string|max:20',

            'bio'               => 'nullable',

            'social_medias'     => 'nullable|url', //Instagram
            'website'           => 'nullable|url', //linkedin
            'other_links'       => 'nullable|url',
            'additional_notes'  => 'nullable|string',
            'acting_techniques' => 'nullable|string',
            'special_skills'    => 'nullable|string',
            'languages'         => 'nullable|string',
            'accents'           => 'nullable|string',
            'dialects'          => 'nullable|string',
            'other_skills'      => 'nullable|string',
            'theater_experience' => 'nullable|string',
            'film_experience'   => 'nullable|string',
            'training'          => 'nullable|string',

            'reel_video'        => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg|max:51200',
            'resume'            => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'photos.*'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',

            'visibility'        => 'nullable|in:public,private',
        ]);

        // Manually assign each validated field
        $profile->stage_name = $request->stage_name;
        $profile->email = $request->email;
        $profile->professional_title = $request->professional_title;
        $profile->phone = $request->phone;
        $profile->location = $request->location;
        $profile->gender = $request->gender;
        $profile->age = $request->age;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->height_feet = $request->height_feet;
        $profile->height_inches = $request->height_inches;
        $profile->weight = $request->weight;
        $profile->body_type = $request->body_type;
        $profile->hair_color = $request->hair_color;
        $profile->eye_color = $request->eye_color;
        // $profile->city_id = $request->city_id;
        $profile->postal_code = $request->postal_code;

        $profile->bio = $request->bio;


        $profile->social_medias = $request->social_medias;
        $profile->website = $request->website;
        $profile->other_links = $request->other_links;
        $profile->additional_notes = $request->additional_notes;
        $profile->acting_techniques = $request->acting_techniques;
        $profile->special_skills = $request->special_skills;
        $profile->languages = $request->languages;
        $profile->accents = $request->accents;
        $profile->dialects = $request->dialects;
        $profile->other_skills = $request->other_skills;
        $profile->theater_experience = $request->theater_experience;
        $profile->film_experience = $request->film_experience;
        $profile->training = $request->training;

        // Handle reel video
        if ($request->hasFile('reel_video')) {
            if ($profile->reel_video && file_exists(public_path($profile->reel_video))) {
                unlink(public_path($profile->reel_video));
            }
            $video = $request->file('reel_video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $videoPath = 'video/reel_video/' . $videoName;
            $video->move(public_path('video/reel_video'), $videoName);
            $profile->reel_video = $videoPath;
        }

        // Handle resume
        if ($request->hasFile('resume')) {
            if ($profile->resume && file_exists(public_path($profile->resume))) {
                unlink(public_path($profile->resume));
            }
            $resume = $request->file('resume');
            $resumeName = time() . '.' . $resume->getClientOriginalExtension();
            $resumePath = 'files/resumes/' . $resumeName;
            $resume->move(public_path('files/resumes'), $resumeName);
            $profile->resume = $resumePath;
        }

        // Handle photos (multiple uploads to public/photos)
        if ($request->hasFile('photos')) {
            $photoPaths = [];
            foreach ($request->file('photos') as $photo) {
                $photoName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('photos'), $photoName);
                $photoPaths[] = 'photos/' . $photoName;
            }
            $profile->photos = json_encode($photoPaths);
        }

        $profile->visibility = $request->visibility;

        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    public function removePhoto(Request $request)
    {
        $user = auth()->user(); // Or fetch user by ID
        $photoToRemove = $request->photo;

        $photos = json_decode($user->photos ?? '[]');
        $updatedPhotos = array_filter($photos, fn($photo) => $photo !== $photoToRemove);

        if (file_exists(public_path($photoToRemove))) {
            unlink(public_path($photoToRemove));
        }

        $user->photos = json_encode(array_values($updatedPhotos));
        $user->save();

        return response()->json(['success' => true]);
    }

    public function show($name)
    {
        // Fetch the talent by the name (ensure uniqueness or use a slug)
        $talent = User::where('name', $name)->with('city')->firstOrFail();
    
        // Decode the photos if stored as JSON string
        if (is_string($talent->photos)) {
            $talent->photos = json_decode($talent->photos);
        }
    
        return view('website.talent_show_data', compact('talent'));
    }
    
}
