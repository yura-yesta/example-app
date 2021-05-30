<?php

namespace App\Console\Commands;

use App\zohoService;
use Illuminate\Console\Command;

class zohoParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zoho:deals{id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to get deals';

    /**
     * Create a new command instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        parent::__construct();
//    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $zohoId = ($this->argument('id'));
        (new zohoService)->callApi($zohoId);

    }
}
