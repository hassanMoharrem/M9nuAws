<?php

namespace App\Http\Controllers\Admin\site;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AdvantageController extends Controller
{
    public function index()
    {
        $advantage = Advantage::query()->get();
        return view('admin.site.advantage',compact('advantage'));
    }
    public function getAllData()
    {
        $data = Advantage::query()->orderBy('id', 'Asc')->select(['id','title', 'title_ar','icon','description', 'description_ar','visible'])->simplePaginate(20);
        $data_count = Advantage::query()->count();
        $data_header = ['id','title', 'title_ar','icon','description', 'description_ar','visible']; // Header Table
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
            'icon' => 'nullable|string',
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
        $desiredOrder = ['id','title', 'title_ar','icon','description', 'description_ar','visible']; // Same header Table
        $data = Advantage::create($input);
        $data_sort = $data->toArray();
        $sortedData = [];

        foreach ($desiredOrder as $key) {
            if (array_key_exists($key, $data_sort)) {
                $sortedData[$key] = $data_sort[$key];  // sort to pass same order data
            }
        }
        $data_count = Advantage::query()->count();

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
        $advantage = Advantage::find($id);

        if (!$advantage) {
            return response()->json(['message' => 'Advantage not found'], 404);
        }

        // Transform the data to convert numeric values to boolean for checkbox fields
        $data = $advantage->toArray();

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
            'icon' => 'nullable',
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

        $find = Advantage::class::find($id);
        $data = $request->all();
        if ($request->input('visible') === "true") {
            $data['visible'] = 1 ;
        }else if($request->input('visible') === null){
            $data['visible'] = 0 ;
        }
        $find->update($data);
        $desiredOrder = ['id','title', 'title_ar','icon','description', 'description_ar','visible']; // Same header Table
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
            $find = Advantage::find($id);
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
