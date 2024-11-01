<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f5f5f5;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
        }

        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card a {
            display: block;
            padding: 10px;
            background: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .card p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Запрос на подбор вакансии</h1>
        <p>Имя: {{ $details['name'] }}</p>
        <p>Email: {{ $details['email'] }}</p>
    </div>
</body>
</html>
