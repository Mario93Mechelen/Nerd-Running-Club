@extends('master')

@section('content')

    <div class="latestruns">

        @foreach ($activity as $a)

        @include('partials/activitiesView')

        @endforeach


    </div>

    @endsection
