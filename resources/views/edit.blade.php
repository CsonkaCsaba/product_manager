@extends('layouts.app')
@section('content')

<<<<<<< HEAD
@if (session()->has('mssg'))
<div class="container">
 <div class="alert alert-primary alert-dismissible fade show" role="alert">
 <p class="mssg">{{ session('mssg') }}</p>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif
<div class="container">
=======
<div class="container">
@if (session()->has('mssg'))
 <div class="alert alert-primary" role="alert">
 <p class="mssg">{{ session('mssg') }}</p>
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
@endif
>>>>>>> 555f229791d4095346676c79c52ff2f90b15d635

<h1>Update product</h1>

<form action="/edit" method="POST">
        @csrf 
        <div class="form-group mt-2">
        <input type="hidden" name="id" value="{{$data->id}}">
        <label for="name">Name:</label>
<<<<<<< HEAD
        <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}">
        </div>
        <div class="form-group mt-2">
        <label for="description">Description:</label>
        <textarea id="description" name="description" cols="40" rows="5" class="form-control">{{ $data->description}}</textarea>
        </div>
        <div class="form-group mt-2">
        <label for="categories_id">Category</label>
        <select name="categories_id" id="categories_id" class="form-control" selected="{{ $data->categories_id}}">
=======
        <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}" required>
        </div>
        <div class="form-group mt-2">
        <label for="description">Description:</label>
        <textarea id="description" name="description" cols="40" rows="5" class="form-control" required>{{ $data->description}}</textarea>
        </div>
        <div class="form-group mt-2">
        <label for="categories_id">Category</label>
        <select name="categories_id" id="categories_id" class="form-control" selected="{{ $data->categories_id}}" required>
>>>>>>> 555f229791d4095346676c79c52ff2f90b15d635
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