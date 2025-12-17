<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Panel Plus</title>
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
</head>
<style>
    body.pp-bg {
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
    font-size: 24px;
    font-weight: bold;
}

.pp-logo span {
    color: #3b82f6;
}

.pp-btn {
    padding: 8px 16px;
    background: #3b82f6;
    color: white;
    text-decoration: none;
    border-radius: 4px;
}

.pp-main {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px;
    gap: 40px;
}


.pp-gallery {
    display: grid;
    grid-template-columns: repeat(3, 120px);
    gap: 35px;
}


.pp-gallery img {
    width: 120px;
    height: 90px;
    object-fit: cover;
    background: #fff;
}

.pp-form {
    background: #f5f5f5;
    padding: 20px;
    width: 420px;
    border-radius: 4px;
}


.pp-form label {
    display: block;
    margin-top: 10px;
}

.pp-form input,
.pp-form textarea {
    width: 100%;
    padding: 6px;
}

.pp-btn.primary {
    margin-top: 15px;
    width: 100%;
}

.pp-footer {
    display: flex;
    justify-content: space-between;
    padding: 20px 200px;
    font-size: 18px;
    background: #ddd;
}

</style>
<body class="pp-bg">

<header class="pp-header">
    <div class="pp-logo">Panel<span>Plus</span></div>
    <a href="{{ route('login') }}" class="pp-btn login">Prijava</a>

</header>

<main class="pp-main">


    <section class="pp-gallery">
        <img src="/images/panel1.png">
        <img src="/images/panel2.png">
        <img src="/images/panel3.png">
        <img src="/images/panel4.png">
        <img src="/images/panel5.png">
        <img src="/images/panel6.png">
    </section>


    <section class="pp-form">
        @if(session('success'))
            <div class="pp-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('public.upit.store') }}">
            @csrf

            <label>Ime:</label>
            <input type="text" name="ime_klijenta" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Telefon:</label>
            <input type="text" name="telefon">

            <label>Upit:</label>
            <textarea name="opis" rows="4" required></textarea>

            <button type="submit" class="pp-btn primary">
                Pošalji upit
            </button>
        </form>
    </section>

</main>


<footer class="pp-footer">
    <div>
        <strong>O firmi:</strong><br>
        Panel Plus je specijalizovana firma za proizvodnju i montažu <br>
        izolacionih sendvič panela koja klijentima nudi kompletno rešenje<br>
        - od saveta i izrade ponude do profesionalne ugradnje na terenu<br>
    </div>

    <div>
        <strong>Kontakt:</strong><br>
        Email: plus@panel.rs<br>
        Tel: 061/234567
        Surčin Žička 4 11271
    </div>
</footer>

</body>
</html>
