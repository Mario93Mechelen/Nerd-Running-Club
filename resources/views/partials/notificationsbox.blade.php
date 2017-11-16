<div class="box" v-show="showMobileMenu">
    @foreach($notifications as $notification)
    <div class="notification">
        <img src="{{ $notification->avatar  }}" alt="{{ $notification->firstname  }} {{ $notification->lastname  }}">
        <p>{{$notification->firstname}} follows you now!</p>
        <form action="/profile" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="userid" value="{{$notification->id}}">
        <button class="btn btn-follow">Follow back</button>
        </form>
    </div>
    @endforeach
</div>