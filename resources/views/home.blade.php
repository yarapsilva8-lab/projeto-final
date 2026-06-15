<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Pet</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            background: #fff;
        }

        .hero {
            text-align: center;
            padding: 2rem;
        }

        .hero-icon {
            font-size: 8rem;
            display: block;
            margin-bottom: 1rem;
        }

        .hero-title {
            font-size: 3rem;
            color: #2E7D32;
            margin-bottom: 0.75rem;
        }

        .hero-sub {
            color: #ff914d;
            margin-bottom: 2rem;
        }

        .btn-group {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 8px;
            text-decoration: none;
            border: 1.5px solid #ff914d;
            color: #ff914d;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn:hover {
            background: #ff914d;
            color: white;
        }
    </style>
</head>
<body>

<div class="hero">
    <span class="hero-icon">🐾</span>

    <h1 class="hero-title">Mundo Pet</h1>

    <p class="hero-sub">
        O lugar certo para registrar e cuidar dos seus animais
    </p>

    <div class="btn-group">

        @guest
            <a href="{{ route('register') }}" class="btn">
                👤 Criar Conta
            </a>

            <a href="{{ route('login') }}" class="btn">
                🔑 Entrar
            </a>
        @endguest

        @auth

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn">
                    🚪 Sair
                </button>
            </form>
        @endauth

    </div>
</div>

</body>
</html>
