@extends('layouts.admin')
@section('content')
@php 
var_dump($errors);
@endphp
<main>
    <div class="container-fluid px-4">
        <div class="my-3">
            <h3 class="d-inline my-4">Post EDIT</h3>
            <a href="{{route('backend.posts.index')}}" class="btn btn-outline-danger float-end">Cancel</a>
        </div>
    </div>
    <div class="card p-5">
        <form action="{{route('backend.posts.update',$post->id)}}" method="POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name" value="{{$post->name}}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
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
                        <img src="{{$post->photo}}" alt="" class="w-25 h-25">
                        <input type="hidden" name="old_image" value="{{$post->photo}}">
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
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" class="form-control {{$errors->has('category_id') ? 'is-invalid' : ''}}">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$post->category_id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <div class="invalid-feedback">
                        {{$errors->first('category_id')}}
                    </div>
                @endif
            </div> 
            <div class="mb-3">
                <label for="user_id" class="form-label">Users</label>
                <select name="user_id" class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}">
                    @foreach($users as $user)
                    <option value="{{$user->id}}" {{$post->user_id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <div class="invalid-feedback">
                        {{$errors->first('user_id')}}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">{{$post->description}}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{$errors->first('description')}}
                    </div>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</main>
@endsection