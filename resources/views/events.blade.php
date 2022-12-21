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
                <div class="container card w-50 p-3 mb-3 grid">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h2>{{$event->title}}</h2>
                        </div>
                        <div class="col-auto">
                            <p>{{$event->created_at->format('l j F Y H:i:s')}}</p>
                        </div>
                        <p>{{$event->body}}</p>
                    </div>
                    <img class="card-img" src="{{asset('storage/' . $event->thumbnail)}}" alt="image for {{$event->title}}">
                </div>
            @endforeach
        </div>
    </section>
@endsection

