<?php

namespace Soamn\Maple\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'maple:install {component}';
    protected $description = 'Publish a Maple UI Blade component';

    public function handle()
    {
        $component = $this->argument('component');

        $source = __DIR__ . '/../resources/views/components/maple/' . $component . '.blade.php';
        $destination = resource_path("views/components/maple/{$component}.blade.php");

        if (!File::exists($source)) {

            $this->error("Component [{$component}] not found.");
            return;
        }

        File::ensureDirectoryExists(dirname($destination));
        File::copy($source, $destination);
        $this->info("Component [{$component}] installed successfully.");
    }
}
