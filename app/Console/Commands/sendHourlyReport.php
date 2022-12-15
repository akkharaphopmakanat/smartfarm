<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ReportHistory;
use App\Models\fielddata;


class sendHourlyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:savedata';

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
     * @return int
     */
    public function handle()
    {
        $list = fielddata::pluck('plant_id')->toArray();
        foreach($list as $fuck){
            $temp = fielddata::where('plant_id',$fuck)->get()->first();
            ReportHistory::create(
                [
                    'plant_id'=>$temp->plant_id,
                    'moise'=>$temp->moise,
                    'hum'=>$temp->hum,
                    'temp'=>$temp->temp,
                    'light'=>$temp->light,
                    'nutrient'=>$temp->nutrient,
                ]
            );
        }


        return 0;
    }
}
