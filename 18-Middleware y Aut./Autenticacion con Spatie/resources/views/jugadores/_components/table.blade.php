<div class="container mt-4">
    <h1 class="text-white">{{ $title }}</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    {{ $header }}
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <!-- Aquí irán los datos desde la base de datos -->
                <tr>
                    {{ $detail }}
                </tr>
            </tbody>
        </table>
    </div>
</div>
