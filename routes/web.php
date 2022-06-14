<?php

// use App\Http\Controllers\;

use App\Events\TestEvent;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\UserTypeController;

// Admin And Super Admin Routes;
use App\Http\Controllers\Admins\AdminDashboardController;
use App\Http\Controllers\Admins\AdsCampaign\CampaignController;
use App\Http\Controllers\Admins\AdsCampaign\ManageAdController;
use App\Http\Controllers\Admins\Advertisment\AdCampaignController;
use App\Http\Controllers\Admins\Announcement\AnnouncementController;
use App\Http\Controllers\Admins\Forum\CommentController;
use App\Http\Controllers\Admins\Forum\ForumCategoryController;
use App\Http\Controllers\Admins\Forum\ForumController;
use App\Http\Controllers\Admins\Forum\ForumPostController;
use App\Http\Controllers\Admins\Generalsettings\AdminProfileController;
use App\Http\Controllers\Admins\Generalsettings\ManageUserController;
use App\Http\Controllers\Admins\Members\MemberTypeController;
use App\Http\Controllers\Admins\Memberships\MemberShipPlanCategoryController;
use App\Http\Controllers\Admins\Memberships\MemberShipPlansController;
use App\Http\Controllers\Admins\Webinar\EventCategoryController;
use App\Http\Controllers\Admins\Webinar\EventController;
use App\Http\Controllers\Auth\SuperAdminRegistrationController;
use App\Http\Controllers\Admins\Memberships\BuyMemberShipPlanController;
use App\Http\Controllers\Admins\News\NewsController;
use App\Http\Controllers\Admins\Webinar\BuyEventController;
use App\Http\Controllers\Admins\Webinar\ReviewController;
use App\Http\Controllers\Admins\Webinar\SponserController;
// Vetvine Without Auth Routes;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\PushNotificationController; // push notifications

// Vetvine Frontend Routes;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Auth\UsersRegistrationController;
use App\Http\Controllers\VetvineUsers\EventPayments\EventPaymentController;
use App\Http\Controllers\VetvineUsers\MemberShips\StripePaymentController;
use App\Http\Controllers\VetvineUsers\MyProfile\EditPhotoController;
// User profile Skills And Expertise Controller
use App\Http\Controllers\VetvineUsers\MyProfile\SkillsAndExpertiseController;
use App\Http\Controllers\VetvineUsers\MyProfile\PersonelInfoController;
use App\Http\Controllers\VetvineUsers\MyProfile\EducationController;
use App\Http\Controllers\VetvineUsers\MyProfile\EmploymentInfoController;
//update profile route
use App\Http\Controllers\VetvineUsers\MyProfile\ProfileController;
//user Setting Routes
use App\Http\Controllers\VetvineUsers\Settings\GeneralSettingController;
use App\Http\Controllers\VetvineUsers\Settings\PrivacySettingController;
// user side post controller
use App\Http\Controllers\VetvineUsers\PostManagement\PostController;
use App\Http\Controllers\VideoDescriptionController;
use App\Http\Controllers\StaticPageController; // for static pages
// us
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return 'clear done';
});
Route::get('/cache', function () {
    Artisan::call('config:cache');
});

Route::get('/migrate',function(){
    Artisan::call('migrate');
    return 'migrated successfully';
});

Route::get('phpinfo', function () {
    phpinfo();
});

Route::get('contactusschedule', function(){
    Artisan::call('schedule:run');
    return 'Contact Us Cron Job Schedule Run Successfully';
});

Route::get('run-queue',function(){
    Artisan::call('queue:listen');
    return 'Queue Listening';
});

//notification testing route
// Route::get('test', function () {
//     event(new NotificationEvent('Omar Hayat'));
//     return "Event has been sent!";
// });

/**
 * Social Registeration and  Login  Routes
 */
Route::get('social/{belong}/{user_type}/{network_type}', [SocialController::class, 'redirect']);
Route::get('login/{belong}/callback','App\Http\Controllers\Auth\SocialController@handleProviderCallback');
Route::get('check-user-type', [UserTypeController::class, 'checkType'])->name('checkusertype');
Route::post('loginroute', [UsersRegistrationController::class, 'userLogin'])->name('loginroute');
Route::get('login', function(){
    return view('frontend.home');
})->name('login');


/**
 * Admin Routes
 */
