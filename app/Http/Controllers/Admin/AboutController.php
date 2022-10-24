<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\GeneralSetting;
use App\Traits\PhotoTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class AboutController extends Controller
{
    use PhotoTrait;

    public function index(request $request){
        if($request->ajax()) {
            $abouts = AboutUs::latest()->get();
            return Datatables::of($abouts)
                ->addColumn('action', function ($abouts) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $abouts->id . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('photo', function ($abouts) {
                    return '
                    <img alt="photo" onclick="window.open(this.src)" style="cursor:pointer" class="avatar avatar-lg bradius cover-image" src="'.getFile($abouts->photo).'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            $about_text = GeneralSetting::first()->about_us;
            return view('Admin/about/index',compact('about_text'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('Admin.about.parts.create');
    }

    public function store(request $request): \Illuminate\Http\JsonResponse
    {
        $inputs = $request->validate([
            'photo'      => 'required|mimes:jpeg,jpg,png,gif',
        ]);
        if($request->has('photo')){
            $file_name = $this->saveImage($request->photo,'assets/uploads/about');
            $inputs['photo'] = 'assets/uploads/about/'.$file_name;
        }
        if(AboutUs::create($inputs))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    public function delete(request $request){
        $about = AboutUs::findOrFail($request->id);
        if (file_exists($about->photo)) {
            unlink($about->photo);
        }
        $about->delete();
        return response(['message'=>'Data Deleted Successfully','status'=>200],200);
    }

    public function text(request $request){
        $inputs = $request->validate([
            'about_us'      => 'required',
        ]);
        GeneralSetting::first()->update(['about_us' => $inputs['about_us']]);
        return redirect()->back();
    }
}
