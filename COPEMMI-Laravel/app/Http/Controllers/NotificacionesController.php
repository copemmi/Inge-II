<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notificaciones;

class NotificacionesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {  
        $notificaciones = Notificaciones::get();
        return view('Notificaciones/Notificaciones', compact('notificaciones')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Notificaciones/IncorporarNotificaciones'); 
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Notificaciones $notificacion)
    { 
        $notificacion = new Notificaciones(); 
        $notificacion->titulo = $request->titulo;
        $notificacion->mensaje = $request->mensaje;
        $notificacion->vista = 0; 

        if($notificacion->save()) {
            $user = User::all(); 
            Notification::send($user, new AddPost($notificacion));
        }

        return Redirect()->route('notificaciones.index');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    /*public function AllSeen() {
        foreach(auth()->user()->unreadNotifications as $note{
            $note->markAsRead(); 
        }
    }*/
}

