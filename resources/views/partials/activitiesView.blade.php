<div class="run">

    <div id="date">

        <h1>{{ $a->name }}</h1>

    </div>

    <div class="activity-flex">

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
            @if ( $a->latitude == NULL || $a->latitude == NULL  )
                <p class="mapsnotavailable">Maps is not available.</p>
            @else
                <img src="{{ $a->googleMaps( $a->latitude, $a->longitude ) }}" alt="Error Loading Maps">
            @endif
        </div>

    </div>

</div>