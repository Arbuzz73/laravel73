<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории Valorant</title>
    @vite(['resources/css/app.css', 'resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    <x-header />

    <main style="max-width: 700px; width: 100%; margin: 100px auto 40px auto; padding: 30px; background: #1e1e1e; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.4); font-family: sans-serif; text-align: left; box-sizing: border-box;">
    <h1 style="color: #e0e0e0; margin-top: 0; font-size: 28px; border-bottom: 2px solid #333; padding-bottom: 15px; margin-bottom: 25px; text-align: center;">Разделы Valorant</h1>

    <div style="display: flex; flex-direction: column; gap: 16px;">
        @foreach($categories as $category)
            <a href="/category/{{ $category->id }}" style="text-decoration: none; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; padding: 18px 20px; font-size: 16px; font-weight: 600; color: #e0e0e0; display: flex; align-items: center; justify-content: center; box-sizing: border-box; transition: all 0.2s ease-in-out;" onmouseover="this.style.borderColor='#5c0000'; this.style.color='#ffb3b3';" onmouseout="this.style.borderColor='#444'; this.style.color='#e0e0e0';">
                <span>{{ $category->name }}</span>
            </a>
        @endforeach
    </div>
</main>

    <x-footer />
</body>
</html>