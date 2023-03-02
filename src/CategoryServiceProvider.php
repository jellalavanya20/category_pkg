<?php
namespace Indianic\Category;

use Indianic\Category\Nova\Resources\Category;
use Indianic\Category\Policies\CategoryPolicy;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setModulePermissions();

        Gate::policy(\Indianic\Category\Models\Category::class, CategoryPolicy::class);

        Nova::serving(function (ServingNova $event) {

            Nova::resources([
                Category::class,
            ]);

        });

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Set Cms Pages module permissions
     *
     * @return void
     */
    private function setModulePermissions(): void
    {
        $existingPermissions = config('nova-permissions.permissions');

        $existingPermissions['view category'] = [
            'display_name' => 'View category',
            'description'  => 'Can view category pages',
            'group'        => 'Category Page'
        ];

        $existingPermissions['create category'] = [
            'display_name' => 'Create category pages',
            'description'  => 'Can create category pages',
            'group'        => 'Category Page'
        ];

        $existingPermissions['update category'] = [
            'display_name' => 'Update category pages',
            'description'  => 'Can update category pages',
            'group'        => 'Category Page'
        ];

        $existingPermissions['delete category'] = [
            'display_name' => 'Delete category pages',
            'description'  => 'Can delete category pages',
            'group'        => 'Category Page'
        ];

        \Config::set('nova-permissions.permissions', $existingPermissions);
    }
}
