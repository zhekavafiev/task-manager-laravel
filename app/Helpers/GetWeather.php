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
    private $API_WEATHER;
    
    public function __construct($user)
    {
        $this->user =  $user;
        $this->API_WEATHER = getenv('API_WEATHER');

        if ($this->user) {
            $this->city = $this->user->city;
        }
    }

    private function getWeather()
    {
        $response = Http::get("api.openweathermap.org/data/2.5/weather?q={$this->city}&appid={$this->API_WEATHER}");
        if ($response->status() == 400) {
            $this->findCity = 0;
            $response = Http::get("api.openweathermap.org/data/2.5/weather?q={$this->defaultCity}&appid={$this->API_WEATHER}");
        }
        $this->weather = json_decode($response->body());
    }

    public function setSession()
    {
        $this->getWeather();
        // dd($this->weather, $this->API_WEATHER, getenv('APP_NAME'));
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
        // dd($this->weather, $this->API_WEATHER, env('API_WEATHER'));
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