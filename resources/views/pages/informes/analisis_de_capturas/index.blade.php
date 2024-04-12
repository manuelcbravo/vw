<x-app-layout>
    <x-layout.page>
        <x-slot name="titulo">Análisis de Compra</x-slot>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <div id="chart"></div>

            <x-layout.card-table idEntries="datatableEntries" idPagination="datatablePagination">
                <x-slot name="header">
                    <x-layout.table-header id="datatableSearch"></x-layout.table-header>
                </x-slot>
                <x-slot name="header2"> </x-slot>
                <x-slot name="table">
                    <x-layout.table id="datatable" :options='json_encode([
                        "order" => [],
                        "info" => ["totalQty" => "#datatableWithPaginationInfoTotalQty"],
                        "search" => "#datatableSearch",
                        "entries" => "#datatableEntries",
                        "pageLength" => 12,
                        "pagination" => "datatablePagination"
                    ])'>
                        <x-slot name="headers">
                            <th>Empresa</th>
                            <th>Con Precio</th>
                            <th>Comprados</th>
                            <th>Comprados con Factura (DMS)</th>
                            <th>Captados</th>
                            <th>Meta</th>
                            <th>Evaluacion</th>
                            <th>Revendidos</th>
                        </x-slot>
                    </x-layout.table>
                </x-slot>
            </x-layout.card-table>

            <x-layout.card-table idEntries="datatableEntries" idPagination="datatablePagination">
                <x-slot name="header">
                    <x-layout.table-header id="datatableSearch"></x-layout.table-header>
                </x-slot>
                <x-slot name="header2"> </x-slot>
                <x-slot name="table">
                    <x-layout.table id="datatable" :options='json_encode([
                        "order" => [],
                        "info" => ["totalQty" => "#datatableWithPaginationInfoTotalQty"],
                        "search" => "#datatableSearch",
                        "entries" => "#datatableEntries",
                        "pageLength" => 12,
                        "pagination" => "datatablePagination"
                    ])'>
                        <x-slot name="headers">
                            <th>Marca</th>
                            <th>Con Precio</th>
                            <th>Comprados</th>
                            <th>Reventa</th>
                        </x-slot>
                    </x-layout.table>
                </x-slot>
            </x-layout.card-table>
            <x-layout.card-table idEntries="datatableEntries" idPagination="datatablePagination">
                <x-slot name="header">
                    <x-layout.table-header id="datatableSearch"></x-layout.table-header>
                </x-slot>
                <x-slot name="header2"> </x-slot>
                <x-slot name="table">
                    <x-layout.table id="datatable" :options='json_encode([
                        "order" => [],
                        "info" => ["totalQty" => "#datatableWithPaginationInfoTotalQty"],
                        "search" => "#datatableSearch",
                        "entries" => "#datatableEntries",
                        "pageLength" => 12,
                        "pagination" => "datatablePagination"
                    ])'>
                        <x-slot name="headers">
                        <th>Modelo</th>
                        <th>Con Precio</th>
                        <th>Comprados</th>
                        <th>Reventa</th>                            
                        </x-slot>
                    </x-layout.table>
                </x-slot>
            </x-layout.card-table>
        </x-slot>
    </x-layout.page>
</x-app-layout>



<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var options = {
            series: [{
                name: 'Inflation',
                data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            },
            title: {
                text: 'Resultados del mes',
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
