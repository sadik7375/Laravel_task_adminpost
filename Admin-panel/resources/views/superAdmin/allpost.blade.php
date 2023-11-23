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
        <h2>Admin Posts</h2>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Post Approve</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->username }}</td>
                        <td>{{ $post->date }}</td>
                        <td>{{ $post->description }}</td>
                        <td>  <button onclick="approvePost('{{ $post->id }}')">Approve</button>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

<script>
    function approvePost(postId) {
        // Assuming you have a server-side route to handle post approval
        fetch(`/approve-post/${postId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            // Assuming data.success is true if the approval is successful
            if (data.success) {
                // Optional: Update the UI immediately
                const approveButton = document.querySelector(`button[data-post-id="${postId}"]`);
                approveButton.textContent = 'Approved';
                approveButton.disabled = true;

                // Optional: Redirect to the home page or update the post list
                // window.location.href = '/'; // Redirect to the home page
                // Update the post list dynamically
            } else {
                // Handle approval failure
                alert('Post approval failed.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
