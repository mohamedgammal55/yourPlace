<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarData;
use App\Models\CarImages;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class CarsController extends Controller
{
    use PhotoTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cars = Car::with('category','sub_category')->where(function ($query){
            if (loggedAdmin('role') == 'company')
                $query->where('added_by',admin()->id());
        })->latest()->get();
        if ($request->ajax())
        {
            return Datatables::of($cars)
                ->addColumn('action', function ($car) {
                    return '
                      <button class="btn btn-pill btn-info-light editBtn"
                                    data-id="' . $car->id . '">
                                    <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $car->id . '">
                                    <i class="fas fa-trash"></i>
                            </button>

                       ';
                })
                ->addColumn('images', function ($car) {
                    return '
                            <button class="btn btn-pill btn-success-light imagesBtn"
                                    data-id="' . $car->id . '">
                                    <i class="fas fa-images"></i>
                            </button>
                       ';
                })
                ->addColumn('category', function ($car) {
                    return $car->category->title_ar??'';
                })
                ->addColumn('sub_category', function ($car) {
                    return $car->sub_category->title_ar??'';
                })
                ->editColumn('image', function ($car) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" style="cursor:pointer" class="cover-image" src="'.getFile($car->image).'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.cars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('subCategory')
            ->latest()->get();
        return view('Admin.cars.parts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|image',
            'description'=>'required',
            'price'=>'required',
            'key'=>'required|array',
            'value'=>'required|array',
            'category_id'=>'required|exists:categories,id',
            'sub_category_id'=>['required',Rule::exists('sub_categories','id')
            ->where('category_id',$request->category_id)],
        ]);

        $createData = $request->only('description','price','category_id','sub_category_id');

        if ($request->hasFile('image'))
        {
            $file_name = $this->saveImage($request->image,'assets/uploads/cars');
            $createData['image'] = 'assets/uploads/cars/'.$file_name;
        }
        $store = Car::create($createData);

        foreach ($request->key as $key=>$item)
        {
            if ($item && $request->value[$key])
            {
                $createDataArray = [];
                $createDataArray['car_id'] = $store->id;
                $createDataArray['key'] = $item??'';
                $createDataArray['value'] = $request->value[$key]??'';
                CarData::create($createDataArray);
            }
        }
        return response()->json(['status'=>200]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images = CarImages::where('car_id', $id)->get();
        return view('Admin.cars.parts.images',compact('images','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::with('subCategory')
            ->latest()->get();
        $find = Car::with('category','sub_category','data')
            ->findOrFail($id);
        $subCategories = SubCategory::where('category_id',$find->category_id)
            ->latest()->get();

        return view('Admin.cars.parts.edit',compact('categories','find','subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image'=>'nullable|image',
            'description'=>'required',
            'price'=>'required',
            'key'=>'required|array',
            'value'=>'required|array',
            'category_id'=>'required|exists:categories,id',
            'sub_category_id'=>['required',Rule::exists('sub_categories','id')
                ->where('category_id',$request->category_id)],
        ]);

        $updateData = $request->only('description','price','category_id','sub_category_id');

        if ($request->hasFile('image'))
        {
            $file_name = $this->saveImage($request->image,'assets/uploads/cars');
            $updateData['image'] = 'assets/uploads/cars/'.$file_name;
        }
        Car::findorFail($id)->update($updateData);

        CarData::where('car_id', $id)->delete();
        foreach ($request->key as $key=>$item)
        {
            if ($item && $request->value[$key])
            {
                $createDataArray = [];
                $createDataArray['car_id'] = $id;
                $createDataArray['key'] = $item??'';
                $createDataArray['value'] = $request->value[$key]??'';
                CarData::create($createDataArray);
            }
        }
        return response()->json(['status'=>200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $car = Car::with('images')->findOrFail($request->id);
        if (file_exists($car->image)) {
            unlink($car->image);
        }

        foreach($car->images as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
        }

        $car->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }//end fun
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function carsStoreImages(Request $request,$id)
    {
        $request->validate([
            'images' =>'required|array',
        ]);
        $storeData = 0;
        foreach($request->images as $image)
        {
            $mime =  mime_content_type($image);
            $img = str_replace("data:{$mime};base64,", '', $image);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $ext = str_replace('image/','',$mime);
            $name = time().base64_encode(time().uniqid()).".{$ext}";
            $filename = "assets/uploads/cars/{$name}";
            file_put_contents($filename, $data);
            $storeData = [];

            $storeData['image'] = $filename;
            $storeData['car_id'] = $id;
            CarImages::create($storeData);
        }
        return response()->json(['status' => 200, 'url' => route('cars.show',$id)]);
    }//end fun

    public function carsDeleteImage($id)
    {
        $find = CarImages::findOrFail($id);
        if (file_exists($find->image)) {
            unlink($find->image);
        }
        $find->delete();
        return response()->json(['status' => 200, 'url' => route('cars.show',$find->car_id)]);

    }

}//end class
