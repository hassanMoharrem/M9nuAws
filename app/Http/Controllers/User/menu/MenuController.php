<?php

namespace App\Http\Controllers\User\menu;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class MenuController extends Controller
{
    public function index($name)
    {
        $user = User::query()->where('visible', '=', 1)->where('menu_url', $name)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $menuUrl = url('/').'/'.$user->menu_url;
        // Generate QR Code
        $qrCode = QrCode::size(200)->generate($menuUrl);

        // Get all categories for the user where visible = 1
        $categories = Category::query()
            ->where('user_id', '=', $user->id)
            ->where('visible', '=', 1)
            ->get();

        // Loop through each category to get the visible products
        $categoriesWithProducts = $categories->map(function ($category) {
            $category->products = $category->products()->where('visible', '=', 1)->get();
            return $category;
        });

        return view('user.menu.show', compact('user', 'categoriesWithProducts','qrCode'));
    }
    public function getAllData()
    {
        $user_id = \request()->header('_id');
        // Fetch data with the required fields
        $data = Category::query()->where('user_id',$user_id)->orderBy('id', 'DESC')
            ->select(['id','name','name_ar','visible'])
            ->paginate(10);
        // Get the count of users

        // Define the headers for the table
        $data_header = ['id','Name','Name Arabic','Visible'];

        // Return the response
        return response()->json([
            'data' => $data,
            'data_header' => $data_header,
        ]);
    }
    public function getAllDataProduct($id)
    {
        // Fetch data with the required fields
        $data = Product::query()->where('category_id',$id)->orderBy('id', 'Asc')
            ->get();
        $data_count = Product::query()->where('category_id',$id)->count();
        // Return the response
        return response()->json([
            'data' => $data,
            'data_count' => $data_count
        ]);
    }
    public function storeProduct()
    {
        $lang = request()->header('Accept-Language') ?? 'en';
        $category_id = \request()->header('_id');
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|min:3|max:200',
            'name_ar' => 'nullable|string|min:3|max:200',
            'description' => 'nullable|string|min:3|max:200',
            'description_ar' => 'nullable|string|min:3|max:200',
            'image' => 'nullable|image',
            'price' => 'required',
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
        if (isset($input['image'])) {
            $file = $input['image'];
            $input['image'] = $file->store('images', 'public');
        }
        if ($input['visible'] == true) {
            $input['visible'] = 1 ;
        }else if($input['visible'] === null){
            $input['visible'] = 0 ;
        }
        $input['category_id'] = $category_id;
        $data = Product::create($input);
        $data_count = Product::query()->where('category_id',$category_id)->count();

        return response()->json([
            'status' => 200,
            'message' => $lang == 'ar' ? 'تم إنشاء البيانات بنجاح' :'Data Created',
            'success' => true,
            'data' => $data,
            'data_count' => $data_count,
        ]);
    }
    public function userIndex()
    {
        $user = User::query()->where('id',auth()->id())->first();
        $menuUrl = url('/').'/'.$user->menu_url;
        // Generate QR Code
        $qrCode = QrCode::size(200)->generate($menuUrl);

        return view('user.menu.create',compact(['user','qrCode']));
    }
    public function store()
    {
        $lang = request()->header('Accept-Language') ?? 'en';
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|min:3|max:200',
            'name_ar' => 'nullable|string|min:3|max:200',
//            'image' => 'nullable|image',
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
//        if (isset($input['image'])) {
//            $file = $input['image'];
//            $input['image'] = $file->store('images', 'public');
//        }
        if ($input['visible'] == true) {
            $input['visible'] = 1 ;
        }else if($input['visible'] === null){
            $input['visible'] = 0 ;
        }
        $input['user_id'] = $input['sub_id'];
        $desiredOrder = ['id','name', 'name_ar','visible']; // Same header Table
        $data = Category::create($input);
        $data_sort = $data->toArray();
        $sortedData = [];

        foreach ($desiredOrder as $key) {
            if (array_key_exists($key, $data_sort)) {
                $sortedData[$key] = $data_sort[$key];  // sort to pass same order data
            }
        }
        $data_count = Category::query()->count();

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
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Transform the data to convert numeric values to boolean for checkbox fields
        $data = $category->toArray();

        // Assuming 'visible' is the checkbox field
        $checkboxFields = ['visible'];

        foreach ($checkboxFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = (bool)$data[$field];
            }
        }

