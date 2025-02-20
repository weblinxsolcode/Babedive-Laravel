<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CMS;
use App\Models\Faqs;
use App\Models\Event;
use App\Models\Users;
use App\Models\Admins;
use App\Models\Levels;
use App\Models\Coupons;
use App\Models\Fianace;
use App\Models\Package;
use App\Models\Reports;
use App\Models\DiveUser;
use App\Models\ContactUs;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\UserFeedback;
use Illuminate\Http\Request;
use App\Models\DiverFeedback;
use App\Models\bannerManagement;
use App\Models\benefitManagement;
use App\Models\splashManagement;
use App\Models\divingTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // AUTHENTICATION
    public function login()
    {
        if (empty(session('admin_id'))) {
            return view('admin.login');
        } else {
            return redirect()->back();
        }
    }

    public function login_check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        $admin = Admins::where('email', $email)->first();

        if ($admin) {
            if (Hash::check($password, $admin->password)) {
                Session::put('admin_id', $admin->id);

                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error', 'Password does not match!')->with('email', $email);
            }
        } else {
            return redirect()->back()->with('error', 'Email does not exist!')->with('email', $email);
        }
    }

    public function logout()
    {
        Session::forget('admin_id');

        return redirect()->route('admin.login')->with("success", "Loggedout successfully....");
    }

    // DASHBOARD
    public function dashboard()
    {
        $title = "Dashboard";

        $totalRevenue = divingTransactions::latest()->get();

        $totalSales = Transaction::latest()->get();

        $coupons = Coupons::latest()->get();

        $memberships = Package::latest()->get();

        $divers = Users::where("dive", 0)->get();

        $diverMasters = Users::where("dive", 1)->get();

        $events = Event::all();

        $data = compact("title", "totalRevenue", "totalSales", "coupons", "memberships", "divers", "diverMasters", "events");

        return view("admin.index")->with($data);
    }

    // MEMBERSHIPS
    public function membershipIndex(Request $request)
    {
        $title = 'Memberships';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $memberships = Package::whereBetween("created_at", [$startDate, $endDate])
                ->latest()
                ->get();

            $sub_title = count($memberships) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $memberships = Package::latest()->get();
            $sub_title = count($memberships) . " records found";
        }

        return view('admin.memberships.index', compact('title', 'memberships', 'sub_title'));
    }

    public function membershipStore(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:packages,title',
            'category' => 'required',
            'type' => 'required',
            // 'price' => 'required',
            'price' => ['required', 'integer', function ($attribute, $value, $fail) {
                if ($value == 1 || $value == 2 || $value == 3) {
                    $fail('The price cannot be 1, 2, or 3.');
                } elseif ($value < 0 || !is_numeric($value)) {
                    $fail('The price must be a positive number or zero.');
                }
            }],
            'status' => 'required',
        ]);

        $data = $request->except([
            '_token',
            'Method',
        ]);

        Package::create($data);

        return redirect()->route('admin.membership.index')->with('success', 'Membership has been created successfully.');
    }

    public function membershipUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:packages,title,' . $id,
            'category' => 'required',
            'type' => 'required',
            // 'price' => 'required',

            'price' => ['required', 'integer', function ($attribute, $value, $fail) {
                if ($value == 1 || $value == 2 || $value == 3) {
                    $fail('The price cannot be 1, 2, or 3.');
                } elseif ($value < 0 || !is_numeric($value)) {
                    $fail('The price must be a positive number or zero.');
                }
            }],
            'status' => 'required',
        ]);

        $data = $request->except([
            '_token',
            'Method',
        ]);

        Package::find($id)->update($data);

        return redirect()->route('admin.membership.index')->with('success', 'Membership has been updated successfully.');
    }

    public function membershipDestroy($id)
    {
        Package::find($id)->delete();

        return redirect()->route('admin.membership.index')->with('success', 'Membership has been deleted successfully.');
    }

    // MEMBERSHIP UPGRADES
    public function membershipUpgrade(Request $request)
    {
        $title = 'Membership Upgrades';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $memberships = Transaction::whereBetween("created_at", [$startDate, $endDate])
                ->with('UserInfo')
                ->latest()
                ->get();

            $sub_title = count($memberships) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $memberships = Transaction::with('UserInfo')->latest()->get();
            $sub_title = count($memberships) . " records found";
        }

        return view('admin.memberships.upgrade', compact('title', 'memberships', 'sub_title'));
    }

    // COUPONS
    public function couponIndex(Request $request)
    {
        $title = 'Coupons';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $coupons = Coupons::whereBetween("created_at", [$startDate, $endDate])
                ->latest()
                ->get();

            $sub_title = count($coupons) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $coupons = Coupons::latest()->get();
            $sub_title = count($coupons) . " records found";
        }

        return view('admin.coupons.index', compact('title', 'coupons', 'sub_title'));
    }

    public function couponStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:coupons,name',
            'type' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $data = $request->except([
            '_token',
            'Method',
            'start_date',
            'end_date',
        ]);

        $data['start'] = Carbon::parse($request->start_date);
        $data['end'] = Carbon::parse($request->end_date);

        Coupons::create($data);

        return redirect()->route('admin.coupon.index')->with('success', 'Coupon has been created successfully.');
    }

    public function couponUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:coupons,name,' . $id,
            'type' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $data = $request->except([
            '_token',
            'Method',
            'start_date',
            'end_date',
        ]);

        $coupon = Coupons::find($id);

        $data['start'] = Carbon::parse($request->start_date);
        $data['end'] = Carbon::parse($request->end_date);

        $coupon->update($data);

        return redirect()->route('admin.coupon.index')->with('success', 'Coupon has been updated successfully.');
    }

    public function couponDestroy($id)
    {
        Coupons::find($id)->delete();

        return redirect()->back()->with("success", "Coupon has been deleted successfully.");
    }

    // COMPLAINTS
    public function complaintIndex(Request $request)
    {
        $title = 'Complaints';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $complaints = Reports::whereBetween("created_at", [$startDate, $endDate])
                ->with("againstInfo", "userInfo")
                ->latest()
                ->get();

            $sub_title = count($complaints) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $complaints = Reports::with("againstInfo", "userInfo")->latest()->get();
            $sub_title = count($complaints) . " records found";
        }

        return view('admin.complaints.index', compact('title', 'complaints', 'sub_title'));
    }

    // SALES
    public function saleIndex(Request $request)
    {
        $title = 'Sales Revenue';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $sales = divingTransactions::whereBetween("created_at", [$startDate, $endDate])
                ->with("eventInfo", "userInfo")
                ->latest()
                ->get();

            $sub_title = count($sales) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $sales = divingTransactions::with("eventInfo", "userInfo")->latest()->get();
            $sub_title = count($sales) . " records found";
        }

        return view('admin.sales.index', compact('title', 'sales', 'sub_title'));
    }

    // USERS MANAGEMENT
    public function userIndex(Request $request)
    {
        $title = 'Diver Management';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $users = Users::where("dive", false)
                ->where("merchant", false)
                ->where("massage", false)
                ->whereBetween("created_at", [$startDate, $endDate])
                ->latest()
                ->get();

            $sub_title = count($users) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $users = Users::where("dive", false)->where("merchant", false)->where("massage", false)->latest()->get();
            $sub_title = count($users) . " records found";
        }

        return view('admin.users.index', compact('title', 'users', 'sub_title'));
    }

    public function userProfile($id)
    {
        $title = 'User Profile';
        $user = Users::with("followingDiver", "getEvents", "feedbacks")->find($id);

        return view('admin.users.profile', compact('title', 'user'));
    }

    public function userFeedback($id)
    {
        $title = 'User Feedbacks';

        $user = Users::with("followingDiver", "getEvents", "feedbacks")->find($id);

        return view('admin.users.feedback', compact('title', 'user'));
    }

    public function userTrip($id)
    {
        $title = 'User Trips';
        $user = Users::with("followingDiver", "getEvents", "feedbacks")->find($id);

        $events = Event::whereHas("joins", function ($query) use ($id) {
            $query->where("user_id", $id);
        })->get();

        return view('admin.users.trip', compact('title', 'user', 'events'));
    }

    public function blockUser($id)
    {
        try {

            Users::where("id", $id)->update([
                "blocked" => 1
            ]);

            return redirect()->back()->with("success", "User has been blocked !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try agian later...");
        }
    }

    public function unblockUser($id)
    {
        try {

            Users::where("id", $id)->update([
                "blocked" => 0
            ]);

            return redirect()->back()->with("success", "User has been blocked !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try agian later...");
        }
    }

    public function approveUser($id)
    {
        try {

            Users::where("id", $id)->update([
                "is_approved" => 1
            ]);



            return redirect()->back()->with("success", "User has been Approved !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try agian later...");
        }
    }

    public function unapproveUser($id)
    {
        try {

            Users::where("id", $id)->update([
                "is_approved" => 0
            ]);


            return redirect()->back()->with("success", "User has been unapproved !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try agian later...");
        }
    }



    public function userDestroy($id)
    {
        Users::find($id)->delete();

        return redirect()->back()->with("success", "User has been deleted successfully.");
    }

    // DIVERS MANAGEMENT
    public function diverIndex(Request $request)
    {
        $title = 'Dive Master Management';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $users = Users::where("dive", true)
                ->where("merchant", false)
                ->where("massage", false)
                ->whereBetween("created_at", [$startDate, $endDate])
                ->with("diveUserInfo")
                ->latest()
                ->get();

            $sub_title = count($users) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $users = Users::where("dive", true)->where("merchant", false)->where("massage", false)->with("diveUserInfo")->latest()->get();
            $sub_title = count($users) . " records found";
        }

        return view('admin.divers.index', compact('title', 'users', 'sub_title'));
    }

    public function diverProfile($id)
    {
        $title = 'Diver Profile';

        $user = Users::whereHas('diveUserInfo', function ($query) use ($id) {
            $query->where("id", $id);
        })->with("diveUserInfo", "transactions")->first();

        // dd($user);

        return view('admin.divers.profile', compact('title', 'user'));
    }



    public function diverFeedback($id)
    {
        $title = 'Diver Feedbacks';
        $user = Users::with("diveUserInfo", "transactions")->find($id);

        return view('admin.divers.feedback', compact('title', 'user'));
    }

    public function diverTrip($id)
    {
        $title = 'Diver Trips';
        $user = Users::with("diveUserInfo", "transactions")->find($id);

        return view('admin.divers.trip', compact('title', 'user'));
    }

    public function diverTransaction($id, Request $request)
    {

        $title = 'Diver Transactions';

        $user = Users::with("diveUserInfo")->find($id);

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $trans = Transaction::where("user_id", $id)->whereBetween("created_at", [$startDate, $endDate])->get();
        } else {
            $trans = Transaction::where("user_id", $id)->latest()->get();
        }

        return view('admin.divers.transaction', compact('title', 'user', 'trans'));
    }

    public function diverDestroy($id)
    {
        // Find the user by ID, or fail if not found
        $user = Users::findOrFail($id);

        // Delete the associated dive user info, if it exists
        if ($user->diveUserInfo) {
            $user->diveUserInfo->delete();
        }

        // Delete the user
        $user->delete();

        return redirect()->route('admin.diver.index')->with("success", "Diver has been deleted successfully.");
    }


    // TRIPS
    // SNORKLINGS
    public function tripSnorklingIndex(Request $request)
    {
        $title = 'Snorkeling Trips';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $events = Event::where("type", "snorkeling")
                ->with('diverInfo', 'comments', 'joins', 'images')
                ->whereBetween("created_at", [$startDate, $endDate])
                ->latest()
                ->get();

            $sub_title = count($events) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $events = Event::where("type", "snorkeling")->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();
            $sub_title = count($events) . " records found";
        }

        return view('admin.trips.snorklings.index', compact('title', 'events', 'sub_title'));
    }

    public function tripSnorklingDetail($id)
    {
        $title = 'Trip Details';
        $event = Event::with('diverInfo', 'comments', 'joins', 'images')->find($id);

        return view('admin.trips.snorklings.detail', compact('title', 'event'));
    }



    public function diving_trips(Request $request)
    {
        $title = 'Diving Trips';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $events = Event::where("type", "diving")
                ->with('diverInfo', 'comments', 'joins', 'images')
                ->whereBetween("created_at", [$startDate, $endDate])
                ->latest()
                ->get();

            $sub_title = count($events) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $events = Event::where("type", "diving")->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();
            $sub_title = count($events) . " records found";
        }

        return view('admin.trips.snorklings.index', compact('title', 'events', 'sub_title'));
    }

    public function diving_details($id)
    {
        $title = 'Trip Details';
        $event = Event::with('diverInfo', 'comments', 'joins', 'images')->find($id);

        return view('admin.trips.snorklings.detail', compact('title', 'event'));
    }

    public function tripDestroy($id)
    {
        // Find the event by ID
        $event = Event::find($id);

        if ($event && $event->joins->count() > 0) {
            return redirect()->back()->with("error", "This event has participants and cannot be deleted.");
        }

        $event->delete();

        return redirect()->back()->with("success", "Event has been deleted successfully.");
    }

    public function profileEdit()
    {
        $title = "Edit Profile";

        $admin = Admins::find(session("admin_id"));

        $data = compact('title', 'admin');

        return view("admin.edit-profile")->with($data);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
        ]);

        try {

            $name = $request->name;
            $email = $request->email;

            Admins::where("id", session("admin_id"))->update([
                "name" => $name,
                "email" => $email,
            ]);

            return redirect()->back()->with("success", "Profile has been updated !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            "password" => "required",
            "confirm_password" => "required|same:password",
        ]);

        try {

            $password = Hash::make($request->confirm_password);

            Admins::where("id", session("admin_id"))->update([
                "password" => $password,
            ]);

            return redirect()->back()->with("success", "Password has been updated !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function ongoing_trips(Request $request)
    {
        $title = 'Ongoing Trips';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $events = Event::with('diverInfo', 'comments', 'joins', 'images')
                ->whereBetween("created_at", [$startDate, $endDate])
                ->where("status", 1)
                ->latest()
                ->get();

            $sub_title = count($events) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $events = Event::where("status", 1)->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();
            $sub_title = count($events) . " records found";
        }

        return view('admin.trips.snorklings.ongoing', compact('title', 'events', 'sub_title'));
    }

    public function completed_trips(Request $request)
    {
        $title = 'Completed Trips';

        if (isset($request->date) && $request->date != null) {
            $dates = explode(" - ", $request->date);
            $startDate = Carbon::parse($dates[0]);
            $endDate = Carbon::parse($dates[1]);

            $events = Event::with('diverInfo', 'comments', 'joins', 'images')
                ->whereBetween("created_at", [$startDate, $endDate])
                ->where("status", 2)
                ->latest()
                ->get();

            $sub_title = count($events) . " records found for the period between " . Carbon::parse(explode(" - ", $request->date)[0])->format('d-M-Y') . " and " . Carbon::parse(explode(" - ", $request->date)[1])->format('d-M-Y');
        } else {
            $events = Event::where("status", 2)->with('diverInfo', 'comments', 'joins', 'images')->latest()->get();
            $sub_title = count($events) . " records found";
        }

        return view('admin.trips.snorklings.completed', compact('title', 'events', 'sub_title'));
    }

    public function faq_management()
    {
        $title = "FAQ Management";

        $list = Faqs::latest()->get();

        $data = compact("title", "list");

        return view("admin.cms.faq")->with($data);
    }

    public function store_faq(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
        ]);

        try {

            $new = new Faqs;
            $new->title = $request->title;
            $new->description = $request->description;
            $new->save();

            return redirect()->back()->with("success", "FAQ has been added successfully...");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function update_faq($id, Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
        ]);

        try {

            $new = Faqs::find($id);
            $new->title = $request->title;
            $new->description = $request->description;
            $new->save();

            return redirect()->back()->with("success", "FAQ has been updated successfully...");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function delete_faq($id)
    {
        try {

            Faqs::find($id)->delete();

            return redirect()->back()->with("success", "Faq has been removed !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function contactUs()
    {
        $title = "Contact Management";

        $list = ContactUs::latest()->get();

        $data = compact("title", "list");

        return view("admin.cms.contact")->with($data);
    }

    public function deleteContact($id)
    {
        try {

            ContactUs::find($id)->delete();

            return redirect()->back()->with("success", "Message has been deleted successfully.");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function termsConditions()
    {
        $title = "Terms & Conditions";

        $text = CMS::find(1);

        $data = compact("title", "text");

        return view("admin.cms.terms")->with($data);
    }

    public function updateTerms(Request $request)
    {
        $request->validate([
            "text" => "required"
        ]);

        try {

            CMS::where("id", 1)->update([
                "terms" => $request->text
            ]);

            return redirect()->back()->with("success", "Content updated.");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function privacyPolicy()
    {
        $title = "Privacy Policy";

        $text = CMS::find(1);

        $data = compact("title", "text");

        return view("admin.cms.privacy")->with($data);
    }

    public function banner()
    {
        $title = "Banner";

        $text = CMS::find(1);

        $data = compact("title", "text");

        return view("admin.cms.banner")->with($data);
    }

    public function updatePrivacy(Request $request)
    {
        $request->validate([
            "text" => "required"
        ]);

        try {

            CMS::where("id", 1)->update([
                "privacy" => $request->text
            ]);

            return redirect()->back()->with("success", "Content updated.");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }



    public function updateBanner(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        try {
            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');

                // Define the new file name
                $fileName = time() . '.' . $banner->getClientOriginalExtension();

                // Move the file to the 'public/banner' directory
                $banner->move(public_path('banner'), $fileName);

                // Save the file name to the database (assuming there's a 'banner' field in the CMS model)
                $currentBanner = CMS::find(1);
                $currentBanner->banner = $fileName;
                $currentBanner->save();

                // Redirect back with a success message
                return redirect()->back()->with('success', 'Banner updated successfully!');
            }

            return redirect()->back()->with('error', 'No banner image uploaded.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

     public function joiningfee()
    {
        $title = "Joining Fee";

        $text = CMS::find(1);

        $data = compact("title", "text");

        return view("admin.cms.joiningfee")->with($data);
    }

    public function updateJoiningfee(Request $request)
    {
        $request->validate([
            'joiningfee' => 'required',
        ]);

        try {

            CMS::where("id", 1)->update([
                "joiningfee" => $request->joiningfee
            ]);

            return redirect()->back()->with("success", "joiningfee updated.");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }


    public function showDiverReview($id)
    {
        try {
            UserFeedback::where("id", $id)->update([
                "status" => 1
            ]);

            return redirect()->back()->with("success", "Now the feedback will be shown in the profile !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function HideDiverReview($id)
    {
        try {
            UserFeedback::where("id", $id)->update([
                "status" => 0
            ]);

            return redirect()->back()->with("success", "Now the feedback will not be shown in the profile !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function showDiveMasterReview($id)
    {
        try {

            DiverFeedback::where("id", $id)->update([
                "status" => 1
            ]);

            return redirect()->back()->with("success", "Now the feedback will be shown in the profile !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function HideDiveMasterReview($id)
    {
        try {
            DiverFeedback::where("id", $id)->update([
                "status" => 0
            ]);

            return redirect()->back()->with("success", "Now the feedback will not be shown in the profile !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function levelManagement()
    {
        $title = "Level Management";

        $list = Levels::latest()->get();

        $data = compact("title", "list");

        return view("admin.levels.index")->with($data);
    }

    public function storeLevel(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "name" => "required"
        ]);

        try {

            $name = ucfirst($request->name);

            $checking = Levels::where("name", $request->name)->exists();

            if ($checking == false) {
                $new = new Levels;
                $new->name = $name;
                $new->save();
                return redirect()->back()->with("success", "Level has been created.");
            } else {
                return redirect()->back()->with("error", "Level name already exists !");
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function updateLevel($id, Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);

        try {

            $name = ucfirst($request->name);

            Levels::where("id", $id)->update([
                "name" => $name
            ]);

            return redirect()->back()->with("success", "Level has been updated.");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function deleteLevel($id)
    {
        try {

            Levels::find($id)->delete();

            return redirect()->back()->with("success", "Level has been removed from the system.");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Somethign went wrong. Please try again later.");
        }
    }

    public function fiananceManagement()
    {
        $title = "Fianance Management";

        $info = Fianace::find(1);

        $data = compact("title", "info");

        return view("admin.fianance.index")->with($data);
    }

    public function updateFianance(Request $request)
    {

        $request->validate([
            "key" => "required",
            "secret" => "required",
        ]);

        try {

            Fianace::where("id", 1)->update([
                "stripe_key" => $request->key,
                "stripe_secret" => $request->secret,
            ]);

            return redirect()->back()->with("success", "Setting has been implemented");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function setEventPrice($id, Request $request)
    {
        $request->validate([
            "fees" => "required"
        ]);

        try {

            Event::where("id", $id)->update([
                // "joining_fees" => $request->fees
                "joining_fees" => $request->fees,


            ]);

            return redirect()->back()->with("success", "Joining fees has been seted up !");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function bannerManagement()
    {
        $title = "Banner Management";

        $list = bannerManagement::latest()->get();

        $data = compact("title", "list");

        return view("admin.banners.index")->with($data);
    }

    public function storeBanner(Request $request)
    {
        $request->validate([
            "text" => "required",
            "image" => "required|image|mimes:jpg,png,jpeg,gif,svg",
        ]);

        try {

            $fileName = Str::random(16).'.'.$request->image->extension();
            $request->image->move(public_path('bannerImages'), $fileName);

            $new = new bannerManagement;
            $new->text = $request->text;
            $new->banner_image = $fileName;
            $new->save();

            return redirect()->back()->with("success", "Banner has been added successfully.");

        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function deleteBanner($id)
    {
        try {

            bannerManagement::find($id)->delete();

            return redirect()->back()->with("success", "Banner has been removed from the system.");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Somethign went wrong. Please try again later.");

        }
    }

    public function splashManagement()
    {
        $title = "Splash Management";

        $list = splashManagement::latest()->get();

        $data = compact("title", "list");

        return view("admin.splash.index")->with($data);
    }

    public function storeSplash(Request $request)
    {
        $request->validate([
            "image" => "required|image|mimes:jpg,png,jpeg,gif,svg",
            "heading" => "required",
            "description" => "required"
        ]);

        try {

            $fileName = Str::random(16).'.'.$request->image->extension();
            $request->image->move(public_path('splashImages'), $fileName);

            $new = new splashManagement;
            $new->heading = $request->heading;
            $new->description = $request->description;
            $new->image = $fileName;
            $new->save();

            return redirect()->back()->with("success", "Splash has been added successfully.");

        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function updateSplash($id, Request $request)
    {
        $request->validate([
            "image" => "nullable|image|mimes:jpg,png,jpeg,gif,svg",
            "heading" => "required",
            "description" => "required"
        ]);

        try {

            $fileName = null;

            if ($request->hasFile('image')) {
                $fileName = Str::random(16).'.'.$request->image->extension();
                $request->image->move(public_path('splashImages'), $fileName);
            }

            if($fileName == null)
            {
                splashManagement::where("id", $id)->update([
                    "heading" => $request->heading,
                    "description" => $request->description,
                ]);
            } else {
                splashManagement::where("id", $id)->update([
                    "heading" => $request->heading,
                    "description" => $request->description,
                    "image" => $fileName
                ]);
            }

            return redirect()->back()->with("success", "Splash has been updated successfully.");

        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function deleteSplash($id)
    {
        try {

            splashManagement::find($id)->delete();

            return redirect()->back()->with("success", "Splash has been removed from the system.");

        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Somethign went wrong. Please try again later.");
        }
    }

    public function benefitManagement()
    {
        $title = "Benefit Management";

        $list = benefitManagement::latest()->get();

        $data = compact("title", "list");

        return view("admin.benefit.index")->with($data);
    }

    public function storeBenefit(Request $request)
    {
        $request->validate([
            "heading" => "required",
            "description" => "required"
        ]);

        try {

            $new = new benefitManagement();
            $new->heading = $request->heading;
            $new->text = $request->description;
            $new->save();

            return redirect()->back()->with("success", "Benefit has been added successfully.");

        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function updateBenefit($id, Request $request)
    {
        $request->validate([
            "heading" => "required",
            "description" => "required"
        ]);

        try {

            benefitManagement::where("id", $id)->update([
                "heading" => $request->heading,
                "text" => $request->description,
            ]);

            return redirect()->back()->with("success", "Benefit has been updated successfully.");

        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

    public function deleteBenefit($id)
    {
        try {

            benefitManagement::find($id)->delete();

            return redirect()->back()->with("success", "Benefit has been removed from the system.");

        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something went wrong. Please try again later.");
        }
    }

}
