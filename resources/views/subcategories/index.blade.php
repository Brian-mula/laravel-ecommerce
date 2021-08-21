<?php

use App\Models\Category;

$categories=Category::all();

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
                            <h3>List of Available subcategories</h3>
                        </div>
                        <div class="col">
                            <a href="#" data-toggle="modal" data-target="#createsubcategory" class="btn btn-success float-right" data-bs-toggle="tooltip" data-bs-placement="top" title="Create a subcategory"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th># ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $key=>$subcategory)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$subcategory->category->name}}</td>
                                <td>{{$subcategory->name}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" data-target="#editsubcategory{{$subcategory->id}}" data-toggle="modal" class="btn btn-success"><i class="fa fa-edit"></i>edit</a>
                                        <a href="#" data-target="#subcategorydelete{{$subcategory->id}}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i>del</a>
                                    </div>
                                </td>
                            </tr>

                            <!-- modal for editing subcategories -->
                            <div class="modal right fade" id="editsubcategory{{$subcategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title success" id="exampleModalLabel"><i class="fa fa-edit"></i>Edit {{$subcategory->name}} SubCategory</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">
                                <div class="card">
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('subcategories.update',$subcategory->id) }}">
                                                @csrf
                                                    @method('PUT')
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $subcategory->name) }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category name') }}</label>

                                                    <div class="col-md-6">
                                                    <select name="category_id" class="form-control" aria-label="Default select example">
                                                        <option selected>select category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                                        @endforeach
                                                        </select>
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
                                                            Update SubCategory
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

                            <!-- modal for deleting subcategory -->
                            <div class="modal right fade" id="subcategorydelete{{$subcategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title success" id="exampleModalLabel"><i class="fa fa-trash"></i>Delete {{$subcategory->name}} subCategory</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('subcategories.destroy',$subcategory->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <h5 class="text-danger">Are you sure you want to delete {{$subcategory->name}} ???</h5>
                                                
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-danger">
                                                            Delete SubCategory
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

<!-- model for creating a new subcategory -->
<div class="modal right fade" id="createsubcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title success" id="exampleModalLabel"><i class="fa fa-plus"></i>Add New SubCategory</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
      <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('subcategories.store') }}">
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
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category name') }}</label>

                        <div class="col-md-6">
                        <select name="category_id" class="form-control" aria-label="Default select example">
                            <option selected>select category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
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
                                Create SubCategory
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