        return response()->json($data);
    }
    public function showCategory($category_id)
    {
        $view = 'admin.categories.show';
        $category = Category::query()->findOrFail($category_id);
        return view($view,compact('category'));
    }
    public function showProduct($id)
    {
        $lang = request()->header('Accept-Language') ?? 'en';
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Transform the data to convert numeric values to boolean for checkbox fields
        $data = $product->toArray();

        // Assuming 'visible' is the checkbox field
        $checkboxFields = ['visible'];

        foreach ($checkboxFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = (bool)$data[$field];
            }
        }

        return response()->json($data);

    }
    public function updateProduct(Request $request ,$id){
        $lang = request()->header('Accept-Language') ?? 'en';
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:200',
            'name_ar' => 'nullable|string|min:3|max:200',
            'description' => 'nullable|string|min:3|max:200',
            'description_ar' => 'nullable|string|min:3|max:200',
            'image' => 'nullable|image',
            'price' => 'required',
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

        $find = Product::class::find($id);
        $data = $request->except('image');
        $old_image = false;
        // Handle image update
        if($request->hasFile('image')){
            $file = $request->file('image');
            $data['image'] = $file->store('images','public');
            $old_image = $find->image;
        }
        if ($request->input('visible') === "true") {
            $data['visible'] = 1 ;
        }else if($request->input('visible') === null){
            $data['visible'] = 0 ;
        }

        if($old_image) {
            Storage::disk('public')->delete($old_image);
        }
        $find->update($data);
        $data = Product::query()->where('id',$id)->first();
        return response()->json([
            'status' => 200,
            'message' => $lang == 'ar' ? 'تم تحديث بنجاح' : 'Data updated',
            'success' => true,
            'data' => $data,
            'id' => $id,
        ]);
    }
    public function update(Request $request ,$id){
        $lang = request()->header('Accept-Language') ?? 'en';
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:200',
            'name_ar' => 'nullable|string|min:3|max:200',
//            'image' => 'nullable|image',
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

        $find = Category::class::find($id);
        $data = $request->all();
//        $old_image = false;
        // Handle image update
//        if($request->hasFile('image')){
//            $file = $request->file('image');
//            $data['image'] = $file->store('images','public');
//            $old_image = $find->image;
//        }
        if ($request->input('visible') === "true") {
            $data['visible'] = 1 ;
        }else if($request->input('visible') === null){
            $data['visible'] = 0 ;
        }

//        if($old_image) {
//            Storage::disk('public')->delete($old_image);
//        }
        $find->update($data);
        $desiredOrder = ['id','name', 'name_ar', 'image','visible']; // Same header Table
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
        try {
            $find = Category::find($id);
            $find->delete();
            return response()->json([
                'status' => 200,
                'message' => $lang == 'ar' ? 'تم الحذف بنجاح' : 'Data deleted',
                'success' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $lang == 'ar' ? 'خطأ' : 'Error',
                'success' => false,
            ]);
        }
    }
    public function destroyProduct($id)
    {
        $lang = request()->header('Accept-Language') ?? 'en';
        $category_id = request()->header('category_id');
        $data_count = Product::query()->where('category_id',$category_id)->count();
        try {
            $find = Product::find($id);
            $find->delete();
            return response()->json([
                'status' => 200,
                'message' => $lang == 'ar' ? 'تم الحذف بنجاح' : 'Data deleted',
                'success' => true,
//                'data_count'=>$data_count
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $lang == 'ar' ? 'خطأ' : 'Error',
                'success' => false,
            ]);
        }
    }
}
