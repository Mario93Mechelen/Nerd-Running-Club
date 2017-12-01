<div class="run">

    <div id="date">

        <h1>{{ $a->name }}</h1>

    </div>

    <div class="activity-flex">

        <div id="info">

            <div id="distance">

                <h3>Distance</h3>
                <p>{{round($a->distance*0.000621371192,2)}} miles</p>

            </div>

            <div id="time">

                <h3>Av. Speed</h3>
                <p>{{round($a->averageSpeed*2.237,2)}} mph</p>

            </div>

            <div id="time">

                <h3>Total time</h3>
                <p>{{round($a->time/60)}} mins</p>

            </div>

        </div>

        <div class="mapsactivity">
            @if ( $a->address == "no address")
                <p class="mapsnotavailable">Maps is not available.</p>
            @else
                <iframe width="200" height="200" src="//www.google.com/maps/embed/v1/place?q={{$a->address}}&zoom=10&key=AIzaSyAuVtcvIZX0MMqEZrJ2_ghI2MsWQ5MmvPM">
                </iframe>
            @endif
        </div>

    </div>

</div>