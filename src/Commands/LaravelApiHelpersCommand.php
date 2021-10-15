<?php

namespace FintechSystems\LaravelApiHelpers\Commands;

use Illuminate\Console\Command;

class LaravelApiHelpersCommand extends Command
{    
    // public $cachedFile = 'example.cache.json';

    protected $name = 'placeholder'; // Avoid The command defined in "..." cannot have an empty name. 
    
    public function checkCachedFileExists() {

        ray('Checking for the cached file');

        if ($this->option('cached')) {

            ray('The --cache option was specified so going to look for this cachedFile ' . $this->cachedFile);
            
            if (! file_exists($this->cachedFile)) {
                
                ray("Mmmm couldn't find the file")->red();

                $this->error("--cached was specified but the file $this->cachedFile does not exist");

                return false;
            }

            return file_get_contents($this->cachedFile);
        }
    }
        
}
