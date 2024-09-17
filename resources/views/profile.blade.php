<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <style>
        /* Add any CSS styling you need here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 600px;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info p {
            margin: 10px 0;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>

        <div class="profile-info">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Joined:</strong> {{ $user->created_at->format('F j, Y') }}</p>
        </div>

        <a href="{{ route('logout') }}" class="button">Logout</a>
    </div>
</body>
</html>
