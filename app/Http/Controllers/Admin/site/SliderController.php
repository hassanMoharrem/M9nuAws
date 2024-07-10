<?php

namespace App\Http\Controllers\Admin\site;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;
use App\Models\DessertStation;
use App\Models\Slider;
use App\Models\UpdatePhase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::query()->get();
        return view('admin.site.slider',compact('slider'));
    }
    public function getAllData()
    {
        $data = Slider::query()->orderBy('id', 'Asc')->select(['id','title', 'title_ar', 'image','visible'])->simplePaginate(20);
        $data_count = Slider::query()->count();
        $data_header = ['id','title', 'title_ar', 'image','visible']; // Header Table
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
            'title' => 'required|string|min:3|max:200',
            'title_ar' => 'required|string|min:3|max:200',
            'image' => 'nullable|image',
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
        $desiredOrder = ['id','title', 'title_ar', 'image','visible']; // Same header Table
        $data = Slider::create($input);
        $data_sort = $data->toArray();
        $sortedData = [];

        foreach ($desiredOrder as $key) {
            if (array_key_exists($key, $data_sort)) {
                $sortedData[$key] = $data_sort[$key];  // sort to pass same order data
            }
        }
        $data_count = Slider::query()->count();

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
        $slider = Slider::find($id);

        if (!$slider) {
            return response()->json(['message' => 'Slider not found'], 404);
        }

        // Transform the data to convert numeric values to boolean for checkbox fields
        $data = $slider->toArray();

        // Assuming 'visible' is the checkbox field
        $checkboxFields = ['visible'];

        foreach ($checkboxFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = (bool)$data[$field];
            }
        }

        return response()->json($data);
    }
    public function update(Request $request ,$id){
        $lang = request()->header('Accept-Language') ?? 'en';
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3|max:200',
            'title_ar' => 'required|string|min:3|max:200',
            'image' => 'nullable|image',
            'visible' => 'nullable',
//            'background' => 'nullable|image'
        ]);
        if ($validator->fails()) {
            $response = [
                'status' => 400,
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json($response, 400);
        }

        $find = Slider::class::find($id);
        $data = $request->except('image');
        $old_image = false;
        $old_image2 = false;
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

//        if($request->hasFile('background')){
//            $file = $request->file('background');
//            $data['background'] = $file->store('images','public');
//            $old_image2 = $find->image;
//        }
//
//        if($old_image2) {
//            Storage::disk('public')->delete($old_image2);
//        }
        $find->update($data);
        $desiredOrder = ['id','title', 'title_ar', 'image','visible']; // Same header Table
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
            $find = Slider::find($id);
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
}
