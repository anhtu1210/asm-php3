<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    const PATH_VIEW = 'admin.banner.';
    const PATH_UPLOAD = 'banner';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Banner::query()->latest('id')->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = Banner::BANNER_TYPE;
        return view(self::PATH_VIEW . __FUNCTION__, compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $data = $request->except('image');

        if($request->hasFile('image')){
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }

        Banner::query()->create($data);
        return redirect()->route('admin.banners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        // dd($banner);
        return view(self::PATH_VIEW . __FUNCTION__, compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        $status = Banner::BANNER_TYPE;
        return view(self::PATH_VIEW . __FUNCTION__, compact('banner', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $data = $request->except('image');

        if($request->hasFile('image')){
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }

        $currentImage = $banner->image;

        $banner->update($data);

        if($currentImage && Storage::exists($currentImage)){
            Storage::delete($currentImage);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        if($banner->image && Storage::exists($banner->image)){
            Storage::delete($banner->image);
        }
        return back();
    }
}
