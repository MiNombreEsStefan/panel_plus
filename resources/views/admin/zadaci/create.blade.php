<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Kreiranje zadatka</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e5e5e5;
        }

        .wrap {
            padding: 60px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .logo span {
            color: #3b82f6;
        }

        h1 {
            margin-bottom: 20px;
        }

        .form-box {
            max-width: 420px;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input, textarea {
            width: 100%;
            padding: 6px;
            border: 1px solid #aaa;
            background: #fff;
        }

        .pp-btn {
            margin-top: 15px;
            padding: 6px 16px;
            background: #3b82f6;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="wrap">

    <div class="logo">Panel<span>Plus</span></div>

    <h1>Kreiranje zadatka</h1>

    <div class="form-box">
        <form method="POST" action="{{ route('admin.zadaci.store') }}">
            @csrf

            <label>Naziv</label>
            <input type="text" name="naslov" required>

            <label>Lokacija</label>
            <input type="text" name="lokacija" required>

            <label>Opis</label>
            <textarea name="opis" rows="4" required></textarea>

            <button class="pp-btn">Napravi</button>
        </form>
    </div>

</div>

</body>
</html>
