<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class ConfirmCodeGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:generate {value?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set confirm code for user login';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $value = $this->argument('value');

        if ($value && strlen($value) < 6) {
            return $this->components->error('Code must be >= 6 characters');
        }

        if ($this->confirm('Are you sure change the confirmation code?')) {
            $code = $value ?: $this->generateCode();

            $this->setEnvironmentValue($code);

            $this->components->info('Confirm code set successfully. copy: ['.$code.']');
        }
    }

    private function generateCode()
    {
        return md5(env('APP_KEY'));
    }

    private function setEnvironmentValue($code) {
        file_put_contents(App::environmentFilePath(), str_replace(
            'APP_CONFIRM_CODE='.env('APP_CONFIRM_CODE'),
            'APP_CONFIRM_CODE='.$code,
            file_get_contents(App::environmentFilePath())
        ));

        if (file_exists(App::getCachedConfigPath())) {
            Artisan::call("config:cache");
        }
    }
}
