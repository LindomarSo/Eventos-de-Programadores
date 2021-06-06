@extends('layouts.main')

@section('title', 'Home')

@section('content')

<!-- banner -->

<section id="banner-container" class="container-fluid block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-center">
                <h2 class="py-4">Busque por um evento</h2>
                <form action="">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Procurar">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary buttom buttom-primary">Buscar Evento</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 align-self-center py-4 mb-md-0 mb-3">
                <h2>Você também pode criar seu proprio evento</h2>
                <div class="img-container text-center">
                    <img src="images/document.png" alt="document" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- banner -->

<!-- eventos -->

<section id="eventos">
    <div class="container">
        <div class="row text-center mb-4">
            <h1 class="py-4">PRÓXIMOS EVENTOS</h1>
            @foreach($events as $event)
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="/events/{{$event->id}}" class="event-destaque">
                    <div class="img-destaque mb-3">
                        <img 
                            src="/images/events/{{$event->image}}" 
                            alt="/images/events/{{$event->image}}" 
                            class="img-fluid"
                        >
                    </div>
                    <div class="card-body">
                        <p class="event-date mb-2">{{date('d/m/Y', strtotime($event->date))}}</p>
                        <h5 class="event-title">{{$event->title}}</h5>
                        <p class="participants-number pb-3">{{count($event->users)}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- eventos -->

@endsection