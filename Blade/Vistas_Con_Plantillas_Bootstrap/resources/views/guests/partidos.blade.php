@extends('layouts.landing')
@section('title', 'Partidos')
@section('content')
    <section class="container mt-4 w-50">
        <article class="card-group mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Miercoles 20/6 - 19 hs
                </div>
                <div class="card-body">
                    <div class="card-body d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row">
                            <img src="img/Argentina.png" style="width: 35px;" alt="">
                            <div class="p-1">Argentina</div>
                        </div>
                        <div class="p-1">1</div>
                        <div class="versus">VS</div>
                        <div class="p-1">1</div>
                        <div class="d-flex flex-row">
                            <div class="p-1">Canada</div>
                            <img src="img/Canada.png" style="width: 35px;" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-body-secondary">
                    Cancha 6 - Arbitro: Carlos Molina
                </div>
            </div>
        </article>


        <article class="card-group mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Miercoles 26/7 - 21 hs
                </div>
                <div class="card-body">
                    <div class="card-body d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row">
                            <img src="img/Brasil.png" style="width: 35px;" alt="">
                            <div class="p-1">Brasil</div>
                        </div>
                        <div class="p-1">1</div>
                        <div class="versus">VS</div>
                        <div class="p-1">2</div>
                        <div class="d-flex flex-row">
                            <div class="p-1">Ecuador</div>
                            <img src="img/Ecuador.png" style="width: 35px;" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-body-secondary">
                    Cancha 5 - Arbitro: Javier Mendez
                </div>
            </div>
        </article>
    </section>
@endsection
