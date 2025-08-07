<!-- este menu es un parcial el cual sera llamado desde landing "base", es porque app puede llamarlo con el @-include() 
    para que se refleje en las vistas -->
    
<nav class="navbar navbar-expand-lg bg-danger">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <img src="/img/copa.png" style="width: 30px; height: 60px;" alt="COPA" />
        <div class="collapse navbar-collapse justify-content-around" id="navbarTogglerDemo03">
            <div class="row navbar-nav">
                <div class="col nav-item">
                    <a href="/" class="nav-link text-white btn btn-dark">{{ __('HOME')}}</a>
                </div>
                <div class="col nav-item">
                    <a href="/clasificaciones" class="nav-link text-white btn btn-dark">{{ __('CLASIFICACIONES')}}</a>
                </div>
                <div class="col nav-item">
                    <a href="/partidos" class="nav-link text-white btn btn-dark">{{ __('PARTIDOS')}}</a>
                </div>
                <div class="col nav-item">
                    <a href="/equipos" class="nav-link text-white btn btn-dark">{{ __('EQUIPOS')}}</a>
                </div>
                <div class="col nav-item">
                    <a href="/goleadores" class="nav-link text-white btn btn-dark">{{ __('JUGADORES')}}</a>
                </div>
                <div class="col nav-item">
                    <a href="/noticias" class="nav-link text-white btn btn-dark">{{ __('NOTICIAS')}}</a>
                </div>
            </div>
        </div>
    </div>
</nav>
