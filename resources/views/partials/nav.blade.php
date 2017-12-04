
<div class="nav">

    <a class="profile-logo" href="/profile">
        <img src="/img/logorunapp.png" alt="Logo Nerd Running App">
    </a>

    <div class="notifications"  v-on:click="showMobileMenu = !showMobileMenu">
        <img src="/img/notifications.png" alt="notifications" id="notif">
        @if($notifications->count()>0)
        <transition name="fade">
        <p class="circle" v-show="!showMobileMenu">{{$notifications->count()}}</p>
        </transition>
        @endif
    </div>

    <a class="profilelink" href="/profile">
        <p>home</p>
    </a>
    
    <a class="logout" href="/logout">
        <p>logout</p>
    </a>

    <transition name="expand">
    @include('partials.notificationsbox')
    </transition>
</div>

