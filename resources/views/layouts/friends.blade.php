@extends('master')

@section('title', 'Friends')

@section('content')

    <div class="friends">

        <h2>Find some buddies to go the extra mile with!</h2>

        <a href="/ranking" id="rankingLink">Go to the ranking</a>

        <div class="friendsNav">
            <a @if($type == 'friends') class="active" @endif href="/friends/type/friends">Friends</a>
            <a @if($type == 'followers') class="active" @endif href="/friends/type/followers">Followers</a>
            <a @if($type == 'following') class="active" @endif href="/friends/type/following">Following</a>
            <a @if($type == 'all') class="active" @endif href="/friends/type/all">All Users</a>
        </div>

        <ul>
            @if($type == 'friends')
            <div class="justfriends">
            @foreach ($friends as $user)
                <li>
                    <a href="/friends/{{ $user->id  }}">
                        <div class="name"><p>{{$user->firstname}} {{$user->lastname}}</p></div>
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
            @endif


                
                <div class="following">
                @if($type == 'following')
                @foreach ($following as $user)
                    <li>
                        <a href="/friends/{{ $user->id  }}">
                            <div class="name"><p>{{$user->firstname}} {{$user->lastname}}</p></div>
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
                @endif

                @if($type == 'followers')
                @foreach ($followers as $user)
                    <li>
                        <a href="/friends/{{ $user->id  }}">
                            <div class="name"><p>{{$user->firstname}} {{$user->lastname}}</p></div>
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
                @endif
                </div>
                

            @if($type == 'all')
            <div class="follower">
            @foreach ($res as $user)
                        <li>
                            <a href="/friends/{{ $user->id  }}">
                                <div class="name"><p>{{$user->firstname}} {{$user->lastname}}</p></div>
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
            @endif
        </ul>

    </div>

@endsection