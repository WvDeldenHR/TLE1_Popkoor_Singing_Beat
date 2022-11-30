@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Events</h1>
        </div>
    </section>
    <x-search/>
    <section class="section">
        <div class="container">
            @foreach($events as $event)
                <div class="container card w-50 p-3 mb-3">
                    <div class="grid">
                        <div class="row">
                            <h2>{{$event->title}}</h2>
                            <p>{{$event->body}}</p>
                        </div>
                    </div>
                    <img class="card-img-bottom" src="{{asset('storage/' . $event->thumbnail)}}">
                </div>
            @endforeach
        </div>
    </section>
@endsection

