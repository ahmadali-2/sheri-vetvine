<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ManageProfileService;
use App\Http\VetvineTraits\UserDetailTrait;


class AdminDashboardController extends Controller
{
    use UserDetailTrait;
    public function dashboard()
    {
        return view('admins.admindashboard');
    }

    public function sampleForm()
    {
        return view('admins.sampleform');
    }

    public function sampleTable()
    {
        return view('admins.sampletable');
    }

    public function network()
    {
        $user =User::with('memberNetworkLevel')->find(1);
    }

    public function manageProfile(Request $request, ManageProfileService $profile)
    {
        $profile->updateProfile($request) == 'updated'
        ? parent::successMessage("Your Profile Updated Successfully")
        : parent::dangerMessage("Your Profile Does Not Updated , Please Try Again");
        return redirect()->back();
    }

    public function testing()
    {
        $user =User::where('type',1)->first();
        $res =$this->checkuserdetail($user->email, $user->type);
        dd($res);
    }
}
