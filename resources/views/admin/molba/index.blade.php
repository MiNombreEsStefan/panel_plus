<!DOCTYPE html>
<html lang="sr">
<head>
<meta charset="UTF-8">
<title>Admin – Molbe</title>

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
    padding: 20px 40px;
}

.pp-left {
    display: flex;
    align-items: center;
    gap: 25px;
}

.pp-logo {
    font-size: 22px;
    font-weight: bold;
}

.pp-logo span {
    color: #3b82f6;
}

/* TABS */
.pp-tabs {
    display: flex;
    gap: 8px;
}

.pp-tab {
    padding: 8px 14px;
    background: #8fbaf2;
    color: white;
    text-decoration: none;
    font-size: 13px;
    border-radius: 3px;
}

.pp-tab.active {
    background: #3b82f6;
}

/* LOGOUT */
.pp-logout {
    background: #dc2626;
    color: white;
    border: none;
    padding: 6px 12px;
    cursor: pointer;
}

/* CONTENT */
.pp-container {
    padding: 40px;
}

.pp-card {
    background: #f5f5f5;
    padding: 20px;
    margin-bottom: 25px;
    border-radius: 6px;
}

.pp-meta {
    display: flex;
    gap: 40px;
    margin-bottom: 10px;
}

.pp-textarea {
    width: 100%;
    min-height: 90px;
    padding: 10px;
    resize: none;
    margin-bottom: 10px;
}

.pp-form textarea {
    width: 100%;
    min-height: 80px;
    padding: 10px;
    margin-bottom: 10px;
}

.pp-form select {
    padding: 8px;
    margin-right: 15px;
}

.pp-btn {
    background: #3b82f6;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    border-radius: 4px;
}
</style>
</head>

<body>

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

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="pp-logout">Odjava</button>
    </form>

</header>

<div class="pp-container">

    <h2>Molbe montažera</h2>

    @forelse($poruke as $poruka)

        <div class="pp-card">

            <div class="pp-meta">
                <p><strong>Zadatak:</strong> {{ $poruka->zadatak->naslov }}</p>
                <p><strong>Montažer:</strong> {{ $poruka->user->name ?? 'N/A' }}</p>
            </div>

            <textarea class="pp-textarea" readonly>{{ $poruka->tekst }}</textarea>

            <form method="POST"
                  class="pp-form"
                  action="{{ route('admin.molbe.odgovori', $poruka) }}">
                @csrf

                <textarea name="odgovor_admin"
                          required
                          placeholder="Odgovor admina">{{ old('odgovor_admin', $poruka->odgovor_admin) }}</textarea>

                <select name="status">
                    <option value="U toku">U toku</option>
                    <option value="Završeno">Završeno</option>
                    <option value="Prekinuto">Prekinuto</option>
                </select>

                <button class="pp-btn">Pošalji odgovor</button>
            </form>

        </div>

    @empty
        <p>Nema molbi.</p>
    @endforelse

</div>

</body>
</html>
