<?php

use App\Http\Controllers\admin\AdminJobController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\BlogPostController;
use App\Http\Controllers\admin\SubscriptionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\user\PostJobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\RecruiterController;
use App\Http\Controllers\ChatsController;

use App\Http\Controllers\user\JobApplicationController;
use Pusher\Pusher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//admin

use App\Services\FCMService;

Route::get('/test-fcm', function (FCMService $fcm) {
        $fcmToken = 'fpD-07jywZ7ryqElnGo_T-:APA91bFq_aMtXsaU3GBE0VOAFhoLGlPjJMY8ocE-VLz-FiY6DzauF1qXbMRrSwbZPnuWlBPxobRK9_dLACAA2V6SUeetWbGRK_gFBznveVx_VURA_bnxF14';

        $title = '🎉 Test Notification';
        $body = 'This is a test push sent using FCM!';
        $data = [
                'custom_key' => 'custom_value',
                'type' => 'test'
        ];

        try {
                $response = $fcm->sendNotification($fcmToken, $title, $body, $data);
                return response()->json(['success' => true, 'message_id' => $response]);
        } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
});


Route::group(['prefix' => 'admin'], function () {

        Route::group(['middleware' => 'admin.guest'], function () {


                Route::get('password/update', [AdminLoginController::class, 'showUpdateForm'])->name('password.update.form');
                Route::post('password/update', [AdminLoginController::class, 'updatePassword'])->name('password.update');

                Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
                Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('authenticate');
        });



        Route::group(['middleware' => 'admin.auth'], function () {

                Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard');

                Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        });

        Route::post('/login_admin', [AdminLoginController::class, 'login_admin'])->name('login_admin');

        Route::get('profile', [AdminLoginController::class, 'profile'])->name('admin.profile');
        Route::post('adminupdate', [AdminLoginController::class, 'adminupdate'])->name('admin.adminupdate');




        //user-module
        Route::get('/admin/users/{id}/activity', [AdminUserController::class, 'activity'])->name('admin.users.activity');
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/recuiters', [AdminUserController::class, 'RecuiterListindex'])->name('admin.recuiter.index');
        Route::post('/users/{id}/approve', [AdminUserController::class, 'approve'])->name('admin.users.approve');
        Route::get('/users/{id}/activity', [AdminUserController::class, 'showActivityLog'])->name('admin.users.activity');

        //talent data
        Route::get('/talents/data', [AdminUserController::class, 'talentsData'])->name('admin.talents.data');
        Route::get('/talents/{id}/data', [AdminUserController::class, 'talentsDataView'])->name('admin.talents.dataView');
        Route::post('/talents/verify/{id}', [AdminUserController::class, 'verify'])->name('admin.talents.verify');
        Route::post('/talents/feature/{id}', [AdminUserController::class, 'feature'])->name('admin.talents.feature');

        //complaint moduel
        Route::get('/admin/complaints', [ComplaintController::class, 'index'])->name('admin.complaints.index');
        Route::get('/admin/complaints/{id}', [ComplaintController::class, 'show'])->name('admin.complaints.view');
        Route::post('/admin/complaints/{id}/update-status', [ComplaintController::class, 'updateStatus'])->name('admin.complaints.updateStatus');

        //job module
        Route::resource('jobs',  AdminJobController::class);
        Route::put('/jobs/update-status/{id}', [AdminJobController::class, 'updateStatus'])->name('jobs.updateStatus');


        //Blogs-post
        Route::get('/admin/categories', [BlogPostController::class, 'categories'])->name('admin.categories.index');
        Route::post('/admin/categories/store', [BlogPostController::class, 'storeCategory'])->name('admin.categories.store');

        Route::get('/admin/tags', [BlogPostController::class, 'tags'])->name('admin.tags.index');
        Route::post('/admin/tags/store', [BlogPostController::class, 'storeTag'])->name('admin.tags.store');

        Route::get('/admin/blogs', [BlogPostController::class, 'index'])->name('admin.blogs.index');
        Route::get('/admin/blogs/create', [BlogPostController::class, 'create'])->name('admin.blogs.create');
        Route::post('/admin/blogs', [BlogPostController::class, 'store'])->name('admin.blogs.store');
        Route::post('/admin/blogs/{id}/approve', [BlogPostController::class, 'approve'])->name('admin.blogs.approve');
        Route::put('/admin/blogs/{post}', [BlogPostController::class, 'update'])->name('admin.blogs.update');
        Route::delete('/admin/blogs/{post}', [BlogPostController::class, 'destroy'])->name('admin.blogs.destroy');


        //subscription
        Route::Resource('subscriptions', SubscriptionController::class);
});

