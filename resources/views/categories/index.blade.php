<?php 


?>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <div class="row">
                        <div class="col">
                            <h3>List of available categories</h3>
                        </div>
                        <div class="col">
                            <a href="#" data-toggle="modal" data-target="#create" class="btn btn-success float-right"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead> 
                            <tr>
                                <th scope="col"># ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <th>{{$category->name}}</th>
                                    <th>
                                        <div class="btn-group">
                                            <a href="#" data-toggle="modal" data-target="#categoryedit{{$category->id}}" class="btn btn-success"><i class="fa fa-edit"></i> edit</a>
                                            <a href="#" data-target="#categorydelete{{$category->id}}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i> del</a>
                                        </div>
                                    </th>
                                </tr>

                            <!-- modal for editing categories -->
                            <div class="modal right fade" id="categoryedit{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title success" id="exampleModalLabel"><i class="fa fa-edit"></i>Update {{$category->name}} Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('categories.update',$category->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$category->name) }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Update Category
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                         </div>
                <!-- end of the modal -->

                <!-- modal for deleting category -->
                <div class="modal right fade" id="categorydelete{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title success" id="exampleModalLabel"><i class="fa fa-trash"></i>Delete {{$category->name}} Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('categories.destroy',$category->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <h5 class="text-danger">Are you sure you want to delete {{$category->name}} ???</h5>
                                                
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-danger">
                                                            Delete Category
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                         </div>
                <!-- end of the modal -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- model fo creating a category -->
<!-- Modal -->
<div class="modal right fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title success" id="exampleModalLabel"><i class="fa fa-plus"></i>Add New Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
      <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Add Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end of creation modal -->

<style>
    .modal.right .modal-dialog{
        top: 0;
        right: 0;
        margin-right: 0;
    }
    .modal-header{
       
        background-color: #6f42c1;
    }
    h5{
        margin-right: auto;
        margin-left: auto;
        color: #fff;
        padding: 5px;
    }
</style>
@endsection