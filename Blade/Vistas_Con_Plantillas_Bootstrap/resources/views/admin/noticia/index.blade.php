@extends('layouts.app')
@section('title', 'Noticias')

@section('content_body')
    @component('admin._components.table')
        @slot('title')
            {{ 'Noticias' }}
            <a class="btn btn-primary" href="/layouts/admin/noticia/create" role="button">Nuevo</a>
        @endslot
        @slot('header')
            <th>Fecha</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Acciones</th>
        @endslot
        @slot('detail')
            <td>12/03/2024</td>
            <td>Sanción a Jugador Destacado en Torneos de Fútbol 5</td>
            <td>En una reciente decisión que ha generado controversia en la comunidad de fútbol 5, la Asociación de Fútbol 5 ha anunciado la sanción de seis partidos al jugador estrella del equipo "Los Tigres", Javier "El Rayo" Martínez. La medida se debe a una falta grave cometida durante el último partido de la liga, donde el jugador recibió una tarjeta roja por conducta antideportiva.

                El incidente ocurrió en el minuto 45 del partido contra "Los Halcones", cuando Martínez tuvo un intercambio verbal acalorado con el árbitro tras una decisión que consideró injusta. La Asociación, al revisar las grabaciones del partido, determinó que la conducta del jugador no solo fue inapropiada, sino que también afectó el ambiente del encuentro.
                
                El entrenador de "Los Tigres", Carlos Gómez, expresó su decepción por la situación, señalando: "Es un gran jugador y una pieza clave para nuestro equipo, pero todos debemos respetar las reglas del juego. Aceptamos la decisión de la Asociación y esperamos que Javier aprenda de esta experiencia".
                
                Por su parte, el jugador se disculpó públicamente a través de sus redes sociales, afirmando: "Lamento profundamente lo sucedido. No fue mi intención afectar a mi equipo ni a la liga. Trabajaré para mejorar y volver más fuerte".
                
                La sanción entra en vigor inmediatamente, y "Los Tigres" deberán encontrar una estrategia para afrontar los próximos partidos sin su jugador estrella. La Asociación de Fútbol 5 reitera su compromiso con el fair play y la importancia de mantener un ambiente deportivo respetuoso.</td>
            <td class="">
                <a href="/layouts/admin/noticia/edit" class="btn btn-outline-success">
                    <i class="fa-solid fa-pen"></i>
                </a>
            
                <form method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </td>
        @endslot
    @endcomponent
@endsection
