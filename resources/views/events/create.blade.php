@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<section id="create">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h2 class="py-4">Criar Evento</h2>
            <form action="/events" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-lable">Imagem:</label>
                    <input type="file" class="form-control" name="image"> 
                </div>
                <div class="mb-3">
                    <label for="title" class="form-lable">Nome do Evento:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Nome do evento">  
                </div>
                <div class="mb-3">
                    <label for="date" class="form-lable">Data do Evento:</label>
                    <input type="date" class="form-control" name="date" id="date">  
                </div>
                <div class="mb-3">
                    <label for="city" class="form-lable">Cidade do Evento:</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Cidade do evento">  
                </div>
                <div class="mb-3">
                    <label for="private" class="form-lable">O evento é privado?</label>
                    <select name="private" id="private" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-lable">Descrição do Evento:</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Descrição"></textarea>
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
                   <button class="btn btn-primary buttom buttom-primary">Criar Evento</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection