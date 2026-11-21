<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Журналистика</title>
    @vite(['resources/css/app.css', 'resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    <x-header />
    <main style="max-width: 700px; width: 100%; margin: 40px auto; padding: 30px; background: #ffffff; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); font-family: sans-serif; text-align: left; box-sizing: border-box;">
    <h1 style="color: #1e293b; margin-top: 0; font-size: 28px; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; margin-bottom: 25px;">Раздел Журналистики</h1>
    
    @if(session('success'))
        <div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; color: #334155; margin-bottom: 8px;">Заголовок статьи</label>
            <input type="text" name="title" required placeholder="Введите цепляющий заголовок..." style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 16px; color: #1e293b; box-sizing: border-box; outline: none;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; color: #334155; margin-bottom: 8px;">Текст статьи</label>
            <textarea name="content" rows="8" required placeholder="Напишите здесь текст вашей публикации..." style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 16px; color: #1e293b; font-family: sans-serif; box-sizing: border-box; resize: vertical; outline: none;"></textarea>
        </div>

        <div style="margin-bottom: 30px;">
            <label style="display: block; font-weight: 600; color: #334155; margin-bottom: 8px;">Выберите категорию игры</label>
            <select name="category_id" style="width: 100%; max-width: 300px; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 16px; color: #1e293b; background: #fff; box-sizing: border-box; outline: none; cursor: pointer;">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" style="width: 100%; background-color: #2563eb; color: white; padding: 14px; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer;">
            Опубликовать статью
        </button>
    </form>
</main>
    <x-footer />
</body>
</html>