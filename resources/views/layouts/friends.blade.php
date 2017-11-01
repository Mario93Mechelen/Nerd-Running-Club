@extends('master')

@section('content')

    <div class="friends">

        <h2>My friends</h2>

        <!--<form action="" method="POST">

            <input type="text" name="search" id="search" placeholder="Find a friend">

            <input type="submit" value="Search">

        </form>-->

        <ul>

            @foreach ($res as $result)

                <li>
                    <a href="/friends/{{ $result->id  }}">
                        <img src="{{ $result->profile_medium  }}" alt="{{ $result->firstname  }} {{ $result->lastname  }}">
                    </a>
                    <a class="friendslink" href="/friends/{{ $result->id  }}">{{ $result->firstname  }} {{ $result->lastname  }}</a>
                </li>

            @endforeach

        </ul>

    </div>

@endsection