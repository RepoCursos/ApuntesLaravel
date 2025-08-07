<!-- este footer es un parcial el cual sera llamado desde landing "base", es porque landing puede llamarlo con el @-include() 
    para que se refleje en las vistas.
  Si obserbamos tanto el menu como este footer no son ni extendidos "@-extends('')" ni tampoco 
  son llamados "@-section('')" dado a que no se van a modificar o ocultar, sino que siempre van a estar a la vista -->
  
<div class="float-right">
    Version: {{ config('app.version', '1.0.0') }}
</div>

<strong class="d-flex">
    <img src="/img/logo.jpeg" style="width: 35px; height: 30px" alt="">
    <p>Copyright &copy; 2024 Torneo de Fútbol. Todos los derechos reservados.</p>
</strong>
