@extends('layouts.admin')
@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <div class="my-5">
                        <h1 class="my-4 d-inline">Category</h1>
                        <a href="{{route('backend.categories.create')}}" class="btn btn-primary float-end">Add Category</a>
                    </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead> 
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="item_tbody">
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->title}}</td>
                                            <td><img src="{{$category->photo}}" alt="" class="w-25"></td>
                                            
                                            <td><a href="{{route('backend.categories.edit',$category->id)}}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{$category->id}}"><i class="fa-solid fa-trash fa-2x"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<div class="modal" tabindex="-1" id="deletModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Are you sure delet?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="" method="POST" id="deleteForm">
            {{csrf_field()}}
            {{method_field('delete')}}
            <button type="submit" class="btn btn-primary">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script') 
    <script>
        $(document).ready(function(){
            $('#item_tbody').on('click','.delete',function(){
                let id = $(this).data('id');
                $('#deleteForm').prop('action','categories/'+id);
                $('#deletModal').modal('show');
            })
        })
    </script>
@endsection