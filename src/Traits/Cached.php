<?php

trait Cache {

    function checkCachedFileExists() {
        if ($this->option('cached')) {
            if (! file_exists($this->cachedFile)) {
                $this->error("--cached was specified but the file $this->cachedFile does not exist");

                return;
            }

            return file_get_contents($this->cachedFile);
        }
    }
    
}