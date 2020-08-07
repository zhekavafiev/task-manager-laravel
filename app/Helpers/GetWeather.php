<?php

namespace App\Helpeers\GetWeather;

use Illuminate\Support\Facades\Http;

class Weather
{
    private $weather;
    private $city = null;
    public $defaultCity = 'Moscow';
    private $user;
    private $findCity = 1;
    private $wetherKey;
    
    public function __construct($user)
    {
        $this->user =  $user;
        $this->wetherKey = getenv('API_WEATHER');

        if ($this->user) {
            $this->city = $this->user->city;
        }
    }

    private function getWeather()
    {
        $response = Http::get("api.openweathermap.org/data/2.5/weather?q={$this->city}&appid={$this->wetherKey}");
        if ($response->status() != 200) {
            $this->findCity = 0;
            $response =
                Http::get("api.openweathermap.org/data/2.5/weather?q={$this->defaultCity}&appid={$this->wetherKey}");
        }
        $this->weather = json_decode($response->body());
    }

    public function setSession()
    {
        $this->getWeather();
        if ($this->findCity == 1) {
            session()->put('weather', [
                'find' => $this->findCity,
                'city' => $this->city,
                'temp' => $this->weather->main->temp - 273
            ]);
        } elseif ($this->findCity == 0) {
            session()->put('weather', [
                'find' => $this->findCity,
                'city' => $this->defaultCity,
                'temp' => $this->weather->main->temp - 273
            ]);
        }
    }

    public function printWeather()
    {
        $this->getWeather();
        if ($this->findCity == 1) {
            return [
                'find' => $this->findCity,
                'city' => $this->city,
                'temp' => $this->weather->main->temp - 273
            ];
        } elseif ($this->findCity == 0) {
            return [
                'find' => $this->findCity,
                'city' => $this->defaultCity,
                'temp' => $this->weather->main->temp - 273
            ];
        }
    }
}
