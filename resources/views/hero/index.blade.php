@extends('layouts/app')

@section('content')

<h1>The hero roster</h1>

<div class="heroes"></div>
@foreach ($heroes as $hero)
    <div style="width: 300px;" class="hero">
        <h2>{{ $hero->name }}</h2>
        <p>{{ $hero->backstrory }}</p>
        <p>Available from: {{$hero->available_from}}</p>
        <p>Available until: {{$hero->available_until}}</p>
        <img style="width: 200px; border-radius: 150px;" src="{{ asset('img/'.$hero->slug.'.jpg') }}" alt=""><br>
        <a href="{{action('HeroController@show', [$hero->slug])}}"><b>Go to Page</b></a>
        <br><br>
    </div>
@endforeach
</div>

@endsection