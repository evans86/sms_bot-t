<?php

namespace Database\Seeders;

use App\Models\Resource\SmsResource;
use DB;
use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = [
            'id' => SmsResource::ACTIVATE_ID,
            'title' => 'activate',
            'image' => '/img/resource/sms-activate.svg',
            'ref' => ''
        ];
        $data[] = [
            'id' => SmsResource::SIM5_ID,
            'title' => '5sim',
            'image' => '/img/resource/5sim.svg',
            'ref' => ''
        ];


        DB::table('resource')->insert($data);
    }
}
