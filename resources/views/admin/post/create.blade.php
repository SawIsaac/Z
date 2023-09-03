@extends('layouts.admin')
@section('content')
@php 
var_dump($errors);
@endphp
<main>
    <div class="container-fluid px-4">
        <div class="my-3">
            <h3 class="d-inline my-4">Post Create</h3>
            <a href="{{route('backend.posts.index')}}" class="btn btn-outline-danger float-end">Cancel</a>
        </div>
    </div>
    <div class="card p-5">
        <form action="{{route('backend.posts.store')}}" method="POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name" >
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>
                @endif
            </div>    
           <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" accept="image/*" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}" name="photo" id="photo" >
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{$errors->first('photo')}}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" class="form-control {{$errors->has('category_id') ? 'is-invalid' : ''}}">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
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
                    <option value="{{$user->id}}">{{$user->name}}</option>
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
                <textarea name="description" id="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}"></textarea>
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