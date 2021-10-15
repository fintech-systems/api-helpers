<?php

namespace FintechSystems\LaravelApiHelpers\Commands;

use Illuminate\Console\Command;

class LaravelApiHelpersCommand extends Command
{
    protected $name = 'placeholder'; // Avoid The command defined in "..." cannot have an empty name.

    public function checkCachedFileExists()
    {
        if ($this->option('cached')) {
            if (! file_exists($this->cachedFile)) {
                $this->error("--cached was specified but the file $this->cachedFile does not exist");

                return false;
            }

            return file_get_contents($this->cachedFile);
        }
    }
}
