<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Izmena zadatka</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e5e5e5;
        }

        .pp-header {
            display: flex;
            justify-content: space-between;
            padding: 20px 40px;
        }

        .pp-logo {
            font-size: 22px;
            font-weight: bold;
        }

        .pp-logo span {
            color: #3b82f6;
        }

        .pp-container {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .admin-form {
            width: 600px;
            background: #f5f5f5;
            padding: 30px;
            border-radius: 6px;
            box-shadow: 0 0 0 1px #ccc;
        }

        .admin-form h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .admin-form label {
            display: block;
            font-weight: bold;
            margin-top: 15px;
        }

        .admin-form input,
        .admin-form textarea,
        .admin-form select {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            border: 1px solid #bbb;
            border-radius: 4px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .admin-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .btn {
            padding: 10px 18px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            border: none;
        }

        .btn-save {
            background: #22c55e;
        }

        .btn-save:hover {
            background: #16a34a;
        }

        .btn-back {
            background: #6b7280;
        }

        .btn-back:hover {
            background: #4b5563;
        }
    </style>
</head>
<body>

<header class="pp-header">
    <div class="pp-logo">Panel<span>Plus</span></div>
</header>

<div class="pp-container">
    <form method="POST"
          action="{{ route('admin.zadaci.update', $zadatak) }}"
          class="admin-form">

        @csrf
        @method('PUT')

        <h2>Izmena zadatka</h2>

        <label>Naziv</label>
        <input type="text" name="naslov" value="{{ old('naslov', $zadatak->naslov) }}" required>

        <label>Lokacija</label>
        <input type="text" name="lokacija" value="{{ old('lokacija', $zadatak->lokacija) }}" required>

        <label>Opis</label>
        <textarea name="opis">{{ old('opis', $zadatak->opis) }}</textarea>

        <label>Status</label>
        <select name="status">
            <option value="U toku" @selected($zadatak->status === 'U toku')>U toku</option>
            <option value="Završeno" @selected($zadatak->status === 'Završeno')>Završeno</option>
        </select>

        <div class="admin-actions">
            <a href="{{ route('admin.zadaci.index') }}" class="btn btn-back">Nazad</a>
            <button type="submit" class="btn btn-save">Sačuvaj</button>
        </div>

    </form>
</div>

</body>
</html>
