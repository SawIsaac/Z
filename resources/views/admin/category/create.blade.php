@extends('layouts.admin')
@section('content')
@php 
var_dump($errors);
@endphp
<main>
    <div class="container-fluid px-4">
        <div class="my-3">
            <h3 class="d-inline my-4">Category Create</h3>
            <a href="{{route('backend.categories.index')}}" class="btn btn-outline-danger float-end">Cancel</a>
        </div>
    </div>
    <div class="card p-5">
        <form action="{{route('backend.categories.store')}}" method="POST" enctype="multipart/form-data" >
            {{csrf_field()}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" id="title" >
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{$errors->first('title')}}
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
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</main>
@endsection