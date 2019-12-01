<?php

namespace App\Console\Commands;

use App\Models\CarMark;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;

class DownloadCarMarks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car:marks';

    private $url = 'https://maxi.ecat.ua/api/desktop/v1/vehicle-brands/?is_common=1&limit=1000';

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
        $client = new Client();
        $response = $client->request('GET', $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'authorization' => 'ApiKey RGL_MAXI:c64e3ad97e6e2e84475f36f1edb9dbf4',
            ]
        ]);
        $result = $response->getBody()->getContents();
        $result = json_decode($result, true);

        foreach ($result['objects'] as $model) {
            $carModel = new CarMark();
            $carModel->id = $model['id'];
            $carModel->name = $model['name'];
            $carModel->save();
        }

    }
}
