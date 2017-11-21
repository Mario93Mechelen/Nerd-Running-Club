@extends('master')

@section ('content')

    <div class="ranking">

        <h1>Top 5 Longest Runs</h1>

        @foreach($winners as $w)

            <div class="number number1">
            <h2>1</h2>
            <h3>{{$w[1]->user_id}}</h3>
            <p>{{$w[1]->distance}} miles</p>
            </div>

            <div class="number number2">
            <h2>2</h2>
            <h3>{{$w[2]->user_id}}</h3>
            <p>{{$w[2]->distance}} miles</p>
            </div>


            <div class="number number3">
            <h2>3</h2>
            <h3>{{$w[3]->user_id}}</h3>
            <p>{{$w[3]->distance}} miles</p>
            </div>

            <div class="number number4">
                <h2>4</h2>
            <h3>{{$w[4]->user_id}}</h3>
            <p>{{$w[4]->distance}}</p>
            </div>

            <div class="number number5">
                <h2>5</h2>
            <h3>{{$w[5]->user_id}}</h3>
            <p>{{$w[5]->distance}}</p>
            </div>

        @endforeach

    </div>


@endsection