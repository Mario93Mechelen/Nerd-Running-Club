@extends('master')

@section('title', 'Badges')

@section('content')

    <div class="badges">

        <h2>Your earned badges</h2>
        <h4>For every achievement, you earn a badge!</h4>

        <div class="badges_filled">

            @foreach($badges as $badge)
                @if(in_array($badge->id, $myBadges))
                    <div class="badge badge_filled">

                        <img src="{{ $badge->badgeurl }}">

                        <p>{{ $badge->badgetext }}</p>

                    </div>
                @else
                <div class="badge badge_unfilled">

                    <img src="{{ $badge->badgeurl }}">

                    <p>{{ $badge->badgetext }}</p>

                </div>
                @endif
            @endforeach


        </div>

    </div>


@endsection