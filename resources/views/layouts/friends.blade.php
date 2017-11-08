@extends('master')

@section('content')

    <div class="friends">

        <h2>My friends</h2>

        <ul>

            @foreach ($res as $result)

                <li>
                    <a href="/friends/{{ $result->strava_id  }}">
                        <img src="{{ $result->avatar  }}" alt="{{ $result->firstname  }} {{ $result->lastname  }}">
                    </a>
                    <a class="friendslink" href="/friends/{{ $result->strava_id  }}">{{ $result->firstname  }} {{ $result->lastname  }}</a>
                </li>

            @endforeach

        </ul>

    </div>

@endsection