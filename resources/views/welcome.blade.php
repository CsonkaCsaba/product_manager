@extends('layouts.app')
@section('content')

<<<<<<< HEAD
@if (session()->has('mssg'))
<div class="container">
 <div class="alert alert-info alert-dismissible fade show" role="alert">
 <p class="mssg">{{ session('mssg') }}</p>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
</div>
</div>
@endif

<div class="container">

=======
 <div class="container">
 @if (session()->has('mssg'))
 <div class="alert alert-info" role="alert">
 <p class="mssg">{{ session('mssg') }}</p>
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
@endif

>>>>>>> 555f229791d4095346676c79c52ff2f90b15d635
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Photo</th>
        <th scope="col">Category</th>
        @if (Auth::user())
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        @endif
      </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
         
      <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td><img src="{{$product->photo}}" alt="product photo"  style="height: 100px; width: 150px;"></td>
        <td>{{$product->category->name}}</td>
        @if (Auth::user())
        <td><a href="{{ route('edit', $product->id) }}"><button class="btn btn-primary"><i class="bi bi-pen"></i></button></a></td>

        <form action="{{ route('destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <td><button class="btn btn-primary"><i class="bi-trash3"></i></button></td>
        </form>

        @endif
      </tr>
      @endforeach
   
    </tbody>
  </table>
</div>

@if (Auth::user())
<div class="container">
    <h1>Create a New Product</h1>
    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="form-group mt-2">
        <label for="name">Name:</label>
<<<<<<< HEAD
        <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-group mt-2">
        <label for="description">Description:</label>
        <textarea id="description" name="description" cols="40" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group mt-2">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
=======
        <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group mt-2">
        <label for="description">Description:</label>
        <textarea id="description" name="description" cols="40" rows="5" class="form-control" required></textarea>
        </div>
        <div class="form-group mt-2">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control" required>
>>>>>>> 555f229791d4095346676c79c52ff2f90b15d635
            <option value="1">Women</option>
            <option value="2">Man</option>
            <option value="3">Child</option>
        </select>
        </div>
        <div class="form-group mt-2">
        <input type="file" class="form-control" name="photo">
            
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
        </div>
        <div class="form-group mt-2">
        <input type="submit" value="Create" class="btn btn-primary mt-4 mb-4">
        </div>
    </form>
</div>
@endif
@endsection
