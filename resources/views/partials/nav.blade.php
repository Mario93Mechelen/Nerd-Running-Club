
<div class="nav">

    <a class="profile-logo" href="/profile">
        <img src="/img/logorunapp.png" alt="Logo Nerd Running App">
    </a>

    <div class="notifications"  v-on:click="showMobileMenu = !showMobileMenu">
        <p>Notifications</p>
        @if($notifications->count()>0)
        <transition name="fade">
        <p class="circle" v-show="!showMobileMenu">{{$notifications->count()}}</p>
        </transition>
        @endif
    </div>
    
    <a class="logout" href="/logout">
        <img src="/img/logout.png" alt="Log out">
    </a>
    <transition name="expand">
    @include('partials.notificationsbox')
    </transition>
</div>

