@extends('layouts.app')

@section('content')
{{--    <div class="container">--}}
{{--        <?php var_dump(session()->all()) ?>--}}
{{--        <div class="row">--}}
{{--        @if ($dataWeather)--}}
{{--            <div class="col col-md-2">--}}
{{--                <p>You city: {{$dataWeather->name}}</p>--}}
{{--            </div>--}}
{{--            <div class="col col-md-4">--}}
{{--                <p>Temp on you city: {{$dataWeather->main->temp - 273}}C</p>--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="col col-md-4">--}}
{{--                <p>You city not found on system. Info for: {{$defaultDataWeather->name}}</p>--}}
{{--            </div>--}}
{{--            <div class="col col-md-4">--}}
{{--                <p>Temp on {{ $defaultDataWeather->name }}: {{$defaultDataWeather->main->temp - 273}}C</p>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
