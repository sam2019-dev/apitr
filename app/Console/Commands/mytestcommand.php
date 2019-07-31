<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class mytestcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:hello {arg1},{arg2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arg1 = $this->argument('arg1');
        $arg2 = $this->argument('arg2');
        echo ($arg1+$arg2);
    }
}
