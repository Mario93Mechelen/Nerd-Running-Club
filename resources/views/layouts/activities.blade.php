@extends('master')

@section('content')

    <div class="latestruns">

        <h2>My activities</h2>

        @foreach ($activity as $a)

        @include('partials/activitiesView')

        @endforeach


    </div>

    @endsection
