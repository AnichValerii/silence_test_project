<?php

namespace App\Console\Commands;

use App\Interfaces\SilenceXmlConvertor;
use Illuminate\Console\Command;

class ConvertSilenceXml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:xml
                            {path : Path to xml file with silence intervals}
                            {transition_interval : Duration in seconds for indicating a chapter transition}
                            {maximum_duration : Maximum duration in seconds of chapter segment}
                            {split_interval : A silence duration which can be used to split a long chapter}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Converting xml with list of silence intervals to json with list of book segments';

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
     * @param SilenceXmlConvertor $generator
     * @return int
     */
    public function handle(SilenceXmlConvertor $generator)
    {
        $result = $generator->generateJson(
            $this->argument('path'),
            $this->argument('transition_interval'),
            $this->argument('maximum_duration'),
            $this->argument('split_interval'));
        var_dump($result);
        return Command::SUCCESS;
    }
}
