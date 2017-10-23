@extends('master')

@section('content')

    <div class="friends">

        <h1>My friends</h1>

        <form action="" method="POST">

            <input type="text" name="search" id="search" placeholder="Find a friend">

            <input type="submit" value="Search">

        </form>

        <ul>

            <li>Friend 1</li>
            <li>Friend 2</li>
            <li>Friend 3</li>

        </ul>

    </div>

@endsection