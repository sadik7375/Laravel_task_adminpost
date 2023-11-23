<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal Post Cards</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #6075e2ff;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 1.5em;
        }

        .card-body {
            padding: 20px;
        }

        .post-info {
            margin-bottom: 20px;
        }

        .post-info span {
            margin-right: 10px;
            color: #555;
            font-size: 1.2em;
        }

        .description {
            color: #333;
            font-size: 1.8em;
            line-height: 1.6;
        }

        .navbar {
            background-color: #00a884ff;
            padding: 15px;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="navbar">
        <h1>All Post</h1>
    </div>
    <div class="container">
        @foreach($posts as $post)
            <div class="card">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <div class="post-info">
                        <span><strong>Author:</strong> {{ $post->username }}</span>
                        <span><strong>Date:</strong> {{ $post->date }}</span>
                    </div>
                    <div class="description">
                        {{ $post->description }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
