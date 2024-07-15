<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Base\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends BaseController
{

    public function index()
    {
        $user = User::query()->where('id',auth()->id())->first();

        return view('user.profile',compact('user'));
    }
    public function show()
    {
        $lang = request()->header('Accept-Language') ?? 'en';
        $user = User::query()->where('id',auth()->id())->first();
        if (!$user) {
            return response()->json([
                'status' => 403,
                'message' => $lang == 'ar' ? 'يرجى تسجيل الدخول' : 'You are not authorized',
                'success' => false
            ], 403);
        }
        return response()->json($user);

    }
    public function update(Request $request){
        $lang = request()->header('Accept-Language') ?? 'en';
        $email = request()->header('email');
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|string|min:3|max:50',
            'l_name' => 'required|string|min:3|max:50',
            'f_name_ar' => 'required|string|min:3|max:50',
            'l_name_ar' => 'required|string|min:3|max:50',
            'password' => 'nullable',
            'description_ar' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'whatsapp' => 'nullable|string',
            'instagram' => 'nullable|string',
            'country' => 'nullable|string',
            'state' => 'nullable',
//            'phone' => 'nullable|numeric|unique:users,phone,' . auth()->id(),
            'image' => 'nullable|image',
            'background' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            $response = [
                'status' => 400,
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json($response, 400);
        }

        $find = User::query()->where('email',$email)->first();
        $data = $request->except('image','background','password');
        $old_image = false;
        $old_background = false;
        // Handle image update
        if($request->hasFile('image')){
            $file = $request->file('image');
            $data['image'] = $file->store('images','public');
            $old_image = $find->image;
        }
        if($request->hasFile('background')){
            $file = $request->file('background');
            $data['background'] = $file->store('images','public');
            $old_background = $find->background;
        }
        if ($request->has('password') && !empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
        if($old_image) {
            Storage::disk('public')->delete($old_image);
        }
        if($old_background) {
            Storage::disk('public')->delete($old_background);
        }
        if ($request->input('visible') === "true") {
            $data['visible'] = 1 ;
        }else if($request->input('visible') === null){
            $data['visible'] = 0 ;
        }
        $find->update($data);
        $data = User::query()->where('email',$email)->first();
        return response()->json([
            'status' => 200,
            'message' => $lang == 'ar' ? 'تم تحديث بنجاح' : 'Data updated',
            'success' => true,
            'data' => $data,
        ]);
    }
}
