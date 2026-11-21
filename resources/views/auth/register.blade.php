<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    @vite(['resources/css/app.css', 'resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    <x-header />
    <main style="max-width: 400px; width: 100%; margin: 100px auto 40px auto; padding: 30px; background: #1e1e1e; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.5); font-family: sans-serif; box-sizing: border-box;">
        <h1 style="color: #e0e0e0; text-align: center; margin-top: 0; margin-bottom: 25px;">Регистрация</h1>
        
        @if($errors->any())
            <div style="background: #3f1a1a; color: #fca5a5; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center; border: 1px solid #5c0000;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/register" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            <input type="text" name="name" placeholder="Логин" required style="padding: 12px; border: 1px solid #444; border-radius: 6px; background: #2a2a2a; color: #fff; font-size: 16px;">
            <input type="password" name="password" placeholder="Пароль" required style="padding: 12px; border: 1px solid #444; border-radius: 6px; background: #2a2a2a; color: #fff; font-size: 16px;">
            <input type="password" name="password_confirmation" placeholder="Подтвердите пароль" required style="padding: 12px; border: 1px solid #444; border-radius: 6px; background: #2a2a2a; color: #fff; font-size: 16px;">
            <button type="submit" style="padding: 12px; background: #5c0000; color: white; border: none; border-radius: 6px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background 0.2s;" onmouseover="this.style.background='#7a0000'" onmouseout="this.style.background='#5c0000'">Создать аккаунт</button>
        </form>
    </main>
    <x-footer />
</body>
</html>