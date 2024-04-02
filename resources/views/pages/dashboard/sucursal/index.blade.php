<x-app-layout :active="$active">
    <x-layout.page>
        <x-slot name="titulo"> Dashboard general </x-slot>
        <x-slot name="boton"> </x-slot>

        <x-slot name="indicadores"> </x-slot>
        <x-slot name="cuerpo">
            <div class="row">
                <div class="card mb-3 mb-lg-5">
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">Rango de fechas </h4>
                        <div class="d-grid d-sm-flex gap-2">
                            <div class="tom-select-custom">
                                <select class="js-select form-select form-select-sm" autocomplete="off" data-hs-tom-select-options='{
                                          "searchInDropdown": false,
                                          "hideSearch": true,
                                          "dropdownWidth": "10rem"
                                        }' id="concurrencia">
                                  <option selected> -- seleccione una sucursal --</option>
                                  <option value="1">sucursal 1</option>
                                </select>
                            </div>
                            <div class="tom-select-custom">
                                <select class="js-select form-select form-select-sm" autocomplete="off" data-hs-tom-select-options='{
                                          "searchInDropdown": false,
                                          "hideSearch": true,
                                          "dropdownWidth": "10rem"
                                        }' id="concurrencia">
                                  <option value="1">Día</option>
                                  <option value="2" selected>Semana</option>
                                  <option value="3">Mes</option>
                                </select>
                            </div>
                            <button id="js-daterangepicker-predefined" class="btn btn-white btn-sm dropdown-toggle">
                                <i class="bi-calendar-week"></i>
                                <span class="js-daterangepicker-predefined-preview ms-1">Sep 8 - Sep 8, 2023</span>
                            </button>
                            <button  class="btn btn-primary btn-sm btn-search">
                                <i class="bi-search"></i>
                                Buscar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="#">
                        <div class="card-body">
                            <h6 class="card-subtitle">Calificación promedio</h6>
                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                    <h2 class="card-title text-inherit n_cli">Bueno</h2>
                                </div>
                            </div>
                           
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="#">
                        <div class="card-body">
                            <h6 class="card-subtitle">Total de encuestas</h6>
                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                    <h2 class="card-title text-inherit n_aho">568</h2>
                                </div>
                                
                            </div>
                            <!-- End Row -->
                          
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="#">
                        <div class="card-body">
                            <h6 class="card-subtitle">Encuestas prom día</h6>
                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                    <h2 class="card-title text-inherit n_cre">29</h2>
                                </div>
                                
                            </div>
                           
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="#">
                        <div class="card-body">
                            <h6 class="card-subtitle">Encuestas con datos de contacto</h6>
                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                    <h2 class="card-title text-inherit n_inv">92,913</h2>
                                </div>
                                
                            </div>
                        
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
            </div>

            <div class="card my-4">
                <div class="card-body">
                    <div class="" id="chart-respuestas" style="height: 18rem;"></div>
                </div>
            </div>
            
        </x-slot>
        <x-slot name="modals">
           
        </x-slot>

    </x-layout.page>
    @push('js')
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=quarterly&region=MX&language=es&key={{ ENV('API_GOOGLE_MAPS')}}&libraries=places"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script>
            window.addEventListener("load",function(event) {
                HSCore.components.HSTomSelect.init('.js-select')

                $('.js-daterangepicker').daterangepicker();
                let chart_grafica1, chart_grafica2, chart_grafica3, chart_grafica4;

                let concurrencia = 2;
                var fechaActual = moment();
                var fechaHaceTresMeses = fechaActual.subtract(6, 'months');
                var primerDiaHaceTresMeses = fechaHaceTresMeses.date(1);

                var fechaActual = moment();
                var ultimoDiaDelMes = fechaActual.endOf('month');

                var start = primerDiaHaceTresMeses;
                var end = ultimoDiaDelMes;

                function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('D MMM') + ' - ' + end.format('D MMM, YYYY'));
                }

                $('#js-daterangepicker-predefined').daterangepicker({
                startDate: start,
                endDate: end,
                locale: {
                    format: 'DD/MM/YYYY',
                    separator: ' - ',
                    applyLabel: 'Aplicar',
                    cancelLabel: 'Cancelar',
                    fromLabel: 'Desde',
                    toLabel: 'Hasta',
                    customRangeLabel: 'Rango Personalizado',
                    daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie','Sab'],
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    firstDay: 1
                }
                }, cb);

                cb(start, end);

                var startDate = fechaHaceTresMeses.format('YYYY-MM-DD');
                var endDate = ultimoDiaDelMes.format('YYYY-MM-DD');

                
                $('#js-daterangepicker-predefined').on('apply.daterangepicker', function(ev, picker) {
                    startDate = picker.startDate.format('YYYY-MM-DD');
                    endDate = picker.endDate.format('YYYY-MM-DD');
                });

                $('.btn-search').click(function() {
                    concurrencia = $('#concurrencia').val();
                    HSCallGet.init('{{ url('dashboardG')}}/'+concurrencia+'/' +startDate +'/' + endDate,get)
                });

                const menor_mayor = (combinedArray) => {
                    if(concurrencia == 2 || concurrencia == 3){
    
                        var fechasNumericas = combinedArray.map(obj => {
                            var partes = obj.fecha_formato.split('/');
                            return parseInt(partes[0]) + parseInt(partes[1]) * 100;
                        });

                        // Encontrar el índice del valor máximo y mínimo
                        var indiceFechaMayor = fechasNumericas.indexOf(Math.max(...fechasNumericas));
                        var indiceFechaMenor = fechasNumericas.indexOf(Math.min(...fechasNumericas));

                        // Obtener los objetos correspondientes
                        var fechaMayor = combinedArray[indiceFechaMayor].fecha_formato;
                        var fechaMenor = combinedArray[indiceFechaMenor].fecha_formato;
                    }else{
                        var fechas = combinedArray.map(obj => new Date(obj.fecha_formato));

                        var fechaMenor = new Date(Math.min.apply(null, fechas));
                        var fechaMayor = new Date(Math.max.apply(null, fechas));

                        var fechaMenorFormateada = fechaMenor.toISOString().slice(0,10);
                        var fechaMayorFormateada = fechaMayor.toISOString().slice(0,10);
                    }

                    if(concurrencia == 1){
                        var fechas = [];

                        for (var fecha = new Date(fechaMenor); fecha <= fechaMayor; fecha.setDate(fecha.getDate() + 1)) {
                            fechas.push(new Date(fecha));
                        }

                        var listaFechas = fechas.map(fecha => fecha.toISOString().slice(0,10));

                    }else if(concurrencia == 2){

                        var partesMenor = fechaMenor.split('/');
                        var semanaMenor = parseInt(partesMenor[0]);
                        var añoMenor = parseInt(partesMenor[1]);

                        var partesMayor = fechaMayor.split('/');
                        var semanaMayor = parseInt(partesMayor[0]);
                        var añoMayor = parseInt(partesMayor[1]);

                        // Crear una lista de fechas
                        var listaFechas = [];

                        for (var año = añoMenor; año <= añoMayor; año++) {
                            var semanaInicial = (año === añoMenor) ? semanaMenor : 1;
                            var semanaFinal = (año === añoMayor) ? semanaMayor : 52; // Se asume un año de 52 semanas

                            for (var semana = semanaInicial; semana <= semanaFinal; semana++) {
                                listaFechas.push(semana + '/' + año);
                            }
                        }

                    }else if(concurrencia == 3){
                        var partesMenor = fechaMenor.split('/');
                        var mesMenor = parseInt(partesMenor[0]);
                        var añoMenor = parseInt(partesMenor[1]);

                        var partesMayor = fechaMayor.split('/');
                        var mesMayor = parseInt(partesMayor[0]);
                        var añoMayor = parseInt(partesMayor[1]);

                        // Crear una lista de fechas
                        var listaFechas = [];

                        for (var año = añoMenor; año <= añoMayor; año++) {
                            var mesInicial = (año === añoMenor) ? mesMenor : 1;
                            var mesFinal = (año === añoMayor) ? mesMayor : 12;

                            for (var mes = mesInicial; mes <= mesFinal; mes++) {
                                listaFechas.push(mes.toString() + '/' + año);
                            }
                        }
                    }

                    return listaFechas;
                }


                const grafica1 = () => {
                    var options = {
                        title: {
                            text: 'Respuestas por sucursal'
                        },
          series: [{
          name: 'PRODUCT A',
          data: [44, 55, 41, 67, 22, 43]
        }, {
          name: 'PRODUCT B',
          data: [13, 23, 20, 8, 13, 27]
        }, {
          name: 'PRODUCT C',
          data: [11, 17, 15, 15, 21, 14]
        }, {
          name: 'PRODUCT D',
          data: [21, 7, 25, 13, 22, 8]
        }],
          chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          toolbar: {
            show: true
          },
          zoom: {
            enabled: true
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        plotOptions: {
          bar: {
            horizontal: false,
            borderRadius: 10,
            dataLabels: {
              total: {
                enabled: true,
                style: {
                  fontSize: '13px',
                  fontWeight: 900
                }
              }
            }
          },
        },
        xaxis: {
          type: 'datetime',
          categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT',
            '01/05/2011 GMT', '01/06/2011 GMT'
          ],
        },
        legend: {
          position: 'right',
          offsetY: 40
        },
        fill: {
          opacity: 1
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart-respuestas"), options);
        chart.render();
                }

                grafica1();

                const get = (data) => {

                    // grafica_ingreso_total(data.c_pago, data.a_pago, data.i_pago);
                    // grafica_ingreso_tipo(data.c_pago_tipo, data.a_pago_tipo, data.i_pago_tipo);
                    // grafica_clientes(data.clientes,data.usuarios);

                    // $.each(data, function(index, value) {
                    //     $('.'+index).html(value);
                    // });
                }

                HSCallGet.init('{{ url('dashboardEncuestaSucG')}}/2/' +startDate +'/' + endDate,get)

                @stack('js_modulo')
            });
        </script>
    @endpush
</x-app-layout>
