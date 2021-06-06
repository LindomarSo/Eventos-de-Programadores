@extends('layouts.main')

@section('title', $event->title)

@section('content')

    <section id="show">
        <div class="container">
            <div class="row">
                <div class="col-md-6 py-5">
                    <img 
                        src="/images/events/{{$event->image}}"
                        alt="/images/events/{{$event->image}}" 
                        class="img-fluid"
                    >
                </div>
                <div class="col-md-6 py-5 align-self-center">
                    <h3>{{$event->title}}</h3>
                    <p><ion-icon name="location-outline"></ion-icon> {{$event->city}}</p>
                    <p><ion-icon name="calendar-outline"></ion-icon> {{date('d/m/Y', strtotime($event->date))}}</p>
                    <p><ion-icon name="people-outline"></ion-icon> {{count($event->users)}}</p>
                    <form action="/events/join/{{$event->id}}" method="POST">
                        @csrf
                        @if(!$userParticipant)
                            <a 
                                href="/events/join/{{$event->id}}"
                                type="submit" 
                                class="btn btn-primary buttom buttom-primary my-4"
                                onclick="event.preventDefault();
                                this.closest('form').submit();"
                            >
                                Confirmar Presença
                            </a>
                        @else
                            <p class="msg-presenca">Você já estar participando deste evento!</p>
                        @endif
                    </form>
                    <h5>O evento terá:</h5>
                    <ul id="items-list">
                        @foreach($event->items as $item)
                            <li><ion-icon name="exit-outline"></ion-icon>{{$item}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection