<x-layout-app page-title="Gráfico de Mortes por Lote">

    @php
        $page = 'Coleta de Ovos';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-12">

        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>% de Mortes por Lote</h5>
                </div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-3 mb-3">

                            <canvas id="graficoMortes" width="300" height="100"></canvas>

                        </div>

                    </div>

                </div>
                <div class="card-footer">
                    Motes x Lote
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <script>
        Chart.register(ChartDataLabels);
        const ctx = document.getElementById('graficoMortes').getContext('2d');
        const graficoMortes = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Mortes (%)',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        '#667E99',
                        '#996698',
                        '#998166',
                        '#669967',
                        '#FF9F40',
                        '#C9CBCF'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                responsive: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'left',
                        align: 'start',
                        labels: {
                            color: '#333', // Cor do texto
                            padding: 50,
                            font: {
                                size: 10,
                                family: 'Verdana',
                                weight: 'bold'
                            },
                            boxWidth: 12, // Largura do quadrado de cor
                            boxHeight: 12, // Altura do quadrado de cor (opcional)
                            padding: 10, // Espaço entre os itens
                            usePointStyle: true // Ícones redondos
                        }
                    },
                    datalabels: {
                        color: '#000',
                        font: {
                            weight: '900',
                            size: 9
                        },
                        formatter: (value) => {
                            return value + '%';
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>

</x-layout-app>
