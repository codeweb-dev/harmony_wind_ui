<?php

namespace App\Providers;

use Illuminate\Container\Attributes\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($dbUrl = env('DB_URL')) {
            // Parse the DB URL to extract connection details
            $url = parse_url($dbUrl);

            // Set database configuration dynamically
            config([
                'database.connections.mysql.host' => $url['host'],
                'database.connections.mysql.port' => $url['port'],
                'database.connections.mysql.database' => ltrim($url['path'], '/'),
                'database.connections.mysql.username' => $url['user'],
                'database.connections.mysql.password' => $url['pass'],
            ]);

            // Optional: Test the connection
            try {
                DB::connection()->getPdo();
            } catch (\Exception $e) {
                // Handle connection errors
                dd('Could not connect to the database. Please check your configuration.', $e->getMessage());
            }
        }
    }
}
