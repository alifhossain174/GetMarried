<?php

namespace App\Http\Controllers;

use App\Models\CustomerExcel;
use App\Models\Order;
use App\Models\SupportTicket;
use App\Models\User;
use App\Models\UserRolePermission;
use App\Models\UserAddress;
use App\Models\UserCard;
use App\Models\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function viewAllSystemUsers(Request $request){
        if ($request->ajax()) {

            $data = User::whereIn('user_type', [1,2])->where('id', '!=', 1)->orderBy('id', 'desc')->get();

            return Datatables::of($data)
                    ->editColumn('created_at', function($data) {
                        return date("Y-m-d h:i:s a", strtotime($data->created_at));
                    })
                    ->editColumn('user_type', function($data) {
                        if($data->user_type == 2){
                            return '<a href="javascript:void(0)" style="background: #090; font-weight: 600;" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Make SuperAdmin" class="btn-sm btn-success rounded makeSuperAdmin">Make SuperAdmin</a>';
                        } else {
                            return '<a href="javascript:void(0)" style="background: #ca0000; font-weight: 600;" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Revoke SuperAdmin" class="btn-sm btn-success rounded revokeSuperAdmin">Revoke SuperAdmin</a>';
                        }
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        if($data->status == 1)
                            $btn = '<input type="checkbox" onchange="changeUserStatus('.$data->id.')" checked data-size="small" data-toggle="switchery" data-color="#53c024" data-secondary-color="#df3554"/>';
                        else
                            $btn = '<input type="checkbox" data-size="small" onchange="changeUserStatus('.$data->id.')" data-toggle="switchery" data-color="#53c024" data-secondary-color="#df3554"/>';
                        $btn .= ' <a href="'.url('/edit/system/user')."/".$data->id.'" class="btn-sm btn-warning rounded"><i class="bi bi-pencil-square"></i></a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Delete" class="btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'user_type'])
                    ->make(true);
        }
        return view('backend.users.system_users');
    }

    public function addNewSystemUsers(){
        return view('backend.users.add_system_user');
    }

    public function createSystemUsers(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],

        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            // 'phone' => $request->phone,
            // 'address' => $request->address,
            'password' => Hash::make($request->password),
            'user_type' => 2,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('New System User Created', 'Successfully Created');
        return redirect('/view/system/users');
    }

    public function deleteSystemUser($id){
        $userInfo = User::where('user_type', 2)->where('id', $id)->first();
        UserRolePermission::where('user_id', $userInfo->id)->delete();
        User::where('id', $id)->delete();
        Toastr::success('System User Deleted', 'Deleted Successfully');
        return back();
    }

    public function editSystemUser($id){
        $userInfo = User::where('id', $id)->first();
        return view('backend.users.edit_system_user', compact('userInfo'));
    }

    public function updateSystemUser(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        User::where('id', $request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'phone' => $request->phone,
            // 'address' => $request->address,
            'user_type' => 2,
            'updated_at' => Carbon::now()
        ]);

        if($request->password){
            User::where('id', $request->user_id)->update([
                'password' => Hash::make($request->password),
            ]);
        }

        Toastr::success('System User Info Updated', 'Successfully Updated');
        return redirect('/view/system/users');
    }

    public function changeUserStatus($id){

        $userInfo = User::where('id', $id)->first();
        $userInfo->status = $userInfo->status == 1 ? 0 : 1;
        $userInfo->updated_at = Carbon::now();
        $userInfo->save();

        return response()->json(['success' => 'Status Changed successfully']);
    }

    public function deleteCustomer($id){
        $userInfo = User::where('user_type', 3)->where('id', $id)->first();
        if($userInfo){

            $orderInfo = Order::where('user_id', $userInfo->id)->get();
            $supports = SupportTicket::where('support_taken_by', $userInfo->id)->get();
            $wishLists = WishList::where('user_id', $userInfo->id)->get();

            if(count($orderInfo) > 0){
                return response()->json(['success' => 'Customer cannot be deleted', 'data' => 0]);
            } else if(count($supports) > 0){
                return response()->json(['success' => 'Customer cannot be deleted', 'data' => 0]);
            } else if(count($wishLists) > 0){
                return response()->json(['success' => 'Customer cannot be deleted', 'data' => 0]);
            } else {
                // delete process start
                UserCard::where('user_id', $userInfo->id)->delete();
                UserAddress::where('user_id', $userInfo->id)->delete();
                $userInfo->delete();
                return response()->json(['success' => 'Customer deleted successfully.', 'data' => 1]);
            }

        } else {
            return response()->json(['success' => 'Customer deleted successfully.', 'data' => 1]);
        }
    }

    public function downloadCustomerExcel(){
        return Excel::download(new CustomerExcel, 'customers.xlsx');
    }

    public function makeSuperAdmin($id){
        $userInfo = User::where('id', $id)->first();
        $userInfo->user_type = 1;
        $userInfo->save();
        Toastr::success('Made SuperAdmin Successfully', 'Successfully Updated');
        return back();
    }

    public function revokeSuperAdmin($id){
        $userInfo = User::where('id', $id)->first();
        $userInfo->user_type = 2;
        $userInfo->save();
        Toastr::error('Revoke SuperAdmin Successfully', 'Successfully Revoked');
        return back();
    }
}
