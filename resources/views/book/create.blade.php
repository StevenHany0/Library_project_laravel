<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            text-align: left;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            width: 100%;
        }
        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create a New Book</h1>

       

        <form action="/books/store" method="post">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="name" value="{{ old('title') }}">

            <label for="description">Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>

            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}">

            <label for="author">Author:</label>
            <input type="text" name="author" value="{{ old('author') }}">

            <button type="submit">Create Book</button>
        </form>
    </div>
</body>
</html>
