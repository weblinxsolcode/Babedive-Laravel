<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CMS;
use App\Models\Faqs;
use App\Models\Event;
use App\Models\Users;
use App\Models\Levels;
use App\Models\Coupons;
use App\Models\Fianace;
use App\Models\Package;
use App\Models\Reports;
use App\Models\DiveUser;
use App\Models\ContactUs;
use App\Models\EventJoin;
use App\Models\EventImage;
use App\Models\savedTrips;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\EventComment;
use App\Models\UserFeedback;
use Illuminate\Http\Request;
use App\Mail\OTPVerification;
use App\Models\DiverFeedback;
use App\Models\DiverFollower;
use App\Models\DiveUserImage;
use App\Models\bannerManagement;
use App\Models\splashManagement;
use App\Models\benefitManagement;
use App\Models\divingTransactions;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public function eventStatusUpdate()
    {
        $events = Event::where("status", 1)->get();

        $now = Carbon::now();

        foreach ($events as $key => $event) {
            if ($now > $event->to_date) {
                Event::where("id", $event->id)->update([
                    "status" => 2
                ]);
            }
        }
    }

    public function packageStatusUpdate()
    {
        $packages = Transaction::where("status", 1)->get();
        $now = Carbon::now();

        foreach ($packages as $key => $item) {

            if ($now >= $item->end_date) {
                Transaction::where("id", $item->id)->update([
                    "status" => 0
                ]);
            }
        }

        return response($packages);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "role" => "required",
            "email" => "required|email",
            "password" => "required|min:8",
            // Make profile image optional
            "profile" => "nullable|image",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;

        $checking = Users::where("email", $email)->exists();

        if ($checking == false) {
            // Handle profile picture upload if provided
            if ($request->hasFile('profile')) {
                $profile = Str::random(16) . '.' . $request->profile->extension();
                $request->profile->move(public_path('ProfilePictures'), $profile);
            } else {
                $profile = null;  // No profile image uploaded
            }

            $code = random_int(000000, 999999);

            // Send OTP to the email
            Mail::to($email)->send(new OTPVerification($name, $code));

            // Create new user
            $new = new Users;
            $new->profile = $profile;  // If no profile, this will be null
            $new->name = $name;
            $new->registration = $role;
            $new->email = $email;
            $new->password = Hash::make($password);
            $new->OTP = $code;
            $new->save();

            $id = $new->id;

            $user = Users::find($id);

            $message = "OTP has been sent to your email address. Please check your mail.";

            $data = compact("user", "message");

            return response($data, 200)->header("Content-type", "Application/json");
        } else {
            $message = "Email Already Exists";

            $data = compact("message");

            return response($data, 400)->header("Content-type", "Application/json");
        }
    }


    public function socialLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "profile" => "nullable",
            "name" => "required",
            "role" => "required",
            "email" => "required",
            "password" => "required|min:8",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $registration = $request->role;

        $checkExisting = Users::where("registration", $registration)->where("email", $email)->exists();

        if ($checkExisting == true) {
            $message = "Authorized Successfully !";

            $checking = Users::where("email", $email)->first();

            if ($checking->dive == '1') {
                $user = Users::with('diveUserInfo')->find($checking->id);
            } else {
                $user = Users::with('followingDiver')->find($checking->id);
            }

            $data = compact("message", "user");

            return response($data, 200)->header("Content-type", "Application/json");
        }

        if ($request->profile != null) {
            $url = $request->input('profile');
            $response = Http::get($url);

            $extension = $response->header('Content-Type') === 'image/jpeg' ? 'jpg' : 'png';

            // Generate a unique file name
            $fileName = Str::random(16) . '.' . $extension;

            // Define the path to save the file
            $filePath = public_path('ProfilePictures/' . $fileName);

            // Save the file content to the specified path
            file_put_contents($filePath, $response->body());
        } else {
            $fileName = "master.jpg";
        }

        $code = random_int(000000, 999999);
        $new = new Users;
        $new->profile = $fileName;
        $new->name = $name;
        $new->email = $email;
        $new->registration = $registration;
        $new->password = Hash::make($request->password);
        $new->OTP = $code;
        $new->activated = 1;
        $new->save();

        $message = "Welcome to Babedive !";

        $id = $new->id;

        $user = Users::with('diveUserInfo')->find($id);

        $data = compact("user");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function userUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "whatsapp" => "required",
            "city" => "required",
            // "description" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Users::find($id);

        $data = ([
            'name' => $request->name,
            'whatsapp' => $request->whatsapp,
            'city' => $request->city,
            // 'description' => $request->description,
        ]);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->profile) {

            $imagePath = public_path('ProfilePictures') . '/' . $user->profile;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Profile Picture Uploading
            $profile = Str::random(16) . '.' . $request->profile->extension();
            $request->profile->move(public_path('ProfilePictures'), $profile);

            $data['profile'] = $profile;
        }

        if (isset($request->email) && $request->email != null) {

            $emailDuplicationsCheck = Users::where("email", $request->email)->exists();

            if ($emailDuplicationsCheck == false) {
                $userInfo = Users::find($user->id);
                $code = random_int(000000, 999999);
                $name = $user->name;
                $email = $request->email;

                Users::where("id", $user->id)->update([
                    "OTP" => $code
                ]);

                $updatedModel = Users::find($user->id);

                Mail::to($email)->send(new OTPVerification($name, $code));
            } else {
                $message = "The email you're trying to update. Already exists !";

                return response([$message, $user], 401)->header("Content-type", "Application/json");
            }
        }

        $user->update($data);

        if ($user->dive == '1') {
            $user = Users::with('diveUserInfo')->find($user->id);
        } else {
            $user = Users::find($user->id);
        }

        $message = "User profile has been updated.";

        $data = compact("user", "message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function verify_otp($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "code" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        $getUser = Users::find($id);

        $userCode = $request->code;
        $verfiedCode = $getUser->OTP;

        if ($userCode == $verfiedCode) {
            Users::where("id", $id)->update([
                "activated" => true
            ]);

            if (isset($request->email) && $request->email != null) {
                Users::where("id", $id)->update([
                    "email" => $request->email
                ]);
            }

            $message = "Verified Successfully !";
            $data = compact("message");

            return response($data, 200)->header("Content-type", "Application/json");
        } else {
            $message = "Provided OTP is invalid. Please check your email.";
            $data = compact("message");

            return response($data, 400)->header("Content-type", "Application/json");
        }
        // } catch (\Throwable $th) {
        //     $message = "Something went wrong. Please try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function resend_OTP($id)
    {
        $user = Users::find($id);
        $code = random_int(000000, 999999);
        $name = $user->name;
        $email = $user->email;

        Users::where("id", $id)->update([
            "OTP" => $code
        ]);

        Mail::to($email)->send(new OTPVerification($name, $code));

        $message = "OTP has been resended to email. Please check email";
        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function forget_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email"
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        $email = $request->email;

        $getUser = Users::where("email", $email)->first();

        if ($getUser) {
            $name = $getUser->name;
            $email = $getUser->email;
            $code = random_int(000000, 999999);

            Users::where("id", $getUser->id)->update([
                "OTP" => $code
            ]);

            Mail::to($email)->send(new OTPVerification($name, $code));

            $message = "OTP has been sent to your email address. Please check your email.";
            $user = Users::find($getUser->id);

            $data = compact("message", "user");

            return response($data, 200)->header("Content-type", "Application/json");
        } else {
            $message = "No user found.";
            $data = compact("message");

            return response($data, 400)->header("Content-type", "Application/json");
        }

        // } catch (\Throwable $th) {
        //     $message = "Something went wrong. Pleae try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function update_password($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "password" => "required|min:8",
            "confirm_password" => "required|same:password"
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        $password = Hash::make($request->password);

        Users::where("id", $id)->update([
            "password" => $password
        ]);

        $message = "New Password has been updated successfully.";
        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");

        // } catch (\Throwable $th) {
        //     $message = "Something went wrong. Pleae try again later.";

        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $email = $request->email;
        $password = $request->password;

        $emailCheck = Users::where("email", $email)->first();

        if ($emailCheck) {

            if ($emailCheck->blocked == 0) {
                if (Hash::check($password, $emailCheck->password)) {
                    $message = "Authorized Successfully !";

                    if ($emailCheck->dive == '1') {
                        $user = Users::with('diveUserInfo')->find($emailCheck->id);
                    } else {
                        $user = Users::with('followingDiver')->find($emailCheck->id);
                    }

                    $data = compact("message", "user");

                    return response($data, 200)->header("Content-type", "Application/json");
                } else {
                    $message = "Password not matched !";
                    $data = compact("message");

                    return response($data, 401)->header("Content-type", "Application/json");
                }
            } else {
                $message = "Account has been blocked. Please contact administrator.";

                $data = compact("message");

                return response($data, 401)->header("Content-type", "Application/json");
            }
        } else {
            $message = "No User Found !";
            $data = compact("message");

            return response($data, 401)->header("Content-type", "Application/json");
        }
    }

    // public function diveUserStore(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         "name" => "required",
    //         "email" => "required|email|unique:dive_users",
    //         "gender" => "required",
    //         "city" => "required",
    //         "cert_level" => "required",
    //         "cert_no" => "required",
    //         "cert_exp" => "required",
    //         "profile" => "nullable",
    //         "user_id" => "required",
    //         "whatsapp" => "required",
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     // try {
    //     Users::find($request->user_id)->update(['dive' => 1]);

    //     $data = $request->except([
    //         '_token',
    //         'Method',
    //         'profile',
    //     ]);

    //     // Profile Picture Uploading
    //     $profile = Str::random(16) . '.' . $request->profile->extension();
    //     $request->profile->move(public_path('ProfilePictures'), $profile);
    //     $data['profile'] = $profile;

    //     DiveUser::create($data);

    //     $userCheck = Users::find($request->user_id);

    //     if ($userCheck->dive == '1') {
    //         $user = Users::with('diveUserInfo')->find($request->user_id);
    //     } else {
    //         $user = Users::with('followingDiver')->find($request->user_id);
    //     }

    //     $message = "Dive master user has been created.";
    //     $data = compact("user", "message");

    //     return response($data, 200)->header("Content-type", "Application/json");
    //     // } catch (\Throwable $th) {
    //     //     $message = "Something Went Wrong. Please try again later.";
    //     //     $data = compact("message");

    //     //     return response($data, 400)->header("Content-type", "Application/json");
    //     // }
    // }


    public function diveUserStore(Request $request)
    {
        // Validate incoming data
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email|unique:dive_users",
            "gender" => "required",
            "city" => "required",
            "cert_level" => "required",
            "cert_no" => "required",
            "cert_exp" => "required",
            "profile" => "nullable|image",
            "user_id" => "required",
            "whatsapp" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            Users::find($request->user_id)->update(['dive' => 1]);

            $data = $request->except([
                '_token',
                'Method',
                'profile',
            ]);

            // Upload profile picture if provided
            if ($request->hasFile('profile')) {
                $profile = Str::random(16) . '.' . $request->profile->extension();
                $request->profile->move(public_path('ProfilePictures'), $profile);
                $data['profile'] = $profile;
            }

            $data['is_approved'] = 0;

            // Create the dive user entry
            DiveUser::create($data);

            $userCheck = Users::find($request->user_id);

            if ($userCheck->dive == '1') {
                $user = Users::with('diveUserInfo')->find($request->user_id);
            } else {
                $user = Users::with('followingDiver')->find($request->user_id);
            }

            $message = "Dive master user application has been submitted.";
            $data = compact("user", "message");

            return response($data, 200)->header("Content-type", "Application/json");
        } catch (\Throwable $th) {
            $message = "Something Went Wrong. Please try again later.";
            $data = compact("message");

            return response($data, 400)->header("Content-type", "Application/json");
        }
    }


    public function diveUserUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "gender" => "required",
            "city" => "required",
            "cert_level" => "required",
            "cert_no" => "required",
            "cert_exp" => "required",
            // "description" => "required",
        ]);

        //   dd($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        $dive_user = DiveUser::find($id);

        $data = $request->except([
            '_token',
            'Method',
            'profile',
        ]);

        if ($request->profile) {

            $imagePath = public_path('ProfilePictures') . '/' . $dive_user->profile;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Profile Picture Uploading
            $profile = Str::random(16) . '.' . $request->profile->extension();
            $request->profile->move(public_path('ProfilePictures'), $profile);
            $data['profile'] = $profile;
        }


        $dive_user->update($data);

        $userCheck = Users::find($dive_user->user_id);

        if ($userCheck->dive == '1') {
            $user = Users::with('diveUserInfo')->find($dive_user->user_id);
        } else {
            $user = Users::with('followingDiver')->find($dive_user->user_id);
        }

        $message = "Dive master user has been created.";
        $data = compact("user", "message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function diveUserTransactionStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_id" => "required",
            "package_id" => "required",
            "role" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {

        $package = Package::find($request->package_id);

        $days = $package->type == "Monthly" ? 30 : 365;

        $data = ([
            'user_id' => $request->user_id,
            'role' => $request->role,
            'package_name' => $package->title,
            'type' => $package->type,
            'price' => $package->price,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays($days),
        ]);

        Transaction::create($data);

        DiveUser::where('user_id', $request->user_id)->update(['is_paid' => 1]);

        $userCheck = Users::find($request->user_id);

        if ($userCheck->dive == '1') {
            $user = Users::with('diveUserInfo')->find($request->user_id);
        } else {
            $user = Users::with('followingDiver')->find($request->user_id);
        }

        $message = "Dive master transaction has been created.";
        $data = compact("user", "message");

        return response($data, 200)->header("Content-type", "Application/json");
        // } catch (\Throwable $th) {
        //     $message = "Something Went Wrong. Please try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function eventStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required",
            "country" => "required",
            "from_date" => "required",
            "to_date" => "required",
            "no_of_persons" => "required",
            "location" => "required",
            "type" => "required",
            "trip_budget" => "required",
            "description" => "required",
            "diver_id" => "required",
            'images' => 'required|array',
            'images.*' => 'image',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

         $cms = CMS::find(1);
         $joiningfee = $cms->joiningfee;

        // try {
        $data = ([
            'title' => $request->title,
            'country' => $request->country,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'no_of_persons' => $request->no_of_persons,
            'location' => $request->location,
            'trip_budget' => $request->trip_budget,
            'type' => $request->type,
            'description' => $request->description,
            'diver_id' => $request->diver_id,
            'joining_fees' => $joiningfee,
        ]);

        $event = Event::create($data);

        if ($request->has('images') && is_array($request->images)) {
            foreach ($request->images as $gallery_image) {
                // Gallery Picture Uploading
                $image = Str::random(16) . '.' . $gallery_image->getClientOriginalExtension();
                $gallery_image->move(public_path('GalleryImages'), $image);

                EventImage::create([
                    'image' => $image,
                    'event_id' => $event->id,
                ]);
            }
        }

        $message = "Event has been created.";
        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");
        // } catch (\Throwable $th) {
        //     $message = "Something Went Wrong. Please try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function eventUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required",
            "no_of_persons" => "required",
            "description" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        $event = Event::find($id);

        $data = ([
            'title' => $request->title,
            'no_of_persons' => $request->no_of_persons,
            'description' => $request->description
        ]);

        $event->update($data);

        if ($request->has('images') && is_array($request->images)) {

            // $event_images = EventImage::where('event_id', $event->id)->get();

            // foreach ($event_images as $value) {
            //     // Unlink & delete old images
            //     $imagePath = public_path('GalleryImages') . '/' . $value->image;

            //     if (file_exists($imagePath)) {
            //         unlink($imagePath);
            //     }

            //     $value->delete();
            // }

            foreach ($request->images as $gallery_image) {
                // Gallery Picture Uploading
                $image = Str::random(16) . '.' . $gallery_image->getClientOriginalExtension();
                $gallery_image->move(public_path('GalleryImages'), $image);

                EventImage::create([
                    'image' => $image,
                    'event_id' => $event->id,
                ]);
            }
        }

        $message = "Event has been updated.";
        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");
        // } catch (\Throwable $th) {
        //     $message = "Something Went Wrong. Please try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function eventIndex()
    {
        $events = Event::where('status', 1)->where("joining_fees", "!=", null)->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $message = "Events has been found.";
        $data = compact("events", "message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function packageIndex()
    {
        $packages = Package::where('status', 1)->latest()->get();

        $message = "Packages has been found.";
        $data = compact("packages", "message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function eventByDiverIndex($diver_id)
    {
        $events = Event::where('status', 1)->where('diver_id', $diver_id)->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $message = "All events by diver has been found.";
        $data = compact("events", "message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function eventByTypeIndex($type)
    {
        $dateNow = Carbon::now();

        $events = Event::where("joining_fees", "!=", null)->where('status', 1)
            ->whereHas("diverInfo.userInfo", function ($query) {
                $query->where("blocked", 0);
            })
            ->whereDate("from_date", ">", $dateNow)
            ->where('type', $type)
            ->with(['diverInfo', 'comments', 'joins', 'images'])
            ->latest()
            ->get();

        $message = "All events by type has been found.";
        $data = compact("events", "message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function eventJoinStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "event_id" => "required",
            "user_id" => "required",
            "qty" => "required",
            "total" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $event = Event::find($request->event_id);

        // dd($event);

        $qty = (int) $request->qty;
        $total = (int) $request->total;
        $dive_user = DiveUser::find($event->diver_id);

        $fiananceSettings = Fianace::find(1);

        // dd($dive_user, $fiananceSettings);

        $value = (int) $fiananceSettings->value;
        $type = $fiananceSettings->type;

        if ($type == "percentage") {
            $finalValue = ($value / 100) * $total;
        }

        if ($type == "amount") {
            $finalValue = $total - $value;
        }

        DiveUser::where("id", $event->diver_id)->update(['total_earning' => $finalValue]);

        for ($i = 0; $i < $qty; $i++) {

            if ($i == 0) {
                $role = "User";
            } else {
                $role = "Guest";
            }

            $join = new EventJoin;
            $join->event_id = $request->event_id;
            $join->user_id = $request->user_id;
            $join->role = $role;
            $join->save();
        }

        // Creating Transactions To A event
        $transaction = new divingTransactions;
        $transaction->event_id = $request->event_id;
        $transaction->user_id = $request->user_id;
        $transaction->price = $total;
        $transaction->save();

        $message = "Event has been joined.";
        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function eventCommentStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "comment" => "required",
            "event_id" => "required",
            "user_id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        EventComment::create([
            'comment' => $request->comment,
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
        ]);

        $message = "Comment has been sent.";
        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function diveUserGalleryUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'diver_id' => 'required',
            'images' => 'required|array',
            'images.*' => 'image',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        if ($request->has('images') && is_array($request->images)) {

            // $diver_images = DiveUserImage::where('diver_id', $id)->get();

            // if (count($diver_images) > 0) {
            //     foreach ($diver_images as $value) {
            //         // Unlink & delete old images
            //         $imagePath = public_path('GalleryImages') . '/' . $value->image;

            //         if (file_exists($imagePath)) {
            //             unlink($imagePath);
            //         }

            //         $value->delete();
            //     }
            // }

            foreach ($request->images as $gallery_image) {
                // Gallery Picture Uploading
                $image = Str::random(16) . '.' . $gallery_image->getClientOriginalExtension();
                $gallery_image->move(public_path('GalleryImages'), $image);

                DiveUserImage::create([
                    'image' => $image,
                    'diver_id' => $request->diver_id,
                ]);
            }
        }

        $user = Users::find($id);

        if ($user->dive == '1') {
            $user = Users::with('diveUserInfo')->find($user->id);
        } else {
            $user = Users::with('followingDiver')->find($user->id);
        }

        $message = "Event gallery has been updated.";
        $data = compact("message", "user");

        return response($data, 200)->header("Content-type", "Application/json");
        // } catch (\Throwable $th) {
        //     $message = "Something Went Wrong. Please try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function followDiver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'diver_id' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        DiverFollower::create([
            'diver_id' => $request->diver_id,
            'user_id' => $request->user_id,
        ]);

        // Following count update in user table
        $user = Users::find($request->user_id);
        $following_count = $user->following_count + 1;
        $user->update(['following_count' => $following_count]);

        $message = "Diver has been followed.";
        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");
        // } catch (\Throwable $th) {
        //     $message = "Something Went Wrong. Please try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function unFollowDiver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'diver_id' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        DiverFollower::where('diver_id', $request->diver_id)
            ->where('user_id', $request->user_id)
            ->delete();

        // Following count update in user table
        $user = Users::find($request->user_id);
        $following_count = $user->following_count - 1;
        $user->update(['following_count' => $following_count]);

        $message = "Diver has been unfollowed.";
        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");
        // } catch (\Throwable $th) {
        //     $message = "Something Went Wrong. Please try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function diverTotalEarning($id)
    {
        $diver_total_earning = DiveUser::with('images', 'followerCount')->find($id);

        $message = "Total earning of diver has been found.";
        $data = compact("diver_total_earning", "message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function diverAndUserFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'diver_id' => 'required',
            'user_id' => 'required',
            'feedback' => 'required',
            'is_user' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        if ($request->is_user == '1') {
            DiverFeedback::create([
                'diver_id' => $request->diver_id,
                'user_id' => $request->user_id,
                'feedback' => $request->feedback,
            ]);
            $message = "The user has given feedback to the diver.";
        } elseif ($request->is_user == '0') {
            UserFeedback::create([
                'diver_id' => $request->diver_id,
                'user_id' => $request->user_id,
                'feedback' => $request->feedback,
            ]);
            $message = "The diver has given feedback to the user.";
        } else {
            $message = "If the user wants to give feedback to the diver, then enter the value `is_user -> 1`. If the diver wants to give feedback to the user, then enter the value `is_user -> 0`.";
        }

        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");
        // } catch (\Throwable $th) {
        //     $message = "Something Went Wrong. Please try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function getDiverAndUserFeedback(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'is_user' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // try {
        if ($request->is_user == '1') {
            $feedback = UserFeedback::where('user_id', $id)->with('diverInfo')->first();

            $message = "The user feedback has been found.";
        } elseif ($request->is_user == '0') {
            $feedback = DiverFeedback::where('diver_id', $id)->with('userInfo')->first();

            $message = "The diver feedback has been found.";
        } else {
            $message = "If the user wants to get their feedback, then enter the value `is_user -> 1`. If the diver wants to get their feedback, then enter the value `is_user -> 0`.";
            $feedback = [];
        }

        $data = compact("feedback", "message");

        return response($data, 200)->header("Content-type", "Application/json");
        // } catch (\Throwable $th) {
        //     $message = "Something Went Wrong. Please try again later.";
        //     $data = compact("message");

        //     return response($data, 400)->header("Content-type", "Application/json");
        // }
    }

    public function getFollowers($id)
    {

        $followers = DiverFollower::where("user_id", $id)->with("diverInfo")->latest()->get();

        $data = compact("followers");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function joinedEvents($id)
    {
        $events = Event::where('status', 1)->whereHas("joins", function ($query) use ($id) {
            $query->where("user_id", $id);
        })->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function event_history($id)
    {
        $events = Event::where('status', 2)->whereHas("joins", function ($query) use ($id) {
            $query->where("user_id", $id);
        })->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function save_trip($id, $user_id)
    {
        $new = new savedTrips;
        $new->event_id = $id;
        $new->user_id = $user_id;
        $new->save();

        $events = Event::where('status', 1)->whereHas("savedTrips", function ($query) use ($user_id) {
            $query->where("user_id", $user_id);
        })->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function delete_trip($id, $userId)
    {
        savedTrips::where('event_id', $id)->where("user_id", $userId)->delete();

        $events = Event::where('status', 1)->whereHas("savedTrips", function ($query) use ($userId) {
            $query->where("user_id", $userId);
        })->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function get_saved_trips($id)
    {
        $events = Event::where('status', 1)->whereHas("savedTrips", function ($query) use ($id) {
            $query->where("user_id", $id);
        })->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function reply_comment(Request $request)
    {

        $request->validate([
            "comment_id" => "required",
            "user_id" => "required",
            "event_id" => "required",
            "comment" => "required",
        ]);

        $comment_id = $request->comment_id;
        $user_id = $request->user_id;
        $event_id = $request->event_id;
        $comment = $request->comment;

        $new = new  EventComment;
        $new->event_id = $event_id;
        $new->user_id = $user_id;
        $new->comment = $comment;
        $new->reply = $comment_id;

        $new->save();

        $comments = EventComment::where("event_id", $event_id)->get();

        return response($comments, 200)->header("Content-type", "Application/json");
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            "name" => "required",
            "total" => "required",
        ]);

        $name = $request->name;
        $total = (int) $request->total;

        $checking = Coupons::where("name", $name)->exists();

        if ($checking == true) {
            $discount = Coupons::where("name", $name)->first();
            $startDate = Carbon::parse($discount->start);
            $endDate = Carbon::parse($discount->end);
            $dateNow = Carbon::now();


            if ($dateNow->greaterThanOrEqualTo($startDate) && $dateNow->lessThanOrEqualTo($endDate)) {
                if ($discount->used < $discount->quantity) {
                    $type = $discount->type;

                    if ($type == "percentage") {
                        $deductionAmount = (int) $discount->price / 100 * $total;
                        $final = $total - $deductionAmount;

                        $data = compact("final", "total");

                        Coupons::where("id", $discount->id)->increment("used", 1);

                        return response($data, 200)->header("Content-type", "Application/json");
                    }

                    if ($type == "fixed") {
                        $deductionAmount = (int) $discount->price;
                        $final = $total - $deductionAmount;

                        $data = compact("final", "total");

                        Coupons::where("id", $discount->id)->increment("used", 1);

                        return response($data, 200)->header("Content-type", "Application/json");
                    }
                } else {

                    Coupons::where("id", $discount->id)->update(["status" => 2]);

                    $message = "Coupon limit reached";

                    $data = compact("message");

                    return response($data, 401)->header("Content-type", "Application/json");
                }
            } else {

                $message = "Coupon Expired !";

                $data = compact("message");

                return response($data, 401)->header("Content-type", "Application/json");
            }
        } else {
            $message = "No Coupon Found !";

            $data = compact("message");

            return response($data, 401)->header("Content-type", "Application/json");
        }
    }

    public function getUser($id)
    {
        $checking = Users::find($id);

        if ($checking->dive == '1') {
            $user = Users::with('diveUserInfo')->find($checking->id);
        } else {
            $user = Users::with('followingDiver')->find($checking->id);
        }

        $data = compact("user");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function completed_diver_events($id)
    {
        $events = Event::where("status", 2)->where("diver_id", $id)->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function all_diver_events($id)
    {
        $events = Event::where("diver_id", $id)->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function user_joined_history($id)
    {
        $events = Event::whereHas("joins", function ($query) use ($id) {
            $query->where("user_id", $id);
        })->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function diverCreatedEvents($id)
    {
        $events = Event::where("diver_id", $id)->with('diverInfo', 'comments', 'joins', 'images')->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function userPrivateStatusUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $checking = Users::find($id);

        $checking->update(['is_private' => $request->status]);

        if ($checking->dive == '1') {
            $user = Users::with('diveUserInfo')->find($checking->id);
        } else {
            $user = Users::with('followingDiver')->find($checking->id);
        }

        $message = 'Is private status has been updated successfully.';

        $data = compact("user", "message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function report_user(Request $request)
    {
        $request->validate([
            "reported_by" => "required",
            "reported_to" => "required",
            "subject" => "required",
            "description" => "required",
        ]);

        $reported_by = $request->reported_by;
        $reported_to = $request->reported_to;
        $subject = $request->subject;
        $description = $request->description;

        $new = new Reports;
        $new->reported_by = $reported_by;
        $new->reported_to = $reported_to;
        $new->subject = $subject;
        $new->description = $description;
        $new->save();

        return response($new, 200)->header("Content-type", "Application/json");
    }

    public function completedEvents()
    {
        $events = Event::where("status", 2)->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();

        $data = compact("events");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required",
        ]);

        $new = new ContactUs;
        $new->name = $request->name;
        $new->email = $request->email;
        $new->subject = $request->subject;
        $new->message = $request->message;
        $new->save();


        return response("Message sent successfully !", 200)->header("Content-type", "Application/json");
    }

    public function faqs()
    {
        $list = Faqs::latest()->get();

        $data = compact("list");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function content()
    {
        $content = CMS::find(1);

        $data = compact("content");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function diverFeedBack($id)
    {
        $feedbacks = DiverFeedback::where("diver_id", $id)->with("user")->get();

        $data = compact("feedbacks");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function userFeedBack($id)
    {

        $feedbacks = UserFeedback::where("user_id", $id)->with("userInfo")->get();

        $data = compact("feedbacks");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function salesReport($id)
    {
        $list = divingTransactions::whereHas("eventInfo", function ($query) use ($id) {
            $query->where("diver_id", $id);
        })->with("eventInfo", "userInfo")->latest()->get();

        $data = compact("list");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function getLevel()
    {
        $list = Levels::latest()->get();

        $data = compact("list");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function getFianance()
    {
        $info = Fianace::find(1);

        $data = compact("info");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function deleteAccount($id)
    {
        Users::where("id", $id)->delete();

        $message = "Account has been deleted !";

        $data = compact("message");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function deleteTrip($id)
    {
        $event = Event::find($id);

        if (!$event) {
            $message = "Event not found";
            $data = compact("message");
            return response($data, 404)->header("Content-type", "Application/json");
        }

        // Check if the event has any participants
        if ($event->joins->count() > 0) {
            $message = "This event has participants and cannot be deleted.";
            $data = compact("message");
            return response($data, 400)->header("Content-type", "Application/json");
        }

        $event->delete();
        $message = "Event has been deleted successfully.";
        $data = compact("message");
        return response($data, 200)->header("Content-type", "Application/json");
    }


    public function deleteDiverImage ( $imageId)
    {
        $image = DiveUserImage::where('id', $imageId)->first();

        if (!$image) {
            $message = "Image not found or does not belong to this Driver.";
            $data = compact("message");
            return response($data, 404)->header("Content-type", "Application/json");
        }

        // Delete the image file from the public directory
        $imagePath = public_path('GalleryImages/' . $image->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Remove the file
        }

        $image->delete();

        $message = "Image has been deleted successfully.";
        $data = compact("message");
        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function getBanners()
    {
        $list = bannerManagement::latest()->get();

        $data = compact("list");

        return response($data, 200)->header("Content-type", "Application/json");
    }

    public function getBenefits()
    {
        $list = benefitManagement::latest()->get();

        $data = compact("list");

        return response($data, 200)->header("Content-type", "Application/json");
    }


    public function getSplash()
    {
        $list = splashManagement::latest()->get();

        $data = compact("list");

        return response($data, 200)->header("Content-type", "Application/json");
    }


}
