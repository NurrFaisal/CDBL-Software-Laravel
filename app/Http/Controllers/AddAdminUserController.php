<?php

namespace App\Http\Controllers;

use App\admin\AdminMapper;
use App\admin\AdminType;
use App\admin\Branch;
use App\admin\District;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Image;

class AddAdminUserController extends Controller
{
    public function addNewUsers() {
        $users = User::select('id', 'name', 'mobile_one', 'admin_type')->where('is_admin', 1)->get();
        $districts = District::where('status', 1)->orderBy('name', 'asc')->get();
        $branches = Branch::where('status', 1)->orderBy('name', 'asc')->get();
        $admin_types = AdminType::where('status', 1)->get();
        return view('backEnd.user.new-user-registration', [
            'districts' => $districts,
            'branches' => $branches,
            'admin_types' => $admin_types,
            'users' => $users,
        ]);
    }
    protected function userValidation($request){
        $validator = Validator::make($request->all(), [
            'name'                    => 'required',
            'fathers_name'            => 'required',
            'mothers_name'            => 'required',
            'mobile_two'              => 'required',
            'gender'                  => 'required',
            'nationality'            => 'required',
            'present_address'         => 'required',
            'present_division'        => 'required',
            'present_district'        => 'required',
            'present_post_code'       => 'required',
            'permanent_address'       => 'required',
            'permanent_division'      => 'required',
            'permanent_district'      => 'required',
            'permanent_post_code'     => 'required',
            'last_qualification'      => 'required',
            'employee_id'             => 'required',
            'designation'             => 'required',
            'branch'                  => 'required',
            'admin_type'              => 'required',

        ]);
        return $validator;
    }
    public function userAddValidation($request){
        $validator = Validator::make($request->all(), [
            'last_degree_attachment'  => 'mimes:jpeg,jpg,png,gif|required',
            'photo'                   => 'mimes:jpeg,jpg,png,gif|required',
            'mobile_one'              => 'required|unique:users',
            'email'                   => 'required|unique:users',
            'nid_passport'            => 'required|unique:users',
            'password'                => 'required | confirmed | min:6',
        ]);
        return $validator;
    }
    protected function user_registration_data($user, $request){
        $user->name = $request->name;
        $user->fathers_name = $request->fathers_name;
        $user->mothers_name = $request->mothers_name;
        $user->mobile_one = $request->mobile_one;
        $user->mobile_two = $request->mobile_two;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->nid_passport = $request->nid_passport;
        $user->nationality = $request->nationality;
        $user->present_address = $request->present_address;
        $user->present_division = $request->present_division;
        $user->present_district = $request->present_district;
        $user->present_post_code = $request->present_post_code;
        $user->permanent_address = $request->permanent_address;
        $user->permanent_division = $request->permanent_division;
        $user->permanent_district = $request->permanent_district;
        $user->permanent_post_code = $request->permanent_post_code;
        $user->last_qualification = $request->last_qualification;
        $user->employee_id = $request->employee_id;
        $user->designation = $request->designation;
        $user->branch = $request->branch;
        $user->admin_type = $request->admin_type;
        $user->is_admin = 1;

    }
    public function add_user_registration_data($user, $request, $last_degree_attachment_path, $user_photo_path){
        $user->last_degree_attachment = $last_degree_attachment_path;
        $user->photo = $user_photo_path;
        $user->password = Hash::make($request->password);
    }
    protected function adminMapper($user,$request){
        if($user->admin_type == 4){
            foreach ($request->admin_id as $key => $admin_id){
                if($key == 0){
                    if($admin_id == null){
                        $user_old = User::where('id', $user->id)->first();
                        if(file_exists($user_old->last_degree_attachment)){
                            unlink($user_old->last_degree_attachment);
                        }
                        if(file_exists($user_old->photo)){
                            unlink($user_old->photo);
                        }
                        $user_old->delete();
                        return  false;
                    }
                }
                if($admin_id != null){
                    for ($i = 0; $i < 3; $i++){
                        $admin_mapper = new AdminMapper();
                        $admin_mapper->user_id = $user->id;
                        $admin_mapper->admin_id = $request->admin_id[$i];
                        if($i == 0){
                            $admin_mapper->admin_type = 2;
                        }elseif ($i == 1){
                            $admin_mapper->admin_type = 1;
                        }else{
                            $admin_mapper->admin_type = 3;
                        }
                        $admin_mapper->save();
                    }
                    return true;
                }
            }
        }
    }
    public function addUserRegistration(Request $request){
        $validator = $this->userValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $validator = $this->userAddValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        if($request->admin_type == 4){
            $validator = Validator::make($request->all(), [
                'operation_admin'  => 'required',
                'account_admin'  => 'required',
                'marketing_admin'  => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $last_degree_attachment_path = $this->last_degree_attachment($request);
        $user_photo_path = $this->user_photo($request);
        $user = new User();
        $this->user_registration_data($user, $request);
        $this->add_user_registration_data($user, $request, $last_degree_attachment_path, $user_photo_path);
        if($request->admin_type == 4){
            $user->operation_admin = $request->operation_admin;
            $user->account_admin = $request->account_admin;
            $user->marketing_admin = $request->marketing_admin;
//            $response = $this->adminMapper($user, $request);
//            if ($response == false){
//                return back()->with('message', 'Please Select Operation Admin');
//            }
        }
        $user->save();
        return  back()->with('message', 'This user Successfully Registered');
    }
    public function userUpdate(Request $request){
        $validator = $this->userValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        if($request->passord != ''){
            $validator = Validator::make($request->all(), [
                'password'                => 'required | confirmed | min:6',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $user = User::where('id', $request->id)->first();
        $this->user_registration_data($user, $request);
        if(isset($request->last_degree_attachment)){
            $last_degree_attachment_path = $this->last_degree_attachment($request);
            $user->last_degree_attachment = $last_degree_attachment_path;
        }
        if(isset($request->photo)){
            $user_photo_path = $this->user_photo($request);
            $user->photo = $user_photo_path;
        }
//        $admin_mappers = AdminMapper::where('user_id', $request->id)->get();
//        foreach ($admin_mappers as $admin_mapper){
//            $admin_mapper->delete();
//        }
        if($request->admin_type == 4){
            $validator = Validator::make($request->all(), [
                'operation_admin'  => 'required',
                'account_admin'  => 'required',
                'marketing_admin'  => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $user->operation_admin = $request->operation_admin;
            $user->account_admin = $request->account_admin;
            $user->marketing_admin = $request->marketing_admin;
        }
        $user->update();
        return  back()->with('message', 'This user Successfully Updated');
    }
    protected function last_degree_attachment($request){
        $image = $request->file('last_degree_attachment');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $image_url = 'alhaj/assets/user-image/last-degree-attachment/';
        $image_url_public_path = public_path($image_url);
        Image::make($image)->resize(253, 158)->save($image_url_public_path.$image_name);
        $image_path = $image_url.$image_name;
        return $image_path;
    }
    protected function user_photo($request){
        $image = $request->file('photo');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $image_url = 'alhaj/assets/user-image/photo/';
        $image_url_public_path = public_path($image_url);
        Image::make($image)->resize(253, 158)->save($image_url_public_path.$image_name);
        $image_path = $image_url.$image_name;
        return $image_path;
    }

    public function newRegistration() {
        $users = User::select('id','name', 'email', 'mobile_one', 'employee_id', 'designation',  'gender', 'date_of_birth', 'nationality')
            ->where('is_admin', 1)
            ->where('admin_type', '!=', null)
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('backEnd.user.list-users',['users' => $users]);
    }
    public function userEdit($id) {
        $users = User::select('id', 'name', 'mobile_one', 'admin_type')->where('is_admin', 1)->get();
        $districts = District::where('status', 1)->orderBy('name', 'asc')->get();
        $branches = Branch::where('status', 1)->orderBy('name', 'asc')->get();
        $admin_types = AdminType::where('status', 1)->get();
        $user = User::where('id', $id)->first();
        return view('backEnd.user.user-edit', [
            'user' => $user,
            'branches' => $branches,
            'districts' => $districts,
            'admin_types' => $admin_types,
            'users' => $users
        ]);
    }
    public function userView($id) {
        $user = User::with('get_admin_type', 'get_district_name', 'get_branch_name')->where('id', $id)->first();
//        return $user;
        return view('backEnd.user.user-view', ['user' => $user]);
    }

}
