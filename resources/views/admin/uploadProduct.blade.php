

@extends('admin.container')
@section('content')
<h1 style="color:white;padding-top:25px;font-size:28px;" >Add Product</h1>
@if (session()->has('message'))
<div class="alert alert-dismissable alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>
        {!! session()->get('message') !!}
    </strong>
</div>
@endif
<form method="POST" action="{{ url('addProduct') }}" enctype="multipart/form-data">
@csrf
<div style="padding: 15px;">
 <label style="width: 200px">Product Title</label>
 <input style="color: black"  type="text" name="title" placeholder="product title" required>
</div>

<div style="padding: 15px;">
 <label style="width: 200px">Price</label>
 <input style="color: black" type="number" name="price" placeholder="Price" required>
</div>
<div style="padding: 15px;">
 <label style="width: 200px">Description</label>
 <input style="color: black" type="text" name="desc" placeholder="Description" required>
</div>

<div style="padding: 15px;">
 <label style="width: 200px">Quantity</label>
 <input style="color: black" type="number" name="quantity" placeholder="Quantity" required>
</div>

<div style="padding: 15px;">
 <input  type="file" name="img" required>
</div>
<div style="padding: 15px;">
 <input class="btn btn-success" type="submit" name="submit">
</div>
</form>
@endsection




