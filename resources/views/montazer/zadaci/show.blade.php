<!DOCTYPE html>
<html lang="sr">
<head>
<meta charset="UTF-8">
<title>Zadatak</title>

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

.pp-logo {
    font-size: 22px;
    font-weight: bold;
}

.pp-logo span {
    color: #3b82f6;
}

.pp-user {
    display: flex;
    align-items: center;
    gap: 15px;
}

.pp-logout {
    background: #dc2626;
    color: white;
    border: none;
    padding: 6px 12px;
    cursor: pointer;
    border-radius: 4px;
}

/* MAIN */
.pp-container {
    display: flex;
    gap: 40px;
    padding: 40px;
}

/* LEFT */
.pp-left {
    width: 35%;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.pp-back {
    width: 32px;
    height: 32px;
    background: #3b82f6;
    color: white;
    text-align: center;
    line-height: 32px;
    text-decoration: none;
    border-radius: 4px;
}

.pp-box {
    background: #f5f5f5;
    padding: 12px;
    border-radius: 4px;
}

.pp-box.large {
    min-height: 90px;
}

/* RIGHT */
.pp-right {
    width: 65%;
}

.pp-images {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin-bottom: 15px;
}

.pp-images img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    background: white;
    border-radius: 4px;
}

/* BUTTONS */
.pp-btn {
    border: none;
    padding: 10px 16px;
    color: white;
    cursor: pointer;
    border-radius: 4px;
}

.pp-btn.green {
    background: #16a34a;
}

.pp-btn.blue {
    background: #3b82f6;
}

/* BOTTOM */
.pp-bottom {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 40px;
    padding: 0 40px 40px;
}

.pp-section textarea {
    width: 100%;
    min-height: 80px;
    padding: 10px;
    resize: none;
}

.pp-section h4 {
    margin-bottom: 8px;
}

.pp-status-box {
    background: #f5f5f5;
    padding: 12px;
    border-radius: 4px;
    width: fit-content;
}
</style>
</head>

<body>

<header class="pp-header">
    <div class="pp-logo">Panel<span>Plus</span></div>

    <div class="pp-user">
        MONTAŽER
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="pp-logout">Odjava</button>
        </form>
    </div>
</header>

<main class="pp-container">

    <!-- LEVA STRANA -->
    <section class="pp-left">
        <a href="{{ route('montazer.zadaci.index') }}" class="pp-back">←</a>

        <div class="pp-box">{{ $zadatak->naslov }}</div>
        <div class="pp-box">{{ $zadatak->lokacija }}</div>
        <div class="pp-box large">{{ $zadatak->opis }}</div>
    </section>

    <!-- DESNA STRANA -->
    <section class="pp-right">

        <div class="pp-images">
            @forelse($zadatak->slike as $slika)
                <img src="{{ asset('storage/'.$slika->putanja) }}">
            @empty
                <p>Nema dodatih slika.</p>
            @endforelse
        </div>

        <!-- UPLOAD SLIKE -->
        <form method="POST"
              action="{{ route('montazer.zadaci.slika', $zadatak) }}"
              enctype="multipart/form-data">

            @csrf

            <input type="file" name="slika" id="slika" hidden>

            <button type="button"
                    class="pp-btn green"
                    onclick="document.getElementById('slika').click()">
                Dodajte sliku
            </button>

            <button type="submit" class="pp-btn blue">
                Sačuvaj
            </button>
        </form>

    </section>
</main>

<!-- DONJI DEO -->
<section class="pp-bottom">

    <!-- MOLBA -->
    <div class="pp-section">
        <h4>Molba</h4>

        <form method="POST" action="{{ route('montazer.zadaci.molba', $zadatak) }}">
            @csrf
            <textarea name="tekst" placeholder="Unesite molbu..." required></textarea>
            <button class="pp-btn blue">Pošalji molbu</button>
        </form>
    </div>

    <!-- ODGOVOR -->
    <div class="pp-section">
        <h4>Odgovor admina</h4>
        <textarea readonly>
{{ optional($zadatak->porukeMolbi->last())->odgovor_admin ?? 'Još nema odgovora.' }}
        </textarea>
    </div>

    <!-- STATUS -->
    <div class="pp-section">
    <h4>Status</h4>

    <form method="POST" action="{{ route('montazer.zadaci.status', $zadatak) }}">
        @csrf

        <select name="status">
            <option value="U toku" @selected($zadatak->status === 'U toku')>U toku</option>
            <option value="Završeno" @selected($zadatak->status === 'Završeno')>Završeno</option>
            <option value="Prekinuto" @selected($zadatak->status === 'Prekinuto')>Prekinuto</option>
        </select>

        <br><br>
        <button class="pp-btn blue">Sačuvaj status</button>
    </form>
</div>


</section>

</body>
</html>
