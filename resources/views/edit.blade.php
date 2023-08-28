@extends('layouts.app')
@section('content')

@if (session()->has('mssg'))
<div class="container">
 <div class="alert alert-primary alert-dismissible fade show" role="alert">
 <p class="mssg">{{ session('mssg') }}</p>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
</div>
</div>
@endif
<div class="container">

<h1>Update product</h1>

<form action="/edit" method="POST">
        @csrf 
        <div class="form-group mt-2">
        <input type="hidden" name="id" value="{{$data->id}}">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}">
        </div>
        <div class="form-group mt-2">
        <label for="description">Description:</label>
        <textarea id="description" name="description" cols="40" rows="5" class="form-control">{{ $data->description}}</textarea>
        </div>
        <div class="form-group mt-2">
        <label for="categories_id">Category</label>
        <select name="categories_id" id="categories_id" class="form-control" selected="{{ $data->categories_id}}">
            <option value="1">Women</option>
            <option value="2">Man</option>
            <option value="3">Child</option>
        </select>

        </div>
        <div class="form-group mt-2">
        <input type="submit" value="Update" class="btn btn-primary mt-4 mb-4">
        </div>
    </form>
</div>
@endsection