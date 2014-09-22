<?php namespace Codeboard\TaskRunner;

use Illuminate\Support\Facades\Log;
use Remote;

class TaskRunner {

    function __construct()
    {
    }

    function installCommand($git, $branch, $location, $domainId)
    {
        return Remote::run(['cd '.base_path().'; ~/.composer/vendor/bin/envoy run install --git='.$git.' --branch='.$branch.' --location='.$location], function($line) {
            Log::info($line);
            echo $line.'<br />';
        });
    }

    function updateCommand($git, $branch, $location, $domainId)
    {
        return Remote::run(['cd '.base_path().'; ~/.composer/vendor/bin/envoy run update --git='.$git.' --branch='.$branch.' --location='.$location], function($line) {
            Log::info($line);
            echo $line.'<br />';
        });
    }
}