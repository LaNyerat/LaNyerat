<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class nyerat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nyerat:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build LaNyerat';

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
        $this->call('migrate');
        $this->call('db:seed');
    }
}
