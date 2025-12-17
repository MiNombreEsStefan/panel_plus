<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin / Upiti</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Ako želiš da dodate CSS direktno ovde, to je u redu, ali bolje je kroz app.css */
        .pp-bg { background:#e9e9e9; font-family: system-ui, Arial, sans-serif; }
        .pp-header{
            display:flex; justify-content:space-between; align-items:center;
            padding:16px 24px;
        }
        .pp-left{ display:flex; align-items:center; gap:18px; }
        .pp-logo{ height:34px; width:auto; opacity:.9; }
        .pp-tabs{ display:flex; gap:6px; }
        .pp-tab{
            display:inline-block; padding:8px 14px;
            background:#8fbaf2; color:#fff; text-decoration:none;
            font-size:13px; border-radius:2px;
        }
        .pp-tab.active{ background:#5aa0f0; }
        .pp-right{ display:flex; align-items:center; gap:14px; }
        .pp-role{ font-weight:700; font-size:12px; color:#111; }
        .pp-logout{
            background:#e53935; color:#fff; border:0;
            padding:8px 14px; font-weight:700; cursor:pointer;
        }
        .pp-main{ position:relative; padding:40px 0; }
        .pp-content{ position:relative; z-index:2; display:flex; justify-content:center; }
        .pp-watermark{
            position:absolute; left:50%; top:100%;
            transform:translate(-50%,-50%);
            font-size:64px; font-weight:800; letter-spacing:8px;
            color:rgba(0,0,0,.15); z-index:1;
        }
        .pp-table-wrap{
            width:860px;
            border:3px solid #000;
            background:transparent;
        }
        .pp-table{
            width:100%;
            border-collapse:collapse;
            background:transparent;
        }
        .pp-table th, .pp-table td{
            border:1px solid #555;
            padding:10px 8px;
            font-size:12px;
        }
        .pp-table th{ background:#d9d9d9; font-weight:700; text-align:left; }
        .pp-actions{ display:flex; flex-direction:column; gap:6px; align-items:flex-start; }
        .pp-btn{
            border:0; padding:6px 10px; font-weight:700;
            font-size:11px; color:#fff; cursor:pointer;
        }
        .pp-btn.danger{ background:#e53935; }
        .pp-btn.success{ background:#2e7d32; }

        .pp-logo {
    font-size: 24px;
    font-weight: bold;
}

.pp-logo span {
    color: #3b82f6;
}
    </style>
</head>
<body class="pp-bg">

<header class="pp-header">
    <div class="pp-left">
        <div class="pp-logo">Panel<span>Plus</span></div>
        <nav class="pp-tabs">
            <a class="pp-tab {{ request()->routeIs('admin.upiti.*') ? 'active' : '' }}"
   href="{{ route('admin.upiti.index') }}">
   Upiti
</a>

            <a class="pp-tab {{ request()->routeIs('admin.zadaci.*') ? 'active' : '' }}"
   href="{{ route('admin.zadaci.index') }}">
   Zadaci
</a>

            <a class="pp-tab {{ request()->routeIs('admin.molbe.*') ? 'active' : '' }}"
   href="{{ route('admin.molbe.index') }}">
   Molbe
</a>
        </nav>
    </div>

    <div class="pp-right">
        <div class="pp-role">ADMIN</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="pp-logout" type="submit">Odjava</button>
        </form>
    </div>
</header>

<main class="pp-main">
    <div class="pp-watermark">PANEL PLUS</div>
    <div class="pp-content">
        

        <div class="pp-table-wrap">
            <table class="pp-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Opis</th>
                        <th>Status</th>
                        <th>Akcija</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($upiti as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->ime_klijenta }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->telefon }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($u->opis, 60) }}</td>
                            <td>{{ $u->status }}</td>
                            <td class="pp-actions">
                                <form method="POST" action="{{ route('admin.upiti.obrisi', $u) }}">
                                    @csrf
                                    <button class="pp-btn danger" type="submit">Obriši</button>
                                </form>

                                <form method="POST" action="{{ route('admin.upiti.edit', $u) }}">
                                    @csrf
                                    <a href="{{ route('admin.upiti.edit', $u) }}"
   class="pp-btn success">
    Odgovori
</a>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8">Nema upita.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>
