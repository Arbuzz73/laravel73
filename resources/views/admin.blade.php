<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    @vite(['resources/css/app.css', 'resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    <x-header />
    <main style="max-width: 700px; width: 100%; margin: 40px auto; padding: 30px; background: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); font-family: sans-serif;">
    <h1 style="color: #1e293b; margin-top: 0; font-size: 28px; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; margin-bottom: 25px; text-align: center;">Раздел Администрации</h1>
    
    @if(session('success'))
        <div style="background: #ecfdf5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px; text-align: center; border: 1px solid #a7f3d0;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; flex-direction: column; gap: 16px;">
        @forelse($users as $user)
            <div style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 18px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                
                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <span style="font-weight: 600; color: #1e293b; font-size: 16px;">{{ $user->name }}</span>
                </div>

                <div style="display: flex; align-items: center; gap: 12px;">
                    @if($user->role->name === 'admin')
                        <span style="background: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase;">Админ</span>
                    @elseif($user->role->name === 'journalist')
                        <span style="background: #e0f2fe; color: #0369a1; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase;">Журналист</span>
                    @else
                        <span style="background: #f1f5f9; color: #475569; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 500; text-transform: uppercase;">Юзер</span>
                    @endif

                    <form action="{{ route('admin.updateRole', $user->id) }}" method="POST" style="margin: 0;">
                        @csrf
                        <select name="role_id" onchange="this.form.submit()" style="padding: 6px 12px; border: 1px solid #cbd5e1; border-radius: 6px; background-color: white; color: #334155; font-size: 13px; cursor: pointer; outline: none;">
                            <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Посетитель</option>
                            <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Журналист</option>
                            <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Администратор</option>
                        </select>
                    </form>
                </div>

            </div>
        @empty
            <div style="text-align: center; color: #94a3b8; font-style: italic; padding: 20px; border: 1px dashed #cbd5e1; border-radius: 6px;">
                В базе данных пока нет зарегистрированных пользователей.
            </div>
        @endforelse
    </div>
</main>
    <x-footer />
</body>
</html>