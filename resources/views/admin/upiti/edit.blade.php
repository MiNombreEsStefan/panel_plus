<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Odgovor na upit</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e5e5e5;
        }

        .pp-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .admin-form select,
        .admin-form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            border: 1px solid #bbb;
            border-radius: 4px;
            font-size: 14px;
        }

        .admin-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        .admin-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .btn-save {
            background: #3b82f6;
        }

        .btn-save:hover {
            background: #2563eb;
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
          action="{{ route('admin.upiti.update', $upit) }}"
          class="admin-form">

        @csrf
        @method('PUT')

        <h2>Odgovor na upit</h2>

        <label>Status</label>
        <select name="status">
            <option value="NOVI" @selected($upit->status === 'NOVI')>Novi</option>
            <option value="OBRADJEN" @selected($upit->status === 'OBRADJEN')>Obrađen</option>
        </select>

        <label>Odgovor</label>
        <textarea name="odgovor">{{ old('odgovor', $upit->odgovor) }}</textarea>

        <div class="admin-actions">
            <a href="{{ route('admin.upiti.index') }}" class="btn btn-back">Nazad</a>
            <button type="submit" class="btn btn-save">Sačuvaj</button>
        </div>
    </form>
</div>

</body>
</html>
