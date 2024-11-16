<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        #radioButtons{
            margin: 5px 0 10px 0;
        }

        input[type=text],textarea, select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #016a70;
            color: white;
            padding: 14px 20px;
            margin-top: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #018c94;
        }

        div {
            margin: auto;
            width: 30%;
            border-radius: 5px;
            background-color: #ededed;
            padding: 20px;
            font-family: 'Work Sans', sans-serif;
        }
    </style>
</head>
<body>


<div>
    <form action="{{route('product-save')}}" method="post">
        @csrf
        <label for="Name">Name</label>
        <input type="text" value="{{old('name')}}" id="Name" name="name"  placeholder="Product name...">
        @error('name')
        <p>{{$message}}</p>
        @enderror

        <label for="Price">Price</label>
        <input type="text" value="{{old('price')}}" id="Price" name="price" placeholder="Product price...">
        @error('price')
        <p>{{$message}}</p>
        @enderror

        <label for="Description">Description</label>
        <textarea id="Description" name="description">{{old('description')}}</textarea>
        @error('description')
        <p>{{$message}}</p>
        @enderror

        <input type="submit" value="Submit">
    </form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
