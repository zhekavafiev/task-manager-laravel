<div class="row justify-content-center bg-dark text-white">
    @if ($weather)
        @if ($weather['find'] == 1)
        <div class="col col-md-3">
                <p>{{ __('weather_line.find_city') }}{{$weather['city']}}</p>
            </div>
            <div class="col col-md-3 text-right">
                <p>{{ __('weather_line.temp_on') }}{{$weather['city']}}: {{$weather['temp']}}C</p>
            </div>
        @elseif ($weather['find'] == 0)
        <div class="col col-md-3">
                <p>{{ __('weather_line.not_find_city') }}{{$weather['city']}}</p>
            </div>
            <div class="col col-md-3 text-right">
                <p>{{ __('weather_line.temp_on') }}{{ $weather['city'] }}: {{$weather['temp']}}C</p>
            </div>
        @endif
    @endif
</div>
