<?php

namespace App\Services\Activate;

use App\Models\Activate\SmsCountry;
use App\Models\Resource\ResourceCountry;
use App\Models\Resource\SmsResource;
use App\Services\MainService;
use App\Services\Resource\ResourceStrategy;

class ResourceService extends MainService
{
    public function addResourceCountry()
    {
        $resources = SmsResource::all();

        try {
            foreach ($resources as $resource) {
                $strategy = new ResourceStrategy($resource);
                $countries = $strategy->parseCountry();

                foreach ($countries as $country){

                    try {
                        $default_country = SmsCountry::where('name_en', $country['name_en'])->firstOrFail();

                        $data = [
                            'resource_id' => $resource->id,
                            'country_id' => $default_country->id,
                            'org_id' => $country['org_id']
                        ];
                        $resourceCountry = ResourceCountry::updateOrCreate($data);
                        $resourceCountry->save();
                    }catch (\Exception $e){
                        continue;
                    }
                }
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
