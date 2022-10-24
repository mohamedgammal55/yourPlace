<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index(request $request)
    {
        if($request->ajax()) {
            $categories = Category::latest()->get();
            return Datatables::of($categories)
                ->addColumn('action', function ($categories) {
                    return '
                            <button type="button" data-id="' . $categories->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $categories->id . '" data-title="' . $categories->title_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('models',function ($categories){
                    $url = route('models',$categories->id);
                    return '
                    <a href="'.$url.'" class="btn btn-md btn-default">Show Models <i class="fa fa-eye"></i> </a>
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/category/index');
        }
    }


    public function create()
    {
        return view('Admin/category.parts.create');
    }



    public function store(request $request): \Illuminate\Http\JsonResponse
    {
        $inputs = $request->validate([
            'title_ar'      => 'required|max:255|unique:categories,title_ar',
            'title_en'      => 'required|max:255|unique:categories,title_en',
        ],[
            'unique'     => 'This Category Was Added'
        ]);
        if(Category::create($inputs))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }


    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('Admin/category.parts.edit',compact('category'));
    }



    public function update(Request $request)
    {
        $inputs = $request->validate([
            'id'            => 'required',
            'title_ar'      => 'required|max:255|unique:categories,title_ar,'.$request->id,
            'title_en'      => 'required|max:255|unique:categories,title_en,'.$request->id
        ],[
            'unique'     => 'This Category Was Added'
        ]);
        $category = Category::findOrFail($request->id);
        if ($category->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }


    public function destroy($id)
    {
        //
    }

    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return response(['message'=>'Data Deleted Successfully','status'=>200],200);
    }

    public function showModels(request $request,$id){
        if($request->ajax()) {
            $models = SubCategory::where('category_id',$id)->latest()->get();
            return Datatables::of($models)
                ->addColumn('action', function ($models) {
                    return '
                            <button type="button" data-id="' . $models->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $models->id . '" data-title="' . $models->title_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            $category = Category::findOrFail($id);
            return view('Admin/category/subCategory',compact('category'));
        }
    }

    public function createModel($category_id)
    {
        return view('Admin/category.parts.createModel',compact('category_id'));
    }

    public function storeModel(request $request): \Illuminate\Http\JsonResponse
    {
        $inputs = $request->validate([
            'category_id'=> 'required|exists:categories,id',
            'title_ar'   => 'required|max:255',
            'title_en'   => 'required|max:255',
        ]);
        if(SubCategory::create($inputs))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }

    public function editModel($id)
    {
        $model = SubCategory::findOrFail($id);
        return view('Admin/category.parts.editModel',compact('model'));
    }

    public function updateModel(Request $request)
    {
        $inputs = $request->validate([
            'id'            => 'required',
            'title_ar'      => 'required|max:255',
            'title_en'      => 'required|max:255',
        ]);
        $model = SubCategory::findOrFail($request->id);
        if ($model->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }



    public function deleteModel(request $request){
        SubCategory::findOrFail($request->id)->delete();
        return response(['message'=>'Data Deleted Successfully','status'=>200],200);
    }
}
