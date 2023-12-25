@foreach($roles as $role)
    <a href="{{ route('roles.show', $role) }}" class="badge fs-7 m-1 {{ app(\App\Actions\GetThemeType::class)->handle('badge-light-?', $role->name) }}">
        @lang('dashboard/role.' . $role->name)
    </a>
@endforeach
