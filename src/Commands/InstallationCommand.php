<?php

namespace ZapsterStudios\Ally\Commands;

use DB;
use Illuminate\Console\Command;

class InstallationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ally:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish ally install-stubs.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (! $this->checkConnection()) {
            $this->error('Incorrect database credentials... SQL connection required for installation!');

            return;
        }

        if (! $this->confirm('Existing changes will be overwritten. Do you wish to continue?')) {
            return;
        }

        $this->comment('> Starting Laravel Ally installation.');
        $this->line('');

        $publishers = collect([
            Publish\PublishConfig::class,
            Publish\PublishDatabase::class,
            Publish\PublishEnv::class,
            Publish\PublishExceptions::class,
            Publish\PublishMiddlewares::class,
            Publish\PublishModels::class,
            Publish\PublishProviders::class,
            Publish\PublishRoutes::class,
        ]);

        $publishers->each(function ($publisher) {
            (new $publisher($this))->publish();
        });

        $this->line('');
        $this->comment('> Running migrations.');
        $this->call('migrate');

        $this->line('');
        $this->comment('> Installing Passport.');
        $this->call('passport:install');

        $this->line('');
        $this->comment('> Compleated Laravel Ally installation.');
    }

    private function checkConnection()
    {
        try {
            DB::select('SELECT 1');

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
