@extends('master')

@section('content')

    <div class="friends">

        <h2>Find some buddies to go the extra mile with!</h2>

        <a href="/ranking">Go to the ranking</a>

        <ul>
            <div class="justfriends">
            @foreach ($friends as $user)
                <li>
                    <a href="/friends/{{ $user->id  }}">
                        <div class="name"><p>{{$user->firstname}}</p></div>
                        <img src="{{ $user->avatar  }}" alt="{{ $user->firstname  }} {{ $user->lastname  }}">
                    </a>
                    <form action="/friends" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="userid" value="{{$user->id}}">
                        <input type="hidden" name="action" value="delete">
                        <button class="btn btn-unfollow" type="submit">Unfollow</button>
                    </form>
                    <p class="warn">You are friends!</p>
                </li>
            @endforeach
            </div>

                <div class="following">
                @foreach ($following as $user)
                    <li>
                        <a href="/friends/{{ $user->id  }}">
                            <div class="name"><p>{{$user->firstname}}</p></div>
                            <img src="{{ $user->avatar  }}" alt="{{ $user->firstname  }} {{ $user->lastname  }}">
                        </a>
                        <form action="/friends" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="userid" value="{{$user->id}}">
                            <input type="hidden" name="action" value="delete">
                            <button class="btn btn-unfollow" type="submit">Unfollow</button>
                        </form>
                        <p class="warn two">Are you still waiting for {{$user->firstname}} to like you back?</p>
                    </li>
                @endforeach
                @foreach ($followers as $user)
                    <li>
                        <a href="/friends/{{ $user->id  }}">
                            <div class="name"><p>{{$user->firstname}}</p></div>
                            <img src="{{ $user->avatar  }}" alt="{{ $user->firstname  }} {{ $user->lastname  }}">
                        </a>
                        <form action="/friends" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="userid" value="{{$user->id}}">
                            <input type="hidden" name="action" value="store">
                            <button class="btn btn-follow" type="submit">Follow</button>
                        </form>
                        <p class="warn">{{$user->firstname}} follows you!</p>
                    </li>
                @endforeach
                </div>

            <div class="follower">
            @foreach ($res as $user)
                        <li>
                            <a href="/friends/{{ $user->id  }}">
                                <div class="name"><p>{{$user->firstname}}</p></div>
                                <img src="{{ $user->avatar  }}" alt="{{ $user->firstname  }} {{ $user->lastname  }}">
                            </a>
                            <form action="/friends" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="userid" value="{{$user->id}}">
                                <input type="hidden" name="action" value="store">
                                <button class="btn btn-follow" type="submit">Follow</button>
                            </form>
                        </li>
                @endforeach
            </div>
        </ul>

    </div>

@endsection