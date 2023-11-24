<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h2>Edit Post</h2>

      <!-- edit-post.blade.php -->

<form action="{{ route('posts.update', ['id' => $post->id]) }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
    </div>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" class="form-control" value="{{ $post->username }}" required>
    </div>

    <!-- Add other form fields as needed -->

    <button type="submit">Update Post</button>
</form>

    </div>
</body>
</html>