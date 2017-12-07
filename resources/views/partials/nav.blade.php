
<div class="nav">

    <a class="profile-logo" href="/profile">
        <img src="/img/logorunapp.png" alt="Logo Nerd Running App">
    </a>

    <div class="profile">

        <a href="/friends/{{$currentuser->id}}"> <img  src="{{$currentuser->avatar}}" alt="Profile Pic"></a>
        <h3>{{$currentuser->firstname." ".$currentuser->lastname}} </h3>

    </div>

    <div class="notifications"  v-on:click="showMobileMenu = !showMobileMenu">
        <img src="/img/notifications.png" alt="notifications" id="notif">
        @if($notifications->count()>0)
        <transition name="fade">
        <p class="circle" v-show="!showMobileMenu">{{$notifications->count()}}</p>
        </transition>
        @endif
    </div>

    <transition name="slide-fade">
<nav class="innerNav" v-show="showMobileMenu">
    <a href="/dashboard">
        Home
    </a>
    <a href="/users/type/all">
        Friends
    </a>
    <a href="/users/{{$currentuser->id}}">
        Profile
    </a>
    <a href="/achievements">
        Badges
    </a>
    <a href="/logout">
        Logout
    </a>
</nav>
    </transition>

    </a>

    <div class="hamburger" v-on:click="showMobileMenu = !showMobileMenu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <transition name="expand">
    @include('partials.notificationsbox')
    </transition>
</div>

