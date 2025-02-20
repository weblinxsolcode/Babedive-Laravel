<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;


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

Route::get('/', [IndexController::class, "index"])->name("home.page");
Route::get('/privacypolicy', [IndexController::class, "privacypolicy"])->name("home.privacy");
Route::get('/term-condition', [IndexController::class, "term"])->name("home.term");
Route::get('/contactus', [IndexController::class, "contactus"])->name("home.contactus");
Route::post('/contactus', [IndexController::class, 'contactStore'])->name('contact.store');

/** Complete Admin Dashboard  **/
Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/login-check', [AdminController::class, 'login_check'])->name('admin.login.check');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['Admin'])->controller(AdminController::class)->name('admin.')->group(function () {

    // Level Management
    Route::prefix("level-management")->group(function () {

        // List Of Levels
        Route::get('/', [AdminController::class, "levelManagement"])->name("level.management");

        // Store Levels
        Route::post('/store', [AdminController::class, "storeLevel"])->name("store.level");

        // Updating Level
        Route::post('/update/{id}', [AdminController::class, "updateLevel"])->name("update.level");

        // Route For Deleting Level
        Route::get('/delete/{id}', [AdminController::class, "deleteLevel"])->name("delete.level");
    });

    // DASHBOARD
    Route::get('/dashboard', 'dashboard')->name('dashboard');

    // MEMBERSHIPS
    Route::get('/memberships', 'membershipIndex')->name('membership.index');
    Route::post('/membership/store', 'membershipStore')->name('membership.store');
    Route::post('/membership/update/{id}', 'membershipUpdate')->name('membership.update');
    Route::get('/membership/destroy/{id}', 'membershipDestroy')->name('membership.delete');
    Route::get('/membership/upgrades', 'membershipUpgrade')->name('membership.upgrade');

    // USERS
    Route::get('/users', 'userIndex')->name('user.index');
    Route::get('/user/profile/{id?}', 'userProfile')->name('user.profile');
    Route::get('/user/feedbacks/{id?}', 'userFeedback')->name('user.feedback');
    Route::get('/user/trips/{id?}', 'userTrip')->name('user.trip');
    Route::get('/block-user/{id}', "blockUser")->name("block.user");
    Route::get('/un-block-user/{id}', "unblockUser")->name("unblock.user");
    Route::get('/user/destroy/{id}', 'userDestroy')->name('user.delete');

    Route::get('approve-user/{id}', 'approveUser')->name('approve.user');
    Route::get('unapprove-user/{id}', 'unapproveUser')->name('unapprove.user');



    // DIVERS
    Route::get('/divers', 'diverIndex')->name('diver.index');
    Route::get('/diver/profile/{id?}', 'diverProfile')->name('diver.profile');
    Route::get('/diver/feedbacks/{id?}', 'diverFeedback')->name('diver.feedback');
    Route::get('/diver/trips/{id?}', 'diverTrip')->name('diver.trip');
    Route::get('/diver/transaction/{id?}', 'diverTransaction')->name('diver.transaction');
    Route::get('/diver/destroy/{id}', 'diverDestroy')->name('diver.delete');




    // COUPONS
    Route::get('/coupons', 'couponIndex')->name('coupon.index');
    Route::post('/coupon/store', 'couponStore')->name('coupon.store');
    Route::post('/coupon/update/{id}', 'couponUpdate')->name('coupon.update');
    Route::get('/coupon/destroy/{id}', 'couponDestroy')->name('coupon.delete');

    // PROFILE
    Route::get('/profile', 'profileEdit')->name('profile.edit');

    // Profile Update
    Route::post('/update-profile', "profileUpdate")->name("profile.update");

    // Password Update
    Route::post("/update-password", "passwordUpdate")->name("update.password");

    // COMPLAINTS
    Route::get('/complaints', 'complaintIndex')->name('complaint.index');

    // SALES
    Route::get('/sales', 'saleIndex')->name('sale.index');

    // TRIPS
    // SNORKLING
    Route::get('/trips/snorkeling', 'tripSnorklingIndex')->name('trip-snorkling.index');

    // Set Event Price
    Route::post('/setup-event-price/{id}', "setEventPrice")->name("setup.price");

    Route::get('/trips/snorkeling/details/{id?}', 'tripSnorklingDetail')->name('trip-snorkling.detail');



    Route::post('delete-image', 'deleteImage')->name('delete.image');




    // DIVING
    Route::get('/trips/diving', 'diving_trips')->name('trip-diving.index');
    Route::get('/trips/diving/details/{id}', 'diving_details')->name('trip-diving.detail');
    Route::get('/user/diving/{id}', 'tripDestroy')->name('trip-diving.delete');



    // Ongoing Trips
    Route::get('/ongoing-trips', "ongoing_trips")->name("ongoing.trips");

    // Completed Trips
    Route::get('/completed-trips', "completed_trips")->name("completed.trips");

    // FAQ Management
    Route::get('/faq-management', "faq_management")->name("faq.management");

    // Storing FAQ
    Route::post('/store-faq', "store_faq")->name("store.faq");

    // Updating FAQ
    Route::post('/update-faq/{id}', "update_faq")->name("update.faq");

    // Deletion Of FAQ
    Route::get('/delete-faq/{id}', "delete_faq")->name("delete.faq");

    // Admin Route For sales of trips
    Route::get('/trip-sales', [AdminController::class, "trip_sales"])->name("admin.trip.sales");

    // Route For Contact Management
    Route::get('/contact-management', [AdminController::class, "contactUs"])->name("contact.management");

    // Route For Deletion OF Contact us
    Route::get('/delete-contact/{id}', [AdminController::class, "deleteContact"])->name("delete.contact");

    // Route For Terms & Conditions
    Route::get('/terms-conditions', [AdminController::class, "termsConditions"])->name('terms');

    // Route For Privacy Policy
    Route::get('/privacy-policy', [AdminController::class, "privacyPolicy"])->name('privacy');


    
    
    // Route For Saving Terms & COnditions
    Route::post('/store-terms', [AdminController::class, "updateTerms"])->name("store.terms");
    
    // Route For Saving Privacy policy
    Route::post('/store-privacy', [AdminController::class, "updatePrivacy"])->name("store.privacy");
    
    Route::get('/banners', [AdminController::class, "banner"])->name('banner');

    Route::post('/store-banner', [AdminController::class, "updateBanner"])->name("store.banner");

    Route::get('/joining-fee', [AdminController::class, "joiningfee"])->name('joiningfee');
    
    Route::post('/store-joining-fee', [AdminController::class, "updateJoiningfee"])->name("store.joiningfee");


    // Admin  Route For Blocking User Feedback
    Route::get('/hide-review/{id}', [AdminController::class, "HideDiverReview"])->name("remove.diver.review");

    // Admin Route For Unblocking User Feedback
    Route::get('/show-review/{id}', [AdminController::class, "showDiverReview"])->name("show.diver.review");

    // Admin Route For Blocking Dive Master Feedback
    Route::get('/hide-diver-master-review/{id}', [AdminController::class, "HideDiveMasterReview"])->name("remove.dive.master.review");

    // Admin Route For Unblocking Dive Master Feedback
    Route::get('/show-diver-master-review/{id}', [AdminController::class, "showDiveMasterReview"])->name("show.dive.master.review");

    // Admin Route For Fianance management
    Route::get('/fianance-settings', [AdminController::class, "fiananceManagement"])->name("fianance.management");

    // Admin Route For Updating Fianance Management
    Route::post('/update-fianance', [AdminController::class, "updateFianance"])->name("update.fianance");
});

/** End Admin Dashboard  **/
