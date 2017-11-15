@extends('master')

@section('content')

    <div class="friends">

        <h2>My friends</h2>

        <ul>

            @foreach ($res as $result)

                <li>
                    <a href="/friends/{{ $result->id  }}">
                        <img src="{{ $result->avatar  }}" alt="{{ $result->firstname  }} {{ $result->lastname  }}">
                    </a>
                    <form action="/friends" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="userid" value="{{$result->id}}">
                    <button class="btn btn-follow" type="submit">Follow</button>
                    </form>
                </li>

            @endforeach

        </ul>

    </div>

@endsection