Route::group(['prefix' => 'superadmin', 'middleware' => ['auth:sanctum','adminRole']], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admindashboard');
    Route::get('sample-form', [AdminDashboardController::class, 'sampleForm'])->name('sampleform');
    Route::get('sample-table', [AdminDashboardController::class, 'sampleTable'])->name('sampletable');
    Route::get('general-setting', [AdminProfileController::class, 'generalsetting'])->name('generalsetting');
    Route::post('store-setting', [AdminProfileController::class, 'storegeneralsetting'])->name('storegeneralsetting');
    Route::resource('generalsettings', AdminProfileController::class);
    Route::resource('ads-campaign', CampaignController::class);
    Route::resource('ads-manage', ManageAdController::class);
    Route::resource('membership', MemberShipPlansController::class);
    Route::resource('membership-category', MemberShipPlanCategoryController::class);
    Route::get('network', [AdminDashboardController::class, 'network'])->name('network');
    Route::get('unapproved-users', [ManageUserController::class, 'unapprovedUsers'])->name('unapproved');
    Route::post('approved-user', [ManageUserController::class, 'approvedUsers'])->name('approveuser');
    Route::post('member-permission', [MemberTypeController::class, 'MemberStatus'])->name('memberstatus');
    Route::get('member-type', [MemberTypeController::class, 'MemberTypes'])->name('membertype');
    Route::get('member-permissions/{id}', [MemberTypeController::class, 'MemberPermissions'])->name('memberpermissions');
    Route::delete('delete-users/{id}', [ManageUserController::class, 'deleteUser']);
    Route::get('change-users-type/{id}', [ManageUserController::class, 'changeUserType'])->name('changeusertype');
    Route::post('update-users-type/{id}', [ManageUserController::class, 'updateUserType'])->name('updateusertype');

    Route::resource('forums-category', ForumCategoryController::class);
    Route::resource('forums', ForumController::class);
    Route::resource('announcements',AnnouncementController::class);
    Route::resource('manageuser',ManageUserController::class);
    Route::resource('subscribed-users',BuyMemberShipPlanController::class);
    Route::get('user-history/{id}', [BuyMemberShipPlanController::class, 'userHistory'])->name('userhistory');
    Route::resource('news',NewsController::class);
    Route::get('naveed-testing', [AdminDashboardController::class, 'testing'])->name('testing');
    Route::resource('webinars-category', EventCategoryController::class);
    Route::resource('webinars', EventController::class);
    Route::resource('sponsors',SponserController::class);
    Route::resource('videos-on-demand',VideosOnDemandController::class);
    Route::post('videodata',[VideosOnDemandController::class,'videodata'])->name('videoajaxdata');
    Route::resource('buyevent-users',BuyEventController::class);
    Route::get('userevent-history/{id}', [BuyEventController::class, 'usereventHistory'])->name('usereventhistory');
    Route::get('terms-and-conditions', [StaticPageController::class, 'TermsAndConditions'])->name('TermsAndConditions');
    Route::get('terms-and-conditions/add', [StaticPageController::class, 'TermsAndConditionsAdd'])->name('TermsCondition.create');
    Route::post('terms-and-conditions/add-terms', [StaticPageController::class, 'TermsAndConditionsAddDb'])->name('TermsCondition.create.db');

});


Route::get("/page", function(){
    return view("frontend.pages.forums.post_detail");
 });
