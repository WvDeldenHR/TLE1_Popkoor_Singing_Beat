@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Events</h1>
            @foreach($events as $event)
                <div class="container card w-50 p-3">
                    <h2>{{$event->title}}</h2>
                    <p>{{$event->body}}</p>
                    <img class="card-img-bottom" src="{{asset('storage/' . $event->thumbnail)}}">
                </div>
            @endforeach
        </div>
    </section>
@endsection

