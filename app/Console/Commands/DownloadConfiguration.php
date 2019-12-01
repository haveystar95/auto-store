<?php

namespace App\Console\Commands;

use App\Models\CarModel;
use App\Models\ModelConfiguration;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class DownloadConfiguration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car:configuration';
    private $url = 'https://maxi.ecat.ua/api/desktop/v1/vehicles/?limit=1000';

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
        $allModels = CarModel::all();

        foreach ($allModels as $model) {
            if (ModelConfiguration::where('car_model_id', $model->id)->exists()) {
                echo "Skip " . $model->id . "\n";
                continue;
            }
            $modelParam = '&vehiclemodel_id=' . $model->id;


            $client = new Client();
            $response = $client->request('GET', $this->url . $modelParam, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'authorization' => 'ApiKey RGL_MAXI:c64e3ad97e6e2e84475f36f1edb9dbf4',
                ]
            ]);
            $result = $response->getBody()->getContents();
            $result = json_decode($result, true);

            foreach ($result['objects'] as $conf) {
                echo $model->id . "\n";
                $conf['engines'] = $conf['engines'][0] ?? null;
                $conf['axletype'] = is_array($conf['axletype']) ? json_encode($conf['axletype']) : null;
                $conf['bodytype'] = is_array($conf['bodytype']) ? json_encode($conf['bodytype']) : null;
                $conf['homologation_numbers'] = is_array($conf['homologation_numbers']) ? json_encode($conf['homologation_numbers']) : null;
                unset($conf['brand']);
                unset($conf['vehiclemodel']);
                $model->modelConfiguration()->create($conf);
            }

        }

    }
}
