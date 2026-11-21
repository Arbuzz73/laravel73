<header>
    <a href="/">Главная</a>
    <a href="/category">Категория</a>

    @auth
        @if(in_array(auth()->user()->role?->name, ['journalist', 'admin']))
            <a href="/journalist">Журналист</a>
        @endif

        @if(auth()->user()->role?->name === 'admin')
            <a href="/admin">Админ</a>
        @endif

        <span class="user-name">{{ auth()->user()->name }}</span>
        
        <form action="/logout" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="btn-logout">Выйти</button>
        </form>
    @endauth

    @guest
        <a href="/login">Войти</a>
        <a href="/register">Регистрация</a>
    @endguest
</header>