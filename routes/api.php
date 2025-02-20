<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// API FOr Status Update
Route::get('/status-update', [ApiController::class, "eventStatusUpdate"])->name("status.update");

// API For Package Status Updte
Route::get('/package-status-update', [ApiController::class, "packageStatusUpdate"]);

// API For Registration
Route::post('/registration', [ApiController::class, "register"]);

// API For User Update
Route::post('/user-update/{id}', [ApiController::class, "userUpdate"]);

// API For OTP Verification
Route::post('/otp-verification/{id}', [ApiController::class, "verify_otp"]);

// API For Resent OTP Verification
Route::get('/resend-otp/{id}', [ApiController::class, "resend_OTP"]);

// API For Forget Password
Route::post('/forget-password', [ApiController::class, "forget_password"]);

// API FOr Login
Route::post('/login', [ApiController::class, "login"]);

// API For Update Password
Route::post('/update-password/{id}', [ApiController::class, "update_password"]);

// API For Dive User Store
Route::post('/dive-user/store', [ApiController::class, "diveUserStore"]);

// API For Dive User Update
Route::post('/dive-user/update/{id}', [ApiController::class, "diveUserUpdate"]);

// API For Dive User Transaction Store
Route::post('/dive-user-transaction/store', [ApiController::class, "diveUserTransactionStore"]);

// API For Event Store & Update
Route::post('/event-store', [ApiController::class, "eventStore"]);

Route::post('/event-update/{id}', [ApiController::class, "eventUpdate"]);

// API For Get All Events
Route::get('/events', [ApiController::class, "eventIndex"]);

// API For Get All Packages
Route::get('/packages', [ApiController::class, "packageIndex"]);

// API For Get All Events By Diver Id
Route::get('/all-events-by-diver/{diver_id}', [ApiController::class, "eventByDiverIndex"]);

// API For Get All Events By Type
Route::get('/all-events-by-type/{type}', [ApiController::class, "eventByTypeIndex"]);

// API For Event Join
Route::post('/event-join', [ApiController::class, "eventJoinStore"]);

// API For Event Comment
Route::post('/event-comment', [ApiController::class, "eventCommentStore"]);

// API For Dive User Gallery Update
Route::post('/dive-user-gallery/update/{id}', [ApiController::class, "diveUserGalleryUpdate"]);

// API For User Follow Diver
Route::post('/follow-diver', [ApiController::class, "followDiver"]);

// API For User Unfollow Diver
Route::post('/unfollow-diver', [ApiController::class, "unFollowDiver"]);

// API For Diver Total Earning
Route::get('/diver-total-earning/{id}', [ApiController::class, "diverTotalEarning"]);

// API For Diver & User Feedback
Route::post('/diver-and-user-feedback', [ApiController::class, "diverAndUserFeedback"]);

// API For Get Diver & User Feedback
Route::post('/get-diver-and-user-feedback/{id}', [ApiController::class, "getDiverAndUserFeedback"]);

// API For Get Followers Of a Specific User by ID
Route::get('/get-followers/{id}', [ApiController::class, "getFollowers"]);

// API For Joined Users
Route::get('/joined-events/{id}', [ApiController::class, "joinedEvents"]);

// API FOrr Event History
Route::get('/event-history/{id}', [ApiController::class, "event_history"]);

// API For Saving Trip
Route::get('/save-trip/{id}/{user_id}', [ApiController::class, "save_trip"]);

// API For Delete Saving Trip
Route::get('/remove-saved/{id}/{user_id}', [ApiController::class, "delete_trip"]);

// API For Getting Saved trips
Route::get('/get-saved-trips/{id}', [ApiController::class, "get_saved_trips"]);

// APi For Reply To Comment
Route::post('/reply-comment', [ApiController::class, "reply_comment"]);

// Api For Coupon Apply
Route::post('/apply-coupon', [ApiController::class, 'applyCoupon']);

// API For Get User
Route::get('/get-user/{id}', [ApiController::class, "getUser"]);

// API For Completed Diver Events
Route::get("/completed-diver-events/{id}", [ApiController::class, "completed_diver_events"]);

// API For User Joined History
Route::get("/user-joined-history/{id}", [ApiController::class, "user_joined_history"]);

// // API For ALl Diver Events
Route::get("/all-diver-events/{id}", [ApiController::class, "diverCreatedEvents"]);

// API For User Private status update
Route::post("/user-private-status/update/{id}", [ApiController::class, "userPrivateStatusUpdate"]);

// API For Storing Reports
Route::post('/report-user', [ApiController::class, "report_user"]);

// Completed Evetns
Route::get('/completed-events', [ApiController::class, 'completedEvents']);

// POST COntact Us
Route::post('/contact', [ApiController::class, "contactUs"]);

// FAQ Management
Route::get('/faq', [ApiController::class, "faqs"]);

// Content Managemnt
Route::get('/content', [ApiController::class, "content"]);

// API For Diver Feedbacks
Route::get('/diver-feedback/{id}', [ApiController::class, "diverFeedBack"]);

// API For User Feedbacks
Route::get('/user-feedback/{id}', [ApiController::class, "userFeedBack"]);

// Sales Report For Specific Diver Master
Route::get('/sales-report/{id}', [ApiController::class, "salesReport"]);

// API FOr ALL Levels
Route::get('/levels', [ApiController::class, "getLevel"]);

// Route For Getting Finance.
Route::get('/get-finanace', [ApiController::class, "getFianance"]);

// API FOr Social Login
Route::post('/social-login', [ApiController::class, "socialLogin"]);

// API for Account Deletion
Route::get('/account-delete/{id}', [ApiController::class, "deleteAccount"]);

// API for Trip Deletion
Route::get('/events-delete/{id}', [ApiController::class, 'deleteTrip']);

// // API for Image Deletion
// Route::post('/events/{eventId}/images/{imageId}', [ApiController::class, 'deleteEventImage']);


// // API for Image Deletion
Route::get('/images/{imageId}', [ApiController::class, 'deleteDiverImage']);

// API for Event Joining Price
// Route::post('/setup-event-joining-price/{id}', [ApiController::class, 'setEventJoiningPrice']);
