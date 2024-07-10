<?php

namespace App\Http\Controllers\Admin\site;

use App\Http\Controllers\Controller;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class StepController extends Controller
{
    public function index()
    {
        $step = Step::query()->get();
        return view('admin.site.step',compact('step'));
    }
    public function getAllData()
    {
        $data = Step::query()->orderBy('id', 'Asc')->select(['id','title', 'title_ar','description','description_ar', 'image','visible'])->simplePaginate(20);
        $data_count = Step::query()->count();
        $data_header = ['id','title', 'title_ar','description','description_ar', 'image','visible']; // Header Table
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
            'description' => 'required|string|min:3|max:200',
            'description_ar' => 'required|string|min:3|max:200',
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
        $desiredOrder = ['id','title', 'title_ar','description','description_ar', 'image','visible']; // Same header Table
        $data = Step::create($input);
        $data_sort = $data->toArray();
        $sortedData = [];

        foreach ($desiredOrder as $key) {
            if (array_key_exists($key, $data_sort)) {
                $sortedData[$key] = $data_sort[$key];  // sort to pass same order data
            }
        }
        $data_count = Step::query()->count();

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
        $step = Step::find($id);

        if (!$step) {
            return response()->json(['message' => 'Step not found'], 404);
        }

        // Transform the data to convert numeric values to boolean for checkbox fields
        $data = $step->toArray();

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
            'description' => 'required|string|min:3|max:200',
            'description_ar' => 'required|string|min:3|max:200',
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

        $find = Step::class::find($id);
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
        $desiredOrder = ['id','title', 'title_ar','description','description_ar', 'image','visible']; // Same header Table
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
            $find = Step::find($id);
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
