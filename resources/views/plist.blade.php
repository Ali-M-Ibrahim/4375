<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>HTML Table</h2>
<a href="{{route('product-add')}}">Add Product</a>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    @foreach($data as $obj)
        <tr>
            <td>{{$obj->id}}</td>
            <td>{{$obj->name}}</td>
            <td>{{$obj->price}}</td>
            <td>{{$obj->description}}</td>
            <td>
                <a href="{{route('product-view',['id'=>$obj->id])}}">View</a>
                <a href="{{route('product-edit',['id'=>$obj->id])}}">Edit</a>
                <a href="{{route('product-delete',['id'=>$obj->id])}}">Delete</a>
                <form action="{{route('product-delete2',['id'=>$obj->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete" />
                </form>


            </td>
        </tr>
    @endforeach

</table>

</body>
</html>
