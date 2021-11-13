<?php

namespace App\Traits;

trait CommandLogging
{
    protected function logErrors($msg, $errors)
    {
        $this->info($msg);
        foreach ($errors as $error) {
            $this->error($error[0]);
        }
    }
}
