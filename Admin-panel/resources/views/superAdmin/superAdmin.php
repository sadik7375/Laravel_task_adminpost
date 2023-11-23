<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #3490dc;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        text-decoration: none;
        color: red;
        margin-left:  30px;
        margin-right:  30px;
        margin-top:  60px;
    
        
    }

    a:hover {
        text-decoration: underline;
    }

    input[type="submit"] {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 6px 10px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #bd2130;
    }
    .navbar {
            background-color: #00a884ff;
            padding: 15px;
            color: #fff;
            text-align: center;
        }
</style>

<body>
    <div></div>

    <h1>Admin data</h1>
  
    <div>
    <div>
           <!-- <button><a href="{{route('product.create')}}">Add Product</a></button> -->
        </div>
        @if(count($admins) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Admin Name</th>
                <th>User Name</th>
                <!-- Add other headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->admin_name }}</td>
                    <td>{{ $admin->user_name }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No admin data available.</p>
@endif


    </div>
</body>
</html>