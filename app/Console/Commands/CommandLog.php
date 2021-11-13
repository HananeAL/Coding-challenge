<?php

namespace App\Http\Controllers;

use App\Traits\CommandLogging;
use Illuminate\Console\Command;

class CommandLog extends Command
{
    use CommandLogging;
}
