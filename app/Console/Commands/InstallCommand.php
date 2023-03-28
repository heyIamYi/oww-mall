<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProductSeeder;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oww:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For install oww-mall project basic info';

    protected $seeders = [
        'UserSeeder',
        'ProductSeeder'
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:fresh');

        foreach ($this->seeders as $seeder)
        {
            $this->call('db:seed', [
                '--class' => $seeder
            ]);
        }
    }
}
