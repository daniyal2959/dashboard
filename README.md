<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Metronic Dashboard

metronic is a web application dashboard with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. metronic use laravel to takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

metronic is accessible, powerful, and provides tools required for large, robust applications.

---
## Install Dashboard
For install dashboard, there are 2 option

### Option 1
Clone project from GitHub with this code

`git clone https://github.com/daniyal2959/dashboard.git`

### Option 2
Use packagist to install dashboard

`composer require daniyal2959/dashboard`

---
## Run Dashboard

1. go to project directory in terminal: `cd {path_of_dashboard_directory}`
2. create a copy of `.env` file: `cp .env.example .env`
3. create a key for dashboard: `php artisan key:generate`
4. install node modules: `npm install`
5. If you want use **<u>ltr</u>** mode: `npm run dev` else if you want use **<u>rtl</u>** mode: `npm run dev-rtl`
---

## Roles and Permissions
**This dashboard use `spatie/laravel-permission` package to manage roles and permissions**

For customize roles and permissions, we created `RolesPermissionSeeder` file. so you can  open this file to customize roles and permissions

### Abilities
With `$abilities` you can set a prefix for all permissions. the default abilities are
```php
$abilities = [
    'read',
    'write',
    'create',
];
```
### Permissions by role
There is `$permissions_by_role` variable to store all permissions for roles. this variable is an array of roles and its permissions, that the key of its child is `role` and the value is array of `permissions`. you can set it manually by yourself. 

In other word, write your permissions in this variable
### Access
Because of the use of `spatie/laravel-permission` package, you can access to permission in views, controllers, middlewares and etc

### More information
For more information visit this link: [https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage](https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage)

---
## Change menu
**This dashboard uses `lavary/laravel-menu` for sidebar menus in dashboard so all of its rules are work in this dashboard.** 

There is a middleware with `GenerateMenus` name and `App\Http\Middleware\GenerateMenus` namespace in `Middleware` directory that generate sidebar menu. follow belows instruction to customize dashboard sidebar menu
### Create a group
This is a sample of creating a group in sidebar

```php
$menu->add('Base', '#');
```

So if you want to create a group, just add a menu item in `$menu` variable with `#` URL
### Create an item
This is a sample of creating a menu item in a group 
```php
$menu->base->add('Dashboards', '#')->data([
    'icon' => getIcon('element-11', 'fs-2'),
]);
```
In above code you see `base`. This menu item will be a menu item of `base` group
### Creating a child
This is a sample of creating a child for a menu item
```php
$menu->dashboards->add('Default', route('dashboard'));
```
In above code you can see `dashboards`. This child will be a child of `dashboards` menu item that the menu item is a menu item of `base` group

### Assign permission to menu item
Because of integration between `spatie/laravel-permission` and `lavary/laravel-menu` packages, you can use <u>**meta data**</u> feature in `lavary/laravel-menu` package with this link [https://github.com/lavary/laravel-menu?tab=readme-ov-file#meta-data](https://github.com/lavary/laravel-menu?tab=readme-ov-file#meta-data) 


### More information
For more information visit this link: [https://github.com/lavary/laravel-menu](https://github.com/lavary/laravel-menu)
