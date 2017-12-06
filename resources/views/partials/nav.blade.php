
<div class="nav">

    <a class="profile-logo" href="/profile">
        <img src="/img/logorunapp.png" alt="Logo Nerd Running App">
    </a>

    <div class="profile">

        <a href="/profile"> <img  src="{{$currentuser->avatar}}" alt="Profile Pic"></a>
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
<nav class="innerNav" v-show="showMobileMenu">
    <a href="/profile">
        Home
    </a>
    <a href="/friends/type/all">
        Friends
    </a>
    <a href="/activities">
        Heatmap
    </a>
    <a href="/achievements">
        Badges
    </a>
    <a href="/logout">
        Logout
    </a>
</nav>
    <div class="hamburger" v-on:click="showMobileMenu = !showMobileMenu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <transition name="expand">
    @include('partials.notificationsbox')
    </transition>
</div>

