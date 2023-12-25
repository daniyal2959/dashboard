<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class Resource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:resource {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * The stubs constants to replace with a value
     *
     * @var array
     */
    protected $constants = [];

    /**
     * Check this resource is existed or not
     *
     * @var bool
     */
    protected $isExist = false;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->setConstants();
        $resource = $this->argument('name');

        $this->createDatatableClassFile();
        $this->createController();
        $this->createModelSeeder();
        $this->createViews();
        $this->createComponents();

        if( !$this->isExist ) {
            $this->createMigration();
            $this->createPermissions();
            $this->addResourceMenu();
            $this->addResourceRoute();
            $this->addResourceBreadcrumb();
            $this->addResourceSeeder();
        }

        $this->info('Successfully completed');
        $this->warn('1. Customize ' . $resource . ' migration columns');
        $this->warn('3. assign permissions to specific roles from admin panel');
    }

    private function fillStub($stubName, $path = ''){
        $stubContent = getStubContent($stubName, $path);

        foreach ($this->constants as $field => $value) {
            $stubContent = Str::replace($field, $value, $stubContent);
        }

        return $stubContent;
    }

    private function fillDatatableStub($resource){

        return $this->fillStub('datatable');
    }

    private function createModelSeeder(){
        $resource = $this->argument('name');
        Artisan::call('make:model ' . ucfirst($resource) . ' -s');
    }

    private function createMigration(){
        $resource = $this->argument('name');
        $migrationName = Carbon::now()->format('Y_m_d_his_') . 'create_' . Str::lower(Str::plural($resource)) . '_table.php';
        $migrationPath = database_path() . '/migrations/' . $migrationName;

        $stubContent = $this->fillMigrationStub();

        File::put($migrationPath, $stubContent);
    }

    private function fillMigrationStub(){
        return $this->fillStub('migrate');
    }

    private function createController(){
        $resource = $this->argument('name');
        $controllerName = Str::ucfirst($resource) . 'ManagementController.php';
        $controllerPath = app_path() . '/Http/Controllers/Apps/' . $controllerName;

        $stubContent = $this->fillControllerStub();

        File::put($controllerPath, $stubContent);
    }

    private function fillControllerStub(){
        return $this->fillStub('controller');
    }

    private function createComponents(){
        $resource = $this->argument('name');

        # Create component class
        $controllerName = Str::ucfirst($resource) . 'Modal.php';
        $componentDirectoryPath = app_path() . '/Http/Livewire/' . Str::ucfirst($resource) . '/';
        if( !File::exists($componentDirectoryPath) )
            File::makeDirectory($componentDirectoryPath);
        else
            $this->isExist = true;


        $controllerPath = $componentDirectoryPath . $controllerName;
        $stubContent = $this->fillComponentsStub();
        File::put($controllerPath, $stubContent);


        # Create component view
        $resourceModalViewContent = $this->fillStub('resource-modal', 'views.livewire.resource');
        $livewireViewPath = viewPath('livewire') . '/' . Str::lower($resource) . '/';

        if( !File::exists($livewireViewPath) )
            File::makeDirectory($livewireViewPath);
        else
            $this->isExist = true;

        File::put($livewireViewPath . Str::lower($resource) . '-modal.blade.php', $resourceModalViewContent);
    }

    private function fillComponentsStub(){
        return $this->fillStub('component');
    }

    private function createDatatableClassFile(){
        $resource = $this->argument('name');
        $datatableName = Str::ucfirst(Str::plural($resource)) . 'DataTable.php';
        $datatablePath = datatablePath() . '/' . $datatableName;

        $stubContent = $this->fillDatatableStub($resource);

        File::put($datatablePath, $stubContent);
    }

    private function createViews(){
        $resource = $this->argument('name');

        $lowerPluralResourceName = Str::lower(Str::plural($resource));
        $listViewContent = $this->fillStub('list', 'views.resources');
        $showViewContent = $this->fillStub('show', 'views.resources');
        $actionsViewContent = $this->fillStub('_actions', 'views.resources.columns');
        $scriptsViewContent = $this->fillStub('_draw-scripts', 'views.resources.columns');

        $managementPath = viewPath('pages.apps.management');
        $resourceViewPath = $managementPath . '/' . $lowerPluralResourceName . '/';
        $resourceViewColumnsPath = $managementPath . '/' . $lowerPluralResourceName . '/columns/';

        if( !File::exists($resourceViewPath) )
            File::makeDirectory($resourceViewPath);
        else
            $this->isExist = true;

        if( !File::exists($resourceViewColumnsPath) )
            File::makeDirectory($resourceViewColumnsPath);
        else
            $this->isExist = true;

        File::put($resourceViewPath . 'list.blade.php', $listViewContent);
        File::put($resourceViewPath . 'show.blade.php', $showViewContent);
        File::put($resourceViewColumnsPath . '_actions.blade.php', $actionsViewContent);
        File::put($resourceViewColumnsPath . '_draw-scripts.js', $scriptsViewContent);
    }

    public function createPermissions()
    {
        $resource = $this->argument('name');
        $permissions = [
            'read ' . Str::lower(Str::plural($resource)) . ' management',
            'write ' . Str::lower(Str::plural($resource)) . ' management',
            'create ' . Str::lower(Str::plural($resource)) . ' management',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }

    public function addResourceMenu()
    {
        $generateMenuFile = app_path() . '/Http/Middleware/GenerateMenus.php';
        $menuContent = file_get_contents($generateMenuFile);
        $menuStubContent = $this->fillMenu();
        $menuContent = Str::replace('#COMMAND_GENERATED_MENU_ITEM#', $menuStubContent, $menuContent);
        File::put($generateMenuFile, $menuContent);
    }

    private function fillMenu()
    {
        return $this->fillStub('menu');
    }

    public function addResourceRoute()
    {
        $routeFile = base_path() . '/routes/web.php';
        $routeContent = file_get_contents($routeFile);
        $routeStubContent = $this->fillRoute();
        $routeContent = Str::replace('#COMMAND_GENERATED_ROUTES#', $routeStubContent, $routeContent);
        File::put($routeFile, $routeContent);
    }

    private function fillRoute()
    {
        return $this->fillStub('route');
    }

    public function addResourceBreadcrumb()
    {
        $breadcrumbFile = base_path() . '/routes/breadcrumbs.php';
        $breadcrumbContent = file_get_contents($breadcrumbFile);
        $breadcrumbStubContent = $this->fillBreadcrumb();
        $breadcrumbContent = Str::replace('#COMMAND_GENERATED_BREADCRUMBS#', $breadcrumbStubContent, $breadcrumbContent);
        File::put($breadcrumbFile, $breadcrumbContent);
    }

    private function fillBreadcrumb()
    {
        $resource = $this->argument('name');
        return $this->fillStub('breadcrumb');
    }

    public function addResourceSeeder()
    {
        $seederFile = database_path() . '/seeders/DatabaseSeeder.php';
        $seederContent = file_get_contents($seederFile);
        $seederStubContent = $this->fillSeeder();
        $seederContent = Str::replace('#COMMAND_GENERATED_SEEDERS#', $seederStubContent, $seederContent);
        File::put($seederFile, $seederContent);
    }

    private function fillSeeder()
    {
        return $this->fillStub('resourceSeeder');
    }

    private function setConstants(){
        $resource = $this->argument('name');

        $this->constants = [
            '{{LOWER_PLURAL_RESOURCE}}' => Str::lower(Str::plural($resource)),
            '{{PLURAL_RESOURCE}}' => Str::ucfirst(Str::plural($resource)),
            '{{LOWER_RESOURCE}}' => Str::lower($resource),
            '{{RESOURCE}}' => Str::ucfirst($resource),
        ];
    }
}
