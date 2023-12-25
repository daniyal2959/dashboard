<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class RollbackResource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rollback:resource {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->removePermissions();
        $this->removeDatatableClassFile();
        $this->removeController();
        $this->removeModelSeeder();
        $this->removeMigration();
        $this->removeViews();
        $this->removeComponents();
//        $this->subtractResourceMenu();
//        $this->subtractResourceRoute();
//        $this->subtractResourceBreadcrumb();
//        $this->subtractResourceSeeder();
    }

    private function removePermissions(){
        $resource = $this->argument('name');

        $permissions = [
            'read ' . Str::lower(Str::plural($resource)) . ' management',
            'write ' . Str::lower(Str::plural($resource)) . ' management',
            'create ' . Str::lower(Str::plural($resource)) . ' management',
        ];

        foreach ($permissions as $permission) {
            Permission::where('name', $permission)->delete();
        }
    }

    private function removeDatatableClassFile(){
        $resource = $this->argument('name');
        File::delete(app_path() . '/DataTables/' . Str::plural($resource) . 'DataTable.php');
    }

    private function removeController(){
        $resource = $this->argument('name');
        File::delete(app_path() . '/Http/Controllers/Apps/' . Str::ucfirst($resource) . 'ManagementController.php');
    }

    private function removeModelSeeder(){
        $resource = $this->argument('name');
        File::delete(app_path() . '/Models/' . Str::ucfirst($resource) . '.php');
        File::delete(database_path() . '/seeders/' . Str::ucfirst($resource) . 'Seeder.php');
    }

    private function removeMigration(){
        $resource = $this->argument('name');
        $migrations = scandir(database_path() . '/migrations/');
        foreach ($migrations as $migration) {
            if( Str::endsWith($migration, 'create_' . Str::lower(Str::plural($resource)) . '_table.php') ){
                File::delete(database_path() . '/migrations/' . $migration);
            }
        }
    }

    private function removeViews(){
        $resource = $this->argument('name');
        File::deleteDirectory(viewPath('pages.apps.management.' . Str::lower(Str::plural($resource))));
    }

    private function removeComponents(){
        $resource = $this->argument('name');
        File::deleteDirectory(viewPath('livewire.' . Str::lower($resource)));
        File::deleteDirectory(app_path() . '/Http/Livewire/' . Str::ucfirst($resource));
    }
}
