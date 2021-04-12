<?php 
$user = Auth::user();
?>

<nav>
    <div class="left logo"><a class="nav-link" href="/">Eventually</a></div>
    <div class="right">
        <div class="nav-item-list ">
            <a class="nav-link" href="/">Home</a>
            @if(isset($user))
            <a class="nav-link" href="/logout">Logout</a>
            @else
            <a class="nav-link" href="/login">Login</a>
            @endif
        </div>
    </div>
</nav>