<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категория</title>
    @vite(['resources/css/app.css', 'resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    <x-header />
    <main style="max-width: 800px; width: 100%; margin: 100px auto 40px auto; padding: 0 20px; text-align: left; box-sizing: border-box; font-family: sans-serif;">
    <h1 style="color: #0f172a; font-size: 32px; font-weight: 700; margin-bottom: 30px; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">
        Статьи по игре: {{ $category->name }}
    </h1>

    @forelse($articles as $article)
        <article style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 25px; margin-bottom: 25px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
            <h2 style="margin-top: 0; margin-bottom: 12px; color: #1e293b; font-size: 24px; font-weight: 600; line-height: 1.3;">
                {{ $article->title }}
            </h2>
            
            <p style="color: #334155; font-size: 16px; line-height: 1.6; margin-bottom: 20px; white-space: pre-line;">
                {{ $article->content }}
            </p>
            
            <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 15px; border-top: 1px solid #f1f5f9; color: #64748b; font-size: 14px;">
                <span style="background: #eff6ff; color: #1d4ed8; padding: 4px 12px; border-radius: 20px; font-weight: 600;">
                    🎮 {{ $article->category->name }}
                </span>
                <span>
                    ✍️ {{ $article->user->name ?? 'Неизвестен' }}
                </span>
                <span>
                    📅 {{ $article->created_at->format('d.m.Y') }}
                </span>
            </div>
        </article>
    @empty
        <div style="text-align: center; padding: 40px; background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0;">
            <p style="color: #64748b; font-size: 18px; margin: 0;">В этой категории пока нет опубликованных статей.</p>
        </div>
    @endforelse

    <div style="margin-top: 20px;">
        {{ $articles->links() }}
    </div>
</main>
    <x-footer />
</body>
</html>