Route::group(['middleware'=>['frontendUserRole']], function(){
    Route::get('/',function(){
        return view('frontend.home');
    });
Route::get('why-vetvine',[HomeController::class,'whyVetvine'])->name('why_vetvine');
Route::get('grow',[HomeController::class,'grow'])->name('grow');
Route::get('thrive',[HomeController::class,'thrive'])->name('thrive');
Route::get('heal',[HomeController::class,'heal'])->name('heal');
Route::get('terms-of-service',[HomeController::class,'termsOfService'])->name('termsofservice');
Route::post('contact-us',[ContactUsController::class,'submitContactForm'])->name('contactus.submit');

// upcoming webinars
Route::get('upcoming-webinars',[HomeController::class,'upcomingWebinars'])->name('upcoming_webinars');
Route::get('upcoming-webinars-details/{id}',[HomeController::class,'upcomingWebinarsdetails'])->name('upcoming_details');
Route::get('past-event',[HomeController::class,'pastevent'])->name('pastevent');
Route::get('upcoming-event',[HomeController::class,'upcomingevent'])->name('upcomingevent');
Route::post('submit-payment',[EventPaymentController::class,'index'])->name('submitPayment');
Route::post('payment',[EventPaymentController::class,'paymentWebinars'])->name('payementwebinars');



Route::get('publications',[HomeController::class,'publications'])->name('upcoming_publications');
Route::post('educations',[HomeController::class,'searceducations'])->name('search_educations');
Route::resource('eventpayments',EventPaymentController::class);

Route::get('faqs',[HomeController::class,'faqs'])->name('faqs');
Route::get('frontend-news',[NewsController::class,'frontIndex'])->name('newsfrontend');
Route::get('frontend-forums',[ForumController::class,'frontendIndex'])->name('forumsfrontend');
Route::post('search-form-category',[ForumController::class,'searchFormCategory'])->name('searchFormCategory');
Route::post('search-category-form',[ForumController::class,'searchCategoryForm'])->name('searchCategoryForm');
Route::post('search-form-post',[ForumController::class,'searchFormPosts'])->name('searchFormPosts');
Route::get('forums/{id}',[ForumController::class,'getForums'])->name('getForums');
Route::get('forum/posts/{id}',[ForumController::class,'getForumPosts'])->name('getForumPosts');

Route::get('category/forum/posts/{id}',[ForumController::class,'getForumcategoryPosts'])->name('getForumcategoryPosts');

//videos on demand
Route::get('videos-on-demand',[HomeController::class,'videosOnDemand'])->name('videosOnDemand');
Route::get('ce-archives',[HomeController::class,'ceArchives'])->name('ceArchives');

});
Route::group(['prefix'=>'vetvine-member', 'middleware' => ['auth:sanctum', 'vetvineUserRole']], function(){
    Route::get('dashboard',[PersonelInfoController::class,'userdashboard'])->name('userdashboard');
    Route::get('member-home',[PostController::class,'memberHome'])->name('member_home');
    //User dashboard routes
    Route::resource('personelinfo',PersonelInfoController::class);
    Route::get('/profile-info',[PersonelInfoController::class,'userProfile'])->name('vetvineUserProfile');
    Route::get('/chat',[PersonelInfoController::class,'chat'])->name('vetvineUserChat');
    Route::get("/chatify", function(){
        return view("vendor.chatify.pages.app");
     });
    Route::get('/notifications',[PersonelInfoController::class,'notifications'])->name('vetvineUserNotifications');


    Route::resource('updateprofile',ProfileController::class);
    Route::resource('usermemberships',StripePaymentController::class);
    //User setting routes
    Route::resource('general',GeneralSettingController::class);
    Route::resource('privacy',PrivacySettingController::class);
    // User Post management routes
    Route::resource('post', PostController::class);
    //forum posts
    Route::get('create-forumpost/{id}',[ForumPostController::class,'createPost'])->name('createforumpost');
    Route::get('forumpostlist/{id}',[ForumPostController::class,'forumPostList'])->name('forumpostlist');
    Route::resource('forums-posts',ForumPostController::class);
    //Forum-posts Comments Routes
    Route::post('/comment/store', [CommentController::class,'store'])->name('comment.add');
    Route::delete('comment-destroy/{id}', [CommentController::class,'destroy'])->name('comment.destroy');
    Route::post('/reply/store', [CommentController::class,'replyStore'])->name('reply.add');
    Route::post('savelike', [PostController::class,'likeSave'])->name('likesave');


    //User events Routes
    Route::post('review-store',[ReviewController::class, 'reviewstore'])->name('reviewstore');
    Route::post('review-delete',[HomeController::class, 'reviewdelete'])->name('review.delete');


    Route::post('update-comment', [ReviewController::class, 'commentupdate'])->name('comment.update');
    Route::post('edit-comment', [ReviewController::class, 'edit'])->name('comment.edit');


});

Route::get('testing', function () {
    event(new TestEvent('irtaza imran'));
    return "working!";
});

Route::get('/video-description', [VideoDescriptionController::class, 'video_desc'])->name('video_desc');
Route::post('/mark-as-read',     [PushNotificationController::class, 'mark_as_read'])->name('read.notification');
