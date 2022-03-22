<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Services\AdviceAPIService;

class ReadExternalApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'read:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read advice Api';

    protected $adviceAPIService;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(AdviceAPIService $adviceAPIService)
    {
        parent::__construct();
        $this->adviceAPIService = $adviceAPIService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

         $apiUrl = 'https://api.adviceslip.com/advice';

         $advice_request = $this->adviceAPIService->getCurl($apiUrl);
         $adviceDecode = json_decode($advice_request, true);

         $dailyAdvice = $adviceDecode['slip']['advice'];

         var_dump($dailyAdvice);
         //a partir daqui é salvar numa tabela advice esse campo $dailyAdvice
    }
}
