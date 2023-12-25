<?php

namespace App\Http\Middleware\System;

use Closure;
use Illuminate\Http\Request;
use Lavary\Menu\Menu;
use Symfony\Component\HttpFoundation\Response;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->generateSidebarMenu();
        $this->generateTopbarMenu();

        return $next($request);
    }

    private function generateSidebarMenu()
    {
        $menu = new Menu();
        $menu->make('sidebar', function ($menu) {
            $menu->add('', '#')->nickname('base');
            $menu->base->add('dashboard', '#')->data([
                'icon' => getIcon('element-11', 'fs-2'),
                'route_check' => 'dashboard'
            ]);


            $menu->add('', '#')->nickname('apps');
            $menu->apps->add('departments', route('departments.index'))->nickname('departments')->data([
                'icon' => getIcon('bank', 'fs-2'),
                'permission' => 'read_departments',
                'route_check' => 'departments.*'
            ]);

            $menu->apps->add('statuses', route('statuses.index'))->data([
                'icon' => getIcon('switch', 'fs-2'),
                'permission' => 'read_statuses',
                'route_check' => 'statuses.*'
            ]);

            $menu->apps->add('languages', route('languages.index'))->data([
                'icon' => getIcon('flag', 'fs-2'),
                'permission' => 'read_languages',
                'route_check' => 'languages.*'
            ]);


            $menu->add('', '#')->nickname('settings');
            $menu->settings->add('users', route('users.index'))->nickname('users')->data([
                'icon' => getIcon('user', 'fs-2'),
                'permission' => 'read_users',
                'route_check' => 'users.*'
            ]);

            $menu->settings->add('roles', route('roles.index'))->nickname('roles')->data([
                'icon' => getIcon('abstract-41', 'fs-2'),
                'permission' => 'read_roles',
                'route_check' => 'roles.*'
            ]);

            $menu->settings->add('permissions', route('permissions.index'))->nickname('permissions')->data([
                'icon' => getIcon('abstract-25', 'fs-2'),
                'permission' => 'read_permissions',
                'route_check' => 'permissions.*'
            ]);

            #COMMAND_GENERATED_MENU_ITEM#
        });
    }

    private function generateTopbarMenu()
    {
        $menu = new Menu();
        $menu->make('topbar', function ($menu){
            $menu->add('complaint', '#')->data([
                'theme' => 'layout.partials.sidebar-layout.header._menu.theme.normal'
            ]);

            $menu->add('scoring', '#')->data([
                'theme' => 'layout.partials.sidebar-layout.header._menu.theme.normal'
            ]);

            $menu->add('faqs', '#')->data([
                'theme' => 'layout.partials.sidebar-layout.header._menu.theme.normal'
            ]);
//            /**
//             * Mega Menu
//             */
//            $menu->add('complaint', '#')->data([
//                'theme' => 'layout.partials.sidebar-layout.header._menu.theme.mega',
//            ]);
//            $menu->complaint->add('General', '#')->data([
//                'width' => '1000px',
//                'image' => image('stock/600x600/img-82.jpg')
//            ]);
//            $menu->general->add('user_profile', '#')->nickname('user_profile');
//            $menu->user_profile->add('overview', '#');
//            $menu->user_profile->add('projects', '#');
//
//            /**
//             * Extra Menu
//             */
//            $menu->add('scoring', '#')->data([
//                'theme' => 'layout.partials.sidebar-layout.header._menu.theme.extra',
//                'image' => image('stock/900x600/45.jpg')
//            ]);
//            $menu->scoring->add('test2', '#');
//            $menu->test2->add('test23', '#');
//
//            /**
//             * Normal Menu
//             */
//            $menu->add('faqs', '#')->data([
//                'theme' => 'layout.partials.sidebar-layout.header._menu.theme.normal'
//            ]);
//            $menu->faqs->add('test1', '#')->data([
//                'icon' => getIcon('rocket', 'fs-2'),
//                'tooltip' => 'Check out over 200 in-house components, plugins and ready for use solutions',
//                'tooltip_placement' => 'right'
//            ]);
        });
    }
}
