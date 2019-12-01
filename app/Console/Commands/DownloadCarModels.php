<?php

namespace App\Console\Commands;

use App\Models\CarMark;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class DownloadCarModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car:models';

    private $url = 'https://maxi.ecat.ua/api/desktop/v1/vehicle-models/?vehicletype_id=1&vehicletype_id=2&limit=1000';

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
        $allMarks = CarMark::all();

        foreach ($allMarks as $mark) {
            $brandParam = '&brand_id=' . $mark['id'];

            $client = new Client();
            $response = $client->request('GET', $this->url . $brandParam, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'authorization' => 'ApiKey RGL_MAXI:c64e3ad97e6e2e84475f36f1edb9dbf4',
                ]
            ]);
            $result = $response->getBody()->getContents();
            $result = json_decode($result, true);

            foreach ($result['objects'] as $model) {
                $mark->carModel()->create([
                    'id' => $model['id'],
                    'name' => $model['name'],
                    'vehiclemodel_type_id' => $model['vehiclemodel_type_id'],
                    'year_from' => $model['year_from'],
                    'year_to' => $model['year_to'],
                    'car_mark_id' => $mark->id,

                ]);

            }
        }


    }
}
