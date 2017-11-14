<div class="run">

    <div id="date">

        <h1>{{ $a->name }}</h1>

    </div>

    <div id="info">

        <div id="distance">

            <h3>Distance</h3>
            <p>{{$a->distance}} m</p>

        </div>

        <div id="time">

            <h3>Av. Speed</h3>
            <p>{{$a->averageSpeed}} m/s</p>

        </div>

        <div id="time">

            <h3>Total time</h3>
            <p>{{$a->time}} sec</p>

        </div>

    </div>

    <div class="mapsactivity">
        {{ $a->mapsActivity( $a->latitude, $a->longitude ) }}
        {!! Mapper::render() !!}
    </div>

</div>