@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_body')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <!-- tarjetas -->
        @include('admin._partials.tarjetas')

        <!-- graficas -->
        @include('admin._partials.graficos')
    </div>
@endsection

@section('js')
    <script>
        window.onload = function () {
        // Obtener los datos de PHP a JavaScript
        const partidosPorMes = @json($partidosPorMes);
        console.log(partidosPorMes);
        // Preparar los datos para el gráfico
        const meses = partidosPorMes.map(partido => {
            const date = new Date(partido.year, partido.month - 1);
            return date.toLocaleString('default', {
                month: 'long',
                year: 'numeric'
            });
        });

        const cantidadPartidos = partidosPorMes.map(partido => partido.cantidad);

        // Crear el gráfico
        const ctx = document.getElementById('partidosChart').getContext('2d');
        const partidosChart = new Chart(ctx, {
            type: 'line', // Tipo de gráfico: 'line' para gráfico de líneas
            data: {
                labels: meses, // Eje X: Meses
                datasets: [{
                    label: 'Cantidad de Partidos',
                    data: cantidadPartidos, // Eje Y: Cantidad de partidos
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true, // Para un gráfico con área de relleno
                    tension: 0.4 // Curvatura de la línea
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true, // Asegura que el eje Y comienza en 0
                    }
                }
            }
        });
    }
    </script>
    <script>
        // Obtener los datos de PHP a JavaScript
        const labels = @json($labels);
        const data = @json($data);
        console.log(labels, data);

        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico, puede ser 'bar', 'line', 'pie', etc.
        data: {
            labels: labels, // Los nombres de los torneos
            datasets: [{
                label: 'Cantidad de Partidos',
                data: data, // Cantidad de partidos por torneo
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,  // Asegura que el eje Y comienza en 0
                }
            }
        }
    });
    </script>
@endsection
