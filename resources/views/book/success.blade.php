<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="main.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .success-container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #28a745;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .checkmark {
            font-size: 50px;
            color: #28a745;
            animation: pop 0.5s ease-in-out;
        }
        @keyframes pop {
            0% { transform: scale(0.5); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .back-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            font-size: 16px;
            color: white;
            background: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .back-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="checkmark">✔️</div>
        <h1>Book Created Successfully!</h1>
        <a href="/" class="back-btn">Go to Home</a>
    </div>
</body>
</html>
