@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<section id="my-events">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 py-5">
            <h2 class="mb-3">Meus Eventos</h2>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td scropt="row">{{$loop->index + 1}}</td>
                            <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                            <td>{{count($event->users)}}</td>
                            <td>
                                <a href="/events/edit/{{$event->id}}" class="btn btn-info">
                                    <ion-icon name="create-outline"></ion-icon> Editar
                                </a>    
                                <form action="/events/{{$event->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-delete">
                                        <ion-icon name="trash-outline"></ion-icon>
                                        Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 offset-md-1 py-5">
            <h2 class="mb-3">Eventos que estou participando</h2>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participant as $event)
                        <tr>
                            <td scropt="row">{{$loop->index + 1}}</td>
                            <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                            <td>{{count($event->users)}}</td>
                            <td>   
                                <form action="/events/leave/{{$event->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-delete">
                                        <ion-icon name="trash-outline"></ion-icon>
                                        Sair do Evento
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
