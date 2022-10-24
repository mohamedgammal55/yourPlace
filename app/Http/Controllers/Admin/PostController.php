<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    use PhotoTrait;
    public function index(request $request)
    {
        if($request->ajax()) {
            $posts = Post::latest()->get();
            return Datatables::of($posts)
                ->addColumn('action', function ($posts) {
                    return '
                            <button type="button" data-id="' . $posts->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $posts->id . '" data-title="' . $posts->title . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('desc', function ($posts){
                    return Str::limit($posts->desc);
                })
                ->editColumn('photo', function ($posts) {
                    return '
                    <img alt="Slider" onclick="window.open(this.src)" style="cursor:pointer" class="avatar avatar-lg bradius cover-image" src="'.getFile($posts->photo).'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/posts/index');
        }
    }


    public function create()
    {
        return view('Admin/posts.parts.create');
    }



    public function store(request $request): \Illuminate\Http\JsonResponse
    {
        $inputs = $request->validate([
            'photo'      => 'required|mimes:jpeg,jpg,png,gif',
            'title'      => 'required',
            'desc'       => 'required',
        ]);
        if($request->has('photo')){
            $file_name = $this->saveImage($request->photo,'assets/uploads/posts');
            $inputs['photo'] = 'assets/uploads/posts/'.$file_name;
        }
        if(Post::create($inputs))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }



    public function edit(Post $post)
    {
        return view('Admin/posts.parts.edit',compact('post'));
    }



    public function update(Request $request)
    {
        $inputs = $request->validate([
            'id'         => 'required',
            'photo'      => 'nullable|mimes:jpeg,jpg,png,gif',
            'title'      => 'required',
            'desc'       => 'required',
        ]);
        $post = Post::findOrFail($request->id);
        if($request->has('photo')){
            if (file_exists($post->photo)) {
                unlink($post->photo);
            }
            $file_name = $this->saveImage($request->photo,'assets/uploads/posts');
            $inputs['photo'] = 'assets/uploads/posts/'.$file_name;
        }
        if ($post->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function delete(Request $request)
    {
        $post = Post::findOrFail($request->id);
        if (file_exists($post->photo)) {
            unlink($post->photo);
        }
        $post->delete();
        return response(['message'=>'Data Deleted Successfully','status'=>200],200);
    }
}
