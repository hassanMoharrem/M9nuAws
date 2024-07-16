<?php

namespace App\Http\Controllers\Admin\site;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class PrivacyController extends Controller
{

    public function indexNew()
    {
        $privacy = Privacy::query()->where('visible',1)->pluck('description')->first();
        $social = Social::query()->where('visible',1)->orderBy('id','Desc')->limit(2)->get();
        return view('user.privacy',compact(['privacy','social']));
    }
    public function index()
    {
        $privacy = Privacy::query()->get();
        return view('admin.site.privacy',compact('privacy'));
    }
    public function getAllData()
    {
        $data = Privacy::query()->orderBy('id', 'Asc')->select(['id','description','visible'])->simplePaginate(20);
        $data_count = Privacy::query()->count();
        $data_header = ['id','description','visible']; // Header Table
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
            'description' => 'required|string|min:3',
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
        $desiredOrder = ['id','description','visible']; // Same header Table
        $data = Privacy::create($input);
        $data_sort = $data->toArray();
        $sortedData = [];

        foreach ($desiredOrder as $key) {
            if (array_key_exists($key, $data_sort)) {
                $sortedData[$key] = $data_sort[$key];  // sort to pass same order data
            }
        }
        $data_count = Privacy::query()->count();

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
        $privacy = Privacy::find($id);

        if (!$privacy) {
            return response()->json(['message' => 'Privacy not found'], 404);
        }

        // Transform the data to convert numeric values to boolean for checkbox fields
        $data = $privacy->toArray();

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
            'description' => 'nullable|string|min:3',
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

        $find = Privacy::class::find($id);
        $data = $request->all();
        // Handle image update
        if ($request->input('visible') === "true") {
            $data['visible'] = 1 ;
        }else if($request->input('visible') === null){
            $data['visible'] = 0 ;
        }
        $find->update($data);
        $desiredOrder = ['id','description','visible']; // Same header Table
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
            $find = Privacy::find($id);
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
