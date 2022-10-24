<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class CarController extends Controller
{
    public function index(Request $request)
    {


        $cars       = Car::with('data','owner');
        $count      = Car::all()->count();
        $categories = Category::all();


        if ($request->has('year') && $request->get('year') != ''){
            $cars->wherehas('data',function($query)use($request)
            {
                $query->where('value',$request->year)->where('key','سنة الصنع');
            });
        }

        if ($request->has('status') && $request->get('status') != ''){
            $cars->wherehas('data',function($query)use($request)
            {
                    $query->where('value',$request->status)->where('key','الحالة');
            });
        }

        if ($request->has('motion_vector') && $request->get('motion_vector') != ''){
            $cars->wherehas('data',function($query)use($request)
            {
                $query->where('value',$request->motion_vector)->where('key','ناقل الحركة');
            });
        }

        if ($request->has('min_price') && $request->has('max_price')){
            $cars->whereBetween('price',[$request->min_price,$request->max_price]);
        }

        if ($request->has('categories') && is_array($request->categories))
        {
            $cars->wherein('category_id',$request->categories);
        }else{
            $request->categories = [];
        }
        $data = $cars->get();
        foreach ($data as $car){
            $car['distance'] = $this->distance(user()->user()->latitude,user()->user()->longitude,$car->owner->latitude,$car->owner->longitude,'K');
            $car['category'] = Category::find($car->category_id);
            $car['sub_category'] = SubCategory::find($car->sub_category_id);
        }
        $data = $data->toArray();
        if ($request->has('nearest') && $request->get('nearest') != ''){

          usort($data, function (array $a, array $b) { return $a['distance'] - $b['distance']; });
        }

        $cars = collect($data);
//        return $cars;



        return view('site.cars',compact('cars','count','categories','request'));
    }

    public function details($id,Request $request)
    {
        $car = Car::with('data', 'category', 'sub_category', 'images')
            ->find($id);
//        return  $car;

        $addresses = UserAddress::where('user_id', user()->id())->get();
        return view('site.car-details', compact('car','addresses','request'));
    }//end fun

    ////////fillter function /////////
    private function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);
            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
}//end class
