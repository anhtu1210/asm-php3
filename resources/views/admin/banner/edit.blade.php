@extends('admin.layouts.master')

@section('title')
    Edit banner: {{$banner->title}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit banner</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Banner</a></li>
                        <li class="breadcrumb-item active">Edit Banner</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <form action="{{ route('admin.banners.update',$banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Title</label>
                                        <input value="{{$banner->title}}" type="text" class="form-control" name="title" id="name"
                                            placeholder="title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                        <img src="{{\Storage::url($banner->image)}}" width="100px" alt="">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-check form-switch form-switch-primary mt-3">
                                        <input value="{{$banner->is_active}}" class="form-check-input" type="checkbox" role="switch" name="is_active"
                                            id="is_active" checked value="1">
                                        <label class="form-check-label" for="is_active">Is Active</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label for="" class="form-label">Type banner</label>
                                        <select value="{{$banner->type_status}}" class="form-select" name="type_status" id="type_status">
                                            @foreach ($status as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="link" class="form-label">Link</label>
                                        <input value="{{$banner->links}}" type="text" class="form-control" name="links" id="link"
                                            placeholder="link">
                                        @error('links')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="des" class="form-label">Description</label>
                                        <textarea  name="description" id="des" cols="50" rows="3" placeholder="description">{{$banner->description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div><!-- end card header -->
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

    </form>
@endsection
