<?php

namespace App\Http\Controllers\Admins\Members;

use App\Http\Controllers\Controller;
use App\Models\MemberPermission;
use App\Models\MemberTypes;
use Illuminate\Http\Request;

class MemberTypeController extends Controller
{
    public function MemberTypes()
    {

        $membertype = MemberTypes::with('userTypeCheck')->get();
        // dd($membertype[0]->userTypeCheck->count());
        return view('admins.members.membertype', compact('membertype'));
    }
    public function MemberPermissions($id)
    {
        $data = MemberPermission::where('membertype_id', $id)->first();
        return view('admins.members.memberpermissions', compact('id', 'data'));
    }
    public function MemberStatus(Request $request)
    {
        $id = $request->memberId;
        $data = MemberPermission::where('membertype_id', $id)->get();
        if (!$data->isEmpty()) {
            if ($request->name == 'view_ads') {
                if ($request->checkbox1 == 'true') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'view_ads' => '1',
                    ]);
                } else if ($request->checkbox1 == 'false') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'view_ads' => '0',
                    ]);
                }
            }

            if ($request->name == 'likes') {
                if ($request->checkbox4 == 'true') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'likes' => '1',
                    ]);
                } else if ($request->checkbox4 == 'false') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'likes' => '0',
                    ]);
                }
            }
            if ($request->name == 'shares') {
                if ($request->checkbox5 == 'true') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'shares' => '1',
                    ]);
                } else if ($request->checkbox5 == 'false') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'shares' => '0',
                    ]);
                }
            }
            if ($request->name == 'comments') {

                if ($request->checkbox2 == 'true') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'comments' => '1',
                    ]);
                } else if ($request->checkbox2 == 'false') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'comments' => '0',
                    ]);
                }
            }
            if ($request->name == 'licensure') {

                if ($request->checkbox3 == 'true') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'licensure' => '1',
                    ]);
                } else if ($request->checkbox3 == 'false') {
                    MemberPermission::where('membertype_id', $id)->update([
                        'licensure' => '0',
                    ]);
                }
            }
        } else {
            $newMember = new MemberPermission();
            if ($request->name == 'view_ads') {
                if ($request->checkbox1 == 'true') {

                    $newMember->view_ads = '1';
                } else if ($request->checkbox1 == 'false') {
                    $newMember->view_ads = '0';
                }
            }
            if ($request->name == 'comments') {
                if ($request->checkbox2 == 'true') {

                    $newMember->comments = '1';
                } else if ($request->checkbox2 == 'false') {
                    $newMember->comments = '0';
                }
            }
            if ($request->name == 'licensure') {
                if ($request->checkbox3 == 'true') {

                    $newMember->licensure = '1';
                } else if ($request->checkbox3 == 'false') {
                    $newMember->licensure = '0';
                }
            }
            $newMember->membertype_id = $id;
            $newMember->save();
        }
        return response()->json(['response' => 'success']);

    }
}
