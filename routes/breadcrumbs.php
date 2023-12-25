<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(trans('dashboard.dashboard'), route('dashboard'));
});

// Dashboard > Users
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('dashboard.users'), route('users.index'));
});

// Dashboard > Users > [User]
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users.index');
    $trail->push(ucwords($user->name), route('users.show', $user));
});

// Dashboard > Departments
Breadcrumbs::for('departments.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('dashboard.departments'), route('departments.index'));
});

// Dashboard > Roles
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('dashboard.roles'), route('roles.index'));
});

// Dashboard > Roles > [Role]
Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('roles.index');
    $trail->push(ucwords($role->name), route('roles.show', $role));
});

// Dashboard > Permissions
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('dashboard.permissions'), route('permissions.index'));
});

// Dashboard > Status
Breadcrumbs::for('statuses.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('dashboard.statuses'), route('statuses.index'));
});

// Home > Dashboard > Language
Breadcrumbs::for('languages.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('dashboard.languages'), route('languages.index'));
});

// Home > Dashboard > Language > [Language]
Breadcrumbs::for('languages.show', function (BreadcrumbTrail $trail, string $name) {
    $trail->parent('languages.index');
    $trail->push($name, route('languages.index'));
});

// Home > Dashboard > Notification
//Breadcrumbs::for('notifications.index', function (BreadcrumbTrail $trail) {
//    $trail->parent('dashboard');
//    $trail->push(trans('dashboard.notifications'), route('notifications.index'));
//});

#COMMAND_GENERATED_BREADCRUMBS#




