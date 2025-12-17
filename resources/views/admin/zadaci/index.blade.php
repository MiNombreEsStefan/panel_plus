<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Admin – Zadaci</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e5e5e5;
        }

        .admin-wrap {
            padding: 40px;
        }

        
        .admin-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
}


        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .logo span {
            color: #3b82f6;
        }

        .nav {
            display: flex;
            gap: 8px;
        }

        .nav a {
            padding: 8px 14px;
    background: #8fbaf2;
    color: white;
    text-decoration: none;
    font-size: 13px;
    border-radius: 3px;
        }

        .logout {
            background: #ef4444;
        }

        /* BUTTONS */
        .pp-btn {
            padding: 6px 14px;
            border: none;
            border-radius: 2px;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .pp-btn.green { background: #22c55e; color: #fff; }
        .pp-btn.blue { background: #3b82f6; color: #fff; }
        .pp-btn.red { background: #ef4444; color: #fff; }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #dcdcdc;
        }

        th, td {
            border: 2px solid #000;
            padding: 8px;
            font-size: 14px;
        }

        th {
            background: #cfcfcf;
            text-align: left;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

        .watermark {
            text-align: center;
            margin-top: 60px;
            
            
            color: rgba(0,0,0,0.1);
            
            font-size:64px; font-weight:800; letter-spacing:8px;
            color:rgba(0,0,0,.15); z-index:1;
        }
        .pp-tab.active {
    background: #3b82f6;
}
    </style>
</head>
<body>

<div class="admin-wrap">

    <div class="admin-header">
    <div class="admin-left">
        <div class="logo">Panel<span>Plus</span></div>

        <nav class="nav">
            <a class="pp-tab {{ request()->routeIs('admin.upiti.*') ? 'active' : '' }}"
               href="{{ route('admin.upiti.index') }}">Upiti</a>

            <a class="pp-tab {{ request()->routeIs('admin.zadaci.*') ? 'active' : '' }}"
               href="{{ route('admin.zadaci.index') }}">Zadaci</a>

            <a class="pp-tab {{ request()->routeIs('admin.molbe.*') ? 'active' : '' }}"
               href="{{ route('admin.molbe.index') }}">Molbe</a>
        </nav>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="pp-btn red">Odjava</button>
    </form>
</div>



    <a href="{{ route('admin.zadaci.create') }}" class="pp-btn green">
        Kreiraj zadatak
    </a>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Lokacija</th>
                <th>Opis</th>
                <th>Status</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
            @foreach($zadaci as $zadatak)
                <tr>
                    <td>{{ $zadatak->id }}</td>
                    <td>{{ $zadatak->naslov }}</td>
                    <td>{{ $zadatak->lokacija }}</td>
                    <td>{{ $zadatak->opis }}</td>
                    <td>{{ $zadatak->status }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.zadaci.edit', $zadatak) }}" class="pp-btn blue">
                            Izmeni
                        </a>

                        <form method="POST" action="{{ route('admin.zadaci.destroy', $zadatak) }}">
                            @csrf
                            @method('DELETE')
                            <button class="pp-btn red">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="watermark">PANEL PLUS</div>

</div>

</body>
</html>
