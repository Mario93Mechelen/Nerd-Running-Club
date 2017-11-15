@extends('master')

@section('content')

    <div class="badges">

        <h2>Your earned badges</h2>
        <h4>For every achievement, you earn a badge!</h4>

        <div class="badges_filled">

            @foreach ($badges as $b)

                @foreach ($badge as $earned)

                    @if ($earned->id == $b->id)

                        <!-- Als id badge = id behaald badge -> opacity 1 -->

                        <div class="badge badge_filled">

                            <img src="{{ $b->badgeurl }}">

                            <p>{{ $b->badgetext }}</p>

                        </div>

                    @else

                        <div class="badge badge_unfilled">

                            <img src="{{ $b->badgeurl }}">

                            <p>{{ $b->badgetext }}</p>

                        </div>

                    @endif

                @endforeach

            @endforeach

        </div>

    </div>


@endsection