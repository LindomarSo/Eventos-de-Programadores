@extends('layouts.main')

@section('title', $event->title)

@section('content')

    <section id="edite">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h2 class="py-4">Criar Evento</h2>
                <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="image" class="form-lable">Imagem:</label>
                        <input type="file" class="form-img" name="image">
                        <img src="/images/events/{{$event->image}}" alt="" class="img-form"> 
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-lable">Nome do Evento:</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$event->title}}">  
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-lable">Data do Evento:</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{$event->date->format('Y-m-d')}}">  
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-lable">Cidade do Evento:</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{$event->city}}">  
                    </div>
                    <div class="mb-3">
                        <label for="private" class="form-lable">O evento é privado?</label>
                        <select name="private" id="private" class="form-control">
                            <option value="0">Não</option>
                            <option {{$event->private == 1? "selected='selected'" : " "}} value="1">Sim</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-lable">Descrição do Evento:</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Descrição">{{$event->description}}</textarea>
                    </div>
                    <div class="mb-3">
                    <label for="items" class="label-form mb-2">O que o evento vai oferecer?</label>
                    <div>
                        <input type="checkbox" name="items[]" value="Fast Food"> Fast Food
                    </div>
                    <div>
                        <input type="checkbox" name="items[]" value="Palco"> Palco
                    </div>
                    <div>
                        <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                    </div>
                    <div>
                        <input type="checkbox" name="items[]" value="Brindes"> Brindes
                    </div>
                    </div>
                    <div class="mb-3">
                    <button class="btn btn-primary buttom buttom-primary">Atualizar Evento</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection