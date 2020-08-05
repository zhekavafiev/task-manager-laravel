<div class="row justify-content-center bg-dark text-white">
    @if ($weather)
        @if ($weather['find'] == 1)
        <div class="col col-md-3">
                <p>You city: {{$weather['city']}}</p>
            </div>
            <div class="col col-md-3 text-right">
                <p>Temperature on {{$weather['city']}}: {{$weather['temp']}}C</p>
            </div>
        @elseif ($weather['find'] == 0)
            <div class="col col-md-4 text-right">
                You city not found on system. Info for: {{$weather['city']}}
            </div>
            <div class="col col-md-4">
                Temp on {{ $weather['city'] }}: {{$weather['temp']}}C
            </div>
        @endif
    @endif
</div>
