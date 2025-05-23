<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Highlight;

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

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('website.profileEdit', compact('user'));
    }

    //TalentPersonalUpdate

    public function TalentPersonalUpdate(Request $request, $id)
    {

        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'stage_name'        => 'nullable|string|max:255',
            'pronoun'  => 'nullable|string',
            'professional_title' => 'nullable|string|max:255',
            'city_id'          => 'nullable|string|max:255',
            'gender'            => 'nullable|string',
            'visibility'        => 'nullable|in:public,private',
        ]);
        // dd($request->all());


        $profile->stage_name = $request->stage_name;
        $profile->pronoun = $request->pronoun;
        $profile->professional_title = $request->professional_title;
        $profile->gender = $request->gender;
        $profile->city_id = $request->city_id;
        $profile->visibility = $request->visibility;
        // dd($profile);
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function TalentBasicUpdate(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'email'             => 'nullable|email|max:255',
            'name'             => 'nullable|string|max:255',
            'last_name'          => 'nullable|string|max:255',

        ]);
        // dd($request->all());
        // Manually assign each validated field
        $profile->email = $request->email;
        $profile->name = $request->name;
        $profile->last_name = $request->last_name;


        // dd($profile);
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function TalentMyDetailUpdate(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'organization'             => 'nullable|string',
            'jobTitle'          => 'nullable|string',
            'accountSettingsCompanyName'               => 'nullable|string',
            'accountSettingsCompanyWebsite'     => 'nullable|string',
            'accountSettingsprofessionalLink'       => 'nullable|string',
            'phone'     => 'nullable|string',

        ]);
        // dd($request->all());
        // Manually 
        $profile->organization = $request->organization;
        $profile->jobTitle = $request->jobTitle;
        $profile->accountSettingsCompanyName = $request->accountSettingsCompanyName;
        $profile->accountSettingsCompanyWebsite = $request->accountSettingsCompanyWebsite;
        $profile->accountSettingsprofessionalLink = $request->accountSettingsprofessionalLink;
        $profile->phone = $request->phone;
        // dd($profile);
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function TalentBioUpdate(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'bio' => 'nullable|string|max:500',
        ]);

        $profile->bio = $request->bio;
        $profile->save();

        return redirect()->back()->with('success', 'Bio updated successfully!');
    }

    public function TalentAppearanceUpdate(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'min_age'           => 'nullable|integer|min:0',
            'max_age'           => 'nullable|integer|min:0',
            'ethnicity'         => 'nullable|string|max:255',
            'height_feet'       => 'nullable|integer|min:0',
            'height_inches'     => 'nullable|integer|min:0|max:11',
            'weight'            => 'nullable|numeric|min:0',
            'body_type'         => 'nullable|string|max:255',
            'hair_color'        => 'nullable|string|max:255',
            'eye_color'         => 'nullable|string|max:255',
        ]);
        // dd($request->all());
        // Manually assign each validated field
        $profile->min_age = $request->min_age;
        $profile->max_age = $request->max_age;
        $profile->ethnicity = $request->ethnicity;
        $profile->height_feet = $request->height_feet;
        $profile->height_inches = $request->height_inches;
        $profile->weight = $request->weight;
        $profile->body_type = $request->body_type;
        $profile->hair_color = $request->hair_color;
        $profile->eye_color = $request->eye_color;
        // dd($profile);
        $profile->save();
        return redirect()->back()->with('success', 'Appearance updated successfully!');
    }

    public function TalentSocialUpdate(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'instagram'     => 'nullable|url', //Instagram
            'linkedin'     => 'nullable|url', //LinkedIn
            'youtube'     => 'nullable|url', //YouTube
            'facebook'     => 'nullable|url', //Facebook
            'imdb'         => 'nullable|url', //IMDB
            'other_url'       => 'nullable|url',
        ]);
        // dd($request->all());
        // Manually assign each validated field
        $profile->instagram = $request->instagram;
        $profile->linkedin = $request->linkedin;
        $profile->youtube = $request->youtube;
        $profile->facebook = $request->facebook;
        $profile->imdb = $request->imdb;
        $profile->other_url = $request->other_url;
        // dd($profile);
        $profile->save();
        return redirect()->back()->with('success', 'Social updated successfully!');
    }

    public function TalentRepresentativeUpdate(Request $request, $id)
    {
        $request->validate([
            'representative_type' => 'required',
            'representative_name' => 'required|string|max:255',
            'representative_email' => 'required|email',
            'representative_phone_number' => 'required|string|max:20',
            'representative_company_name' => 'nullable|string|max:255',
            'representative_website' => 'nullable|url',
            'representative_address1' => 'nullable|string|max:255',
            'representative_address2' => 'nullable|string|max:255',
            'representative_city' => 'nullable|string|max:255',
            'representative_state' => 'nullable|string|max:255',
            'representative_zip' => 'nullable|string|max:20',
            'representative_country' => 'nullable|string|max:255',


        ]);
        // dd($request->all());

        $profile = User::findOrFail($id);

        $profile->representative_type = $request->representative_type;
        $profile->representative_name = $request->representative_name;
        $profile->representative_company_name = $request->representative_company_name;
        $profile->representative_phone_number = $request->representative_phone_number;
        $profile->representative_email = $request->representative_email;
        $profile->representative_website = $request->representative_website;
        $profile->representative_address1 = $request->representative_address1;
        $profile->representative_address2 = $request->representative_address2;
        $profile->representative_city = $request->representative_city;
        $profile->representative_state = $request->representative_state;
        $profile->representative_zip = $request->representative_zip;
        $profile->representative_country = $request->representative_country;
        // dd($profile);

        $profile->save();

        return redirect()->back()->with('success', 'Representation details updated successfully.');
    }

    public function TalentCreditUpdate(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'credit_productionType' => 'required|string|max:255',
            'credit_project_name' => 'required|string|max:255',
            'credit_role' => 'required|string|max:255',
            'credit_year' => 'required|integer|min:1900|max:' . date('Y'),
            'credit_director_production' => 'nullable|string|max:255',
            'credit_location' => 'nullable|string|max:255',
            'credit_month' => 'nullable|string|max:255',
            'credit_website' => 'nullable|string|max:255'


        ]);

        // Manually assign each validated field      
        $profile->credit_productionType = $request->credit_productionType;
        $profile->credit_project_name = $request->credit_project_name;
        $profile->credit_role = $request->credit_role;
        $profile->credit_year = $request->credit_year;
        $profile->credit_director_production = $request->credit_director_production;
        $profile->credit_location = $request->credit_location;
        $profile->credit_month = $request->credit_month;
        $profile->credit_website = $request->credit_website;
        $profile->save();

        return redirect()->back()->with('success', 'Credits updated successfully!');
    }

    public function TalentSkillsUpdate(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'skills' => 'nullable|string|max:255',
        ]);

        $profile->skills = $request->skills;
        $profile->save();

        return redirect()->back()->with('success', 'Skills updated successfully!');
    }

    public function TalentEducationUpdate(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'school' => 'nullable|string|max:255',
            'degree' => 'nullable|string|max:255',
            'passout_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'institute_location' => 'nullable|string|max:255',
            'instructor' => 'nullable|string|max:255',
        ]);
        // dd($request->all());

        // Manually assign each validated field
        $profile->school = $request->school;
        $profile->degree = $request->degree;
        $profile->passout_year = $request->passout_year;
        $profile->institute_location = $request->institute_location;
        $profile->instructor = $request->instructor;
        $profile->save();

        return redirect()->back()->with('success', 'Education updated successfully!');
    }

    public function TalentSelfRecordingUpdate(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        $validated = $request->validate([
            'selfrecording_description' => 'nullable|string|max:255',
        ]);

        $profile->selfrecording_description = $request->selfrecording_description;
        $profile->save();

        return redirect()->back()->with('success', 'Self-recording updated successfully!');
    }

    public function upload(Request $request, $id)
    {
        $profile = User::find($id);

        if (!$profile) {
            return response()->json(['error' => 'Profile not found.'], 404);
        }

        // Validate single file
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240', // max 10MB
        ]);


        // Remove old resume if exists
        if ($profile->file && file_exists(public_path($profile->file))) {
            unlink(public_path(path: $profile->file));
        }

        // Upload new file
        $file = $request->file('file');
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = 'files/' . $fileName;
        $file->move(public_path('files'), $fileName);

        // Save to profile
        $profile->file = $filePath;
        // dd($profile);
        $profile->save();

        return redirect()->back()->with('success', 'Document uploaded successfully!');
    }


    public function updateDocuments(Request $request, $id)
    {
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        // Store selected documents
        $selectedDocs = $request->input('documents', []); // array
        $profile->documents = implode(',', $selectedDocs); // Save as CSV or store in JSON/array if using cast
        // dd($profile->documents);
        $profile->save();

        return redirect()->back()->with('success', 'Documents updated successfully.');
    }


    public function saveCareerHighlights(Request $request, $id)
    {
        $request->validate([
            'highlights' => 'required|string|max:2000',
            'dont_show_date' => 'nullable',
        ]);

        // dd($request->all());
        $profile = User::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        // dd($profile);
        $highlight = new Highlight();
        $highlight->user_id = $id;
        $highlight->highlights = $request->input('highlights');
        $highlight->dont_show_date = $request->has('dont_show_date'); // Checkbox handling
        // dd($highlight);
        $highlight->save();

        return redirect()->back()->with('success', 'Career highlight saved successfully.');
    }

   public function headshotUpdate(Request $request, $id)
{
    $profile = User::findOrFail($id);

    $validated = $request->validate([
        'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
    ]);

    // dd($request->all());

    if ($request->hasFile('photos')) {
        $photoPaths = [];
        foreach ($request->file('photos') as $photo) {
            $photoName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $photoName);
            $photoPaths[] = 'photos/' . $photoName;
        }
        $profile->photos = json_encode($photoPaths);
        // dd($profile->photos);
        $profile->save(); // Don’t forget to save
    }

    return back()->with('success', 'Headshots updated successfully!');
}

}
