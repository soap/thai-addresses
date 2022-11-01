<?php

namespace Soap\ThaiAddresses\Commands;

use Illuminate\Console\Command;

class ThaiAddressesInstallCommand extends Command
{
    public $signature = 'thai-addresses:install';

    public $description = 'Install thai provinces database';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