//website
Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/blogs', [HomeController::class, 'publicIndex'])->name('blogs.index');
Route::get('/blogs/{slug}', [HomeController::class, 'show'])->name('blogs.show');
//login
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login-user', [AuthController::class, 'loginuser'])->name('loginUser');
Route::post('/logoutUser', [AuthController::class, 'logoutUser'])->name('logoutUser');
//regiser
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register-user', [AuthController::class, 'store'])->name('register.store');
//fotgotpass
Route::get('/showForgotPasswordForm', [AuthController::class, 'showForgotPasswordForm'])->name('showForgotPasswordForm');
Route::match(['GET', 'POST'], '/forgotpasswordsendOtp', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');


//post job
Route::get('/post-job', [PostJobController::class, 'postjobForm'])->name('postjobForm');
Route::post('/save-talent-selection', [PostJobController::class, 'store'])->name('saveTalentSelection');

Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/photo/remove', [ProfileController::class, 'removePhoto'])->name('profile.photo.remove');


Route::put('/profile/talent/personal/update/{id}', [ProfileController::class, 'TalentPersonalUpdate'])->name('talent.personalupdate');
Route::put('/profile/talent/basic/update/{id}', [ProfileController::class, 'TalentBasicUpdate'])->name('talent.basicInfoupdate');
Route::put('/profile/talent/MyDetail/update/{id}', [ProfileController::class, 'TalentMyDetailUpdate'])->name('talent.MyDetailUpdate');
Route::put('/profile/talent/bio/update/{id}', [ProfileController::class, 'TalentBioUpdate'])->name('talent.bioUpdate');
Route::put('/profile/talent/appearance/update/{id}', [ProfileController::class, 'TalentAppearanceUpdate'])->name('talent.appearanceUpdate');
Route::put('/profile/talent/social/update/{id}', [ProfileController::class, 'TalentSocialUpdate'])->name('talent.socialUpdate');
Route::put('/profile/talent/representative/update/{id}', [ProfileController::class, 'TalentRepresentativeUpdate'])->name('talent.representativeUpdate');
Route::put('/profile/talent/credit/update/{id}', [ProfileController::class, 'TalentCreditUpdate'])->name('talent.creditsUpdate');
Route::put('/profile/talent/skills/update/{id}', [ProfileController::class, 'TalentSkillsUpdate'])->name('talent.skillsUpdate');
Route::put('/profile/talent/education/update/{id}', [ProfileController::class, 'TalentEducationUpdate'])->name('talent.educationUpdate');
Route::put('/profile/talent/selfrecording/update/{id}', [ProfileController::class, 'TalentSelfRecordingUpdate'])->name('talent.selfrecordingUpdate');
Route::put('/documents/update/{id}', [ProfileController::class, 'upload'])->name('documents.upload');
Route::put('/profile/talent/documents/update/{id}', [ProfileController::class, 'updateDocuments'])->name('talent.updateDocuments');
Route::post('/profile/{id}/career-highlights', [ProfileController::class, 'saveCareerHighlights'])->name('careerHighlights.save');

Route::put('/profile/headshot/update/{id}', [ProfileController::class, 'headshotUpdate'])->name('profile.headshot.update');









//
Route::get('/searchTalent', [HomeController::class, 'searchTalent'])->name('searchTalent');
Route::get('/Talent', [HomeController::class, 'findTalent'])->name('findTalent');

Route::get('/find-Talent-filter', [HomeController::class, 'findTalentfilter'])->name('findtalentfilter');
Route::get('/talent/{name}', [ProfileController::class, 'show'])->name('talent.show');

//find-job
// Show all jobs page
Route::get('/find-job', [HomeController::class, 'findJob'])->name('findJob');

// Job filter route (e.g., category, location, etc.)
Route::get('/find-job-filter', [HomeController::class, 'findJobfilter'])->name('findJobFilter');

// Apply to a job (form submit)
Route::post('/apply-job', [JobApplicationController::class, 'apply'])->name('apply.job');

// View my job applications
Route::get('/my-jobs', [JobApplicationController::class, 'myjobs'])->name('myJobs');
Route::post('/bookmark-toggle', [JobApplicationController::class, 'toggle'])->name('bookmark.toggle');
Route::get('/my-saved-jobs', [JobApplicationController::class, 'getJobBookmarks'])->name('mySavedJobs');

// View single job using UUID
Route::get('/job/{uuid}', [HomeController::class, 'jobshow'])->name('job.show');
Route::get('/my-job/{uuid}', [HomeController::class, 'myjobshow'])->name('myjob.show');


//recruiter dashboard
Route::get('/recruiter/dashboard', [RecruiterController::class, 'index'])->name('DashboardRecruiter');
Route::get('/recruiter/job/edit/{id}', [RecruiterController::class, 'editJob'])->name('recruiter.job.edit');
Route::post('/recruiter/job/update/{id}', [RecruiterController::class, 'updateJob'])->name('recruiter.job.update');
Route::get('/recruiter/job/delete/{id}', [RecruiterController::class, 'deleteJob'])->name('recruiter.job.delete');
Route::put('/recruiter/application/update-status/{id}', [RecruiterController::class, 'updateStatus'])->name('application.updateStatus');
// web.php
Route::get('/switch-profile/{profile}', [AuthController::class, 'switchProfile'])->name('switch.profile');




///chat-talent
Route::get('/chats', [MessageController::class, 'talent'])->name('chat.talent');

///chat recriuter
Route::get('/recriuter/chats', [MessageController::class, 'recruiter'])->name('recriuter.chats');

Route::get('/recriuter/fetch-messages', [ChatsController::class, 'fetchMessages'])->name('admin.fetchMessages');
Route::post('/recriuter/send-message', [ChatsController::class, 'sendMessage'])->name('admin.sendMessage');


Route::get('/fetch-messages', [ChatsController::class, 'fetchMessagesFromUserToAdmin'])->name('fetch.messagesFromSellerToAdmin');
Route::post('/send-message', [ChatsController::class, 'sendMessageFromUserToAdmin'])->name('send.Messageofsellertoadmin');
