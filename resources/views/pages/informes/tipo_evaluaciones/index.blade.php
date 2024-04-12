<x-app-layout>
    <x-layout.page>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <x-slot name="titulo">Tipo de Evaluaciones</x-slot>
            <div class="col-sm-4">
                <x-form.input tipo="text" id="periodo" titulo="Periodo" holder="" required="true" options='' validationclass=''></x-form.input>
            </div>
            <h4>CON PRECIO</h4>
            <x-layout.card-table idEntries="datatableEntries" idPagination="datatablePagination">
                <x-slot name="header">
                    <x-layout.table-header id="datatableSearch"></x-layout.table-header>
                </x-slot>
                <x-slot name="header2"></x-slot>
                <x-slot name="table">
                    <x-layout.table id="datatable" options='{
                       "order": [],
                        "info": {
                            "totalQty": "#datatableWithPaginationInfoTotalQty"
                        },
                        "search": "#datatableSearch",
                        "entries": "#datatableEntries",
                        "pageLength": 12,
                        "pagination": "datatablePagination"
                    }'>
                        <x-slot name="headers">
                            <th>Empresas</th>
                            <th>Solamente Compra</th>
                            <th>Toma a cuenta por auto nuevo</th>
                            <th>Toma a cuenta por auto seminuevo</th>
                            <th>Venta de Flotilla</th>
                            <th>Evaluacion WEB C2B</th>
                            <th>Total</th>
                        </x-slot>
                    </x-layout.table>
                </x-slot>
            </x-layout.card-table>
            <h4>COMPRADOS CON FACTURA (DMS)</h4>
            <x-layout.card-table idEntries="datatableEntries" idPagination="datatablePagination">
                <x-slot name="header">
                    <x-layout.table-header id="datatableSearch"></x-layout.table-header>
                </x-slot>
                <x-slot name="header2"></x-slot>
                <x-slot name="table">
                    <x-layout.table id="datatable" options='{
                       "order": [],
                        "info": {
                            "totalQty": "#datatableWithPaginationInfoTotalQty"
                        },
                        "search": "#datatableSearch",
                        "entries": "#datatableEntries",
                        "pageLength": 12,
                        "pagination": "datatablePagination"
                    }'>
                        <x-slot name="headers">
                            <th>Empresas</th>
                            <th>Solamente Compra</th>
                            <th>Toma a cuenta por auto nuevo</th>
                            <th>Toma a cuenta por auto seminuevo</th>
                            <th>Venta de Flotilla</th>
                            <th>Evaluacion WEB C2B</th>
                            <th>Total</th>
                        </x-slot>
                    </x-layout.table>
                </x-slot>
            </x-layout.card-table>
            <!-- gráfico -->
            <center>
            <div id="chart"></div>
        </x-slot>
    </x-layout.page>
</x-app-layout>

<!-- Incluir la biblioteca ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- script gráfico -->
<script>
    var options = {
      series: [20, 80],
      chart: {
      width: 600,
      type: 'pie',
    },
    labels: ['Solamente Compra ', 'Toma a cuenta por auto nuevo'],
    responsive: [{
      breakpoint: 1000,
      options: {
        chart: {
          width: 600
        },
        legend: {
          position: 'bottom'
        }
      }
    }]
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
</center>
