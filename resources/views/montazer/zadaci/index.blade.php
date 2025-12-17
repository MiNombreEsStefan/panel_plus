<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Montažer – Zadaci</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e5e5e5;
        }

        /* HEADER */
        .pp-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }

        .pp-logo {
            font-size: 22px;
            font-weight: bold;
            color: #777;
        }

        .pp-logo span {
            color: #3b82f6;
        }

        .pp-nav {
            display: flex;
            gap: 10px;
        }

        .pp-tab {
            background: #93c5fd;
            padding: 6px 18px;
            color: white;
            font-size: 14px;
        }

        .pp-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .pp-user span {
            font-size: 14px;
        }

        .pp-logout {
            background: #dc2626;
            color: white;
            border: none;
            padding: 6px 14px;
            cursor: pointer;
        }

        /* TABLE */
        .pp-content {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            background: transparent;
            border: 2px solid #000;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 14px;
            text-align: left;
        }

        th {
            background: #ddd;
            font-weight: normal;
        }

        .btn-action {
            background: #9ca3af;
            color: #000;
            border: none;
            padding: 5px 12px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
        }

        /* WATERMARK */
        .pp-watermark {
            margin-top: 60px;
            text-align: center;
            font-size: 48px;
            letter-spacing: 10px;
            color: rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<!-- HEADER -->
<header class="pp-header">
    <div class="pp-logo">
        Panel<span>Plus</span>
    </div>

    <div class="pp-nav">
        <div class="pp-tab">Zadaci</div>
    </div>

    <div class="pp-user">
        <span>MONTAŽER</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="pp-logout">Odjava</button>
        </form>
    </div>
</header>

<!-- CONTENT -->
<div class="pp-content">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Lokacija</th>
                <th>Opis</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
        @forelse($zadaci as $z)
            <tr>
                <td>{{ $z->id }}</td>
                <td>{{ $z->naslov }}</td>
                <td>{{ $z->lokacija }}</td>
                <td>{{ $z->opis }}</td>
                <td>
                    <a href="{{ route('montazer.zadaci.show', $z) }}"
                       class="btn-action">
                        Pokreni
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Nema zadataka</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="pp-watermark">
    PANEL PLUS
</div>

</body>
</html>
