<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
        <h2>Admin All Posts</h2>
        <a href="{{ route('superadmin') }}" class="btn btn-primary">Add Admin</a>
 
    </div>
        

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Post Approve</th>
                    <th>Post Cancel</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->username }}</td>
                        <td>{{ $post->date }}</td>
                        <td>{{ $post->description }}</td>
                        
                        <td>  <form id="approveForm_{{ $post->id }}" action="{{ route('approve-post', ['id' => $post->id]) }}" method="post">
        @csrf
        <button type="submit" onclick="return confirm('Are you sure you want to approve this post?')">Approve Post</button>
    </form>
                        </td>

                        <td>  <form id="approveForm_{{ $post->id }}" action="{{ route('cancel-post', ['id' => $post->id]) }}" method="post">
        @csrf
        <button type="submit" onclick="return confirm('Are you sure you want to cancel this post?')">Cancel Post</button>
    </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>


