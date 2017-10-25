@extends('master')

@section('content')

    <div class="friends">

        <h1>My friends</h1>

        <!--<form action="" method="POST">

            <input type="text" name="search" id="search" placeholder="Find a friend">

            <input type="submit" value="Search">

        </form>-->

        <ul>

            @foreach ($res as $result)

                <li>
                    <img src="{{ $result->profile_medium  }}" alt="{{ $result->firstname  }} {{ $result->lastname  }}">
                    <a href="/friends/{{ $result->id  }}">{{ $result->firstname  }} {{ $result->lastname  }}</a>
                </li>

            @endforeach

        </ul>

    </div>

@endsection