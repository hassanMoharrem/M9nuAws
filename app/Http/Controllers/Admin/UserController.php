<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\LanguageController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{

    public function index()
    {
        $view = 'admin.users.users';
        $parameters = [];
        return parent::indexBase($view , $parameters); // Pass the $view variable to the parent method
    }
    public function getAllDataUser()
    {
        // Fetch data with the required fields
        $data = User::query()->orderBy('id', 'Asc')
            ->select(['id','company_name','company_name_ar','f_name','l_name','f_name_ar','l_name_ar','email','password','description_ar','description','whatsapp','instagram','country','state','phone','plan_expiry','image','background','menu_url','visible'])
            ->simplePaginate(20);

        // Manipulate the collection to add a default password placeholder
        $data->getCollection()->transform(function ($user) {
            $user->password = '********'; // Or any default placeholder value
            return $user;
        });

        // Get the count of users
        $data_count = User::query()->count();

        // Define the headers for the table
        $data_header = ['id','company_name','company_name_ar','f_name','l_name','f_name_ar','l_name_ar','email','password','description_ar','description','whatsapp','instagram','country','state','phone','plan_expiry','image','background','menu_url','visible'];

        // Return the response
        return response()->json([
            'data' => $data,
            'data_header' => $data_header,
            'data_count' => $data_count
        ]);
    }

    public function store()
    {
        $lang = request()->header('Accept-Language') ?? 'en';
        $validator = Validator::make(request()->all(), [
            'company_name' => 'required|string|min:3|max:100',
            'company_name_ar' => 'required|string|min:3|max:100',
            'f_name' => 'required|string|min:3|max:50',
            'l_name' => 'required|string|min:3|max:50',
            'f_name_ar' => 'required|string|min:3|max:50',
            'l_name_ar' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'description_ar' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'whatsapp' => 'nullable|string',
            'instagram' => 'nullable',
            'country' => 'nullable|string',
            'state' => 'nullable',
            'phone' => 'nullable|numeric|unique:users,phone',
            'plan_expiry' => 'nullable|date',
            'image' => 'nullable|image',
            'background' => 'nullable|image',
            'menu_url' => 'nullable|string',
            'visible' => 'nullable',
        ]);
        if ($validator->fails()) {
            $response = [
                'status' => 400,
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json($response, 400);
        }
        $input = request()->all();
        if ($input['visible'] == true) {
            $input['visible'] = 1 ;
        }else if($input['visible'] === null){
            $input['visible'] = 0 ;
        }
        if (isset($input['image'])) {
            $file = $input['image'];
            $input['image'] = $file->store('images', 'public');
        }
        if (isset($input['background'])) {
            $file = $input['background'];
            $input['background'] = $file->store('images', 'public');
        }
        $input['password'] = Hash::make($input['password']);
        $desiredOrder = ['id','company_name','company_name_ar','f_name','l_name','f_name_ar','l_name_ar','email','password','description_ar','description','whatsapp','instagram','country','state','phone','plan_expiry','image','background','menu_url','visible']; // Same header Table
        $data = User::create($input);
        $data_sort = $data->toArray();
        $sortedData = [];

        foreach ($desiredOrder as $key) {
            if (array_key_exists($key, $data_sort)) {
                $sortedData[$key] = $data_sort[$key];  // sort to pass same order data
            }
        }
        $data_count = User::query()->count();

        return response()->json([
            'status' => 200,
            'message' => $lang == 'ar' ? 'تم إنشاء البيانات بنجاح' :'Data Created',
            'success' => true,
            'data' => $sortedData,
            'data_count' => $data_count,
        ]);
    }

    public function show($id)
    {
        $lang = request()->header('Accept-Language') ?? 'en';
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Advantage not found'], 404);
        }

        // Transform the data to convert numeric values to boolean for checkbox fields
        $data = $user->toArray();

        // Assuming 'visible' is the checkbox field
        $checkboxFields = ['visible'];

        foreach ($checkboxFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = (bool)$data[$field];
            }
        }

        return response()->json($data);
    }
    public function showUser($user_id)
    {
        $view = 'admin.users.show';
        $user = User::query()->findOrFail($user_id);
        return view($view,compact('user'));
    }

    public function update(Request $request ,$id){
        $lang = request()->header('Accept-Language') ?? 'en';
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|min:3|max:100',
            'company_name_ar' => 'required|string|min:3|max:100',
            'f_name' => 'required|string|min:3|max:50',
            'l_name' => 'required|string|min:3|max:50',
            'f_name_ar' => 'required|string|min:3|max:50',
            'l_name_ar' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable',
            'description_ar' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'whatsapp' => 'nullable|string',
            'instagram' => 'nullable|string',
            'country' => 'nullable|string',
            'state' => 'nullable',
            'phone' => 'nullable|numeric|unique:users,phone,' . $id,
            'plan_expiry' => 'nullable|date',
            'image' => 'nullable|image',
            'background' => 'nullable|image',
            'menu_url' => 'nullable|string',
            'visible' => 'nullable',
        ]);
        if ($validator->fails()) {
            $response = [
                'status' => 400,
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json($response, 400);
        }

        $find = User::class::find($id);
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
        $desiredOrder = ['id','company_name','company_name_ar','f_name','l_name','f_name_ar','l_name_ar','email','password','description_ar','description','whatsapp','instagram','country','state','phone','plan_expiry','image','background','menu_url','visible']; // Same header Table
        $data_sort = $find->toArray();
        $sortedData = [];

        foreach ($desiredOrder as $key) {
            if (array_key_exists($key, $data_sort)) {
                $sortedData[$key] = $data_sort[$key];  // sort to pass same order data
            }
        }
        return response()->json([
            'status' => 200,
            'message' => $lang == 'ar' ? 'تم تحديث بنجاح' : 'Data updated',
            'success' => true,
            'data' => $sortedData,
        ]);
    }

    public function destroy($id)
    {
        $lang = request()->header('Accept-Language') ?? 'en';
        return parent::destroyBase($id,User::class,$lang); // Pass the $view variable to the parent method
    }
}
