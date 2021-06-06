<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Filesystem\Filesystem;

class EventController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){
            $event = Event::where([['title', 'like', '%'.$search.'%'
            ]])->get();
        }else{
            $event = Event::all();
        }
        
        return view('/home', ['events'=>$event]);
    }

    public function create(){
        return view('/events.create');
    }

    public function store(Request $request){
        
        $event = new Event;
        $event->title = $request->title;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->items = $request->items;
        $event->date = $request ->date;
        
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).'.'.$extension;

            $requestImage->move(public_path('/images/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();

        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento cadastrado com sucesso!');
    }

    public function show($id){

        $event = Event::findOrFail($id);    

        $user = auth()->user();

        $hasUserJoined = false;

        if($user){

            $userEvents = $user->eventAsParticipant->toArray();

            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        return view('/events.show', [
            'event'=>$event,
            'userParticipant'=>$hasUserJoined
            ]);
    }

    public function dashboard(){

        $user = auth()->user();

        $events = $user->events;

        $eventAsParticipant = $user->eventAsParticipant;

        return view('/events.dashboard', [
            'events'=>$events,
            'participant'=>$eventAsParticipant
            ]);
    }

    public function destroy($id){

        $event = Event::findOrFail($id)->image;

        $image_path = public_path('/images/events/');

        unlink($image_path. $event);

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'O evento foi deletado com sucesso!');
    }

    public function edit($id){

        $event = Event::findOrFail($id);

        $user = auth()->user();

        if($user->id != $event->user_id){
            return redirect('/')->with('msg', 'Você não tem permissão para editar este evento!');
        }

        return view('/events.edit', ['event'=>$event]);
    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime('now').'.'.$extension);

            $requestImage->move(public_path('/images/events', $imageName));

            $data['image'] = $imageName;
        }

        Event::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'O evento '.$data['title'].' foi atualizado com sucesso!');
    }

    public function joinEvent($id){
        $user = auth()->user();

        $user->eventAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento '.$event->title);
    }

    public function leave($id){

        $user = auth()->user();

        $user -> eventAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg','Você saiu do evento '.$event->title);
    }
}
