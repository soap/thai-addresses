<?php

namespace Soap\ThaiProvinces\Commands;

use Illuminate\Console\Command;

class ThaiProvincesInstallCommand extends Command
{
    public $signature = 'thai-provinces:install';

    public $description = 'Install thai provinces database';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
