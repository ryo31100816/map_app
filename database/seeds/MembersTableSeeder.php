<?php
require 'vendor/autoload.php';

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 2; $i <= 10; $i++){
            $address = $faker->address;
            $latlng = $this->getLatLng($address);
            App\Member::create([
                'user_id' => $i,
                'name' => App\User::find($i)->name,
                'address' => $address,
                'latitude' => $latlng['lat'],
                'longitude' => $latlng['lng'],
            ]);
        }
    }

    public function getLatLng($address){
        $http_client = new Client();
        $url = 'https://maps.googleapis.com/maps/api/geocode/json';
        $api_key = config('services.google-map-free.apikey');
        
        try {
            $response = $http_client->request('GET', $url, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'query' => [
                    'key' => $api_key,
                    'language' => 'ja',
                    'address' => $address,
                ],
                'verify' => false,
            ]);
        } catch (ClientException $e) {
            throw $e;
        }

        $results = json_decode($response->getBody(),true);
        $latlng = $results['results'][0]['geometry']['location'];
        return $latlng;
    }
}
