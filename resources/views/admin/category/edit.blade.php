@extends('layouts.admin')
@section('content')
@php 
var_dump($errors);
@endphp
<main>
    <div class="container-fluid px-4">
        <div class="my-3">
            <h3 class="d-inline my-4">Category EDIT</h3>
            <a href="{{route('backend.categories.index')}}" class="btn btn-outline-danger float-end">Cancel</a>
        </div>
    </div>
    <div class="card p-5">
        <form action="{{route('backend.categories.update',$category->id)}}" method="POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" id="title" value="{{$category->title}}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{$errors->first('title')}}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Image</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                        <img src="{{$category->photo}}" alt="" class="w-25 h-25">
                        <input type="hidden" name="old_image" value="{{$category->photo}}">
                    </div>
                    <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                    <input type="file" accept="image/*" class="form-control {{$errors->has('image') ? 'is-invalid' : ''}}" name="new_image" id="image" >
                        @if($errors->has('image'))
                            <div class="invalid-feedback">
                                {{$errors->first('image')}}
                            </div>
                        @endif
                    </div>
                </div>  
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</main>
@endsection