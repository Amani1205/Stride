<!-- resources/views/role-selection.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Role</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #d8e2e9;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .role-selection {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            text-align: center;
        }
        .role-selection h2 {
            color: #151E4C;
            margin-bottom: 20px;
        }
        .role-selection .btn {
            border: 2px solid #151E4C;
            color: #151E4C;
            background: none;
            margin: 10px 0;
            width: 100%;
            padding: 10px;
        }
        .role-selection .btn:hover {
            background: #151E4C;
            color: #ffffff;
        }
        .role-selection .btn-back {
            background: #151E4C;
            color: #ffffff;
            margin-top: 20px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="role-selection">
    <h2>Pick your role.</h2>
    <a href="{{ route('athlete-register') }}" class="btn">Athlete</a>
    <a href="{{ route('coach-register') }}" class="btn">Coach</a>
    <a href="{{ route('stadium-register') }}" class="btn">Stadium Owner</a>
    <a href="{{ url('/') }}" class="btn btn-back">Back to Home</a>
</div>

</body>
</html>
