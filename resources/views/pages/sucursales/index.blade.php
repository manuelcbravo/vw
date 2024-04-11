<x-app-layout>
    <x-layout.page>
        <x-slot name="titulo">Con Precio</x-slot>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <div>
                <form action="/guardar" method="POST">
                    @csrf
                    <div>
                        <label for="tipo_empresa">Empresa:</label>
                        <select id="tipo_empresa" name="tipo_empresa">
                            <option value="empresa">Seleccione</option>
                            <option value="empresa1">Todas</option>
                            <option value="empresa2">Distribuidora Volkswagen de Pachuca, S.A.</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="estatus">Estatus:</label>
                        <select id="estatus" name="estatus">
                            <option value="estatus">Todos</option>
                            <option value="estatus1">Adquirido Grupo</option>
                            <option value="estatus2">Caducada</option>
                            <option value="estatus3">Caducado</option>
                            <option value="estatus4">Cancelado</option>
                            <option value="estatus5">Comprado</option>
                            <option value="estatus6">Can precio</option>
                            <option value="estatus7">Disp/Grupo</option>
                            <option value="estatus8">Enviado a Reventa</option>
                            <option value="estatus9">Integrando</option>
                            <option value="estatus10">Por fijar precio</option>
                            <option value="estatus11">Reventa/otros</option>
                            <option value="estatus12">Reventa/Outros</option>
                            <option value="estatus13">Solicitada</option>
                            <option value="estatus13">Vendido</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <br>
                        <h2>Busqueda</h2>
                        <div>
                            <label for="busqueda">Busqueda:</label>
                            <input type="text" id="busqueda" name="busqueda">
                        </div>
                        <br>
                        <div>
                            <label for="año">Año:</label>
                            <input type="año" id="año" name="año">
                        </div>
                        <br>
                        <div>
                            <label for="marca">Marca:</label>
                            <input type="text" id="marca" name="marca">
                        </div>
                        <br>
                        <div>
                            <label for="modelo">Modelo:</label>
                            <input type="text" id="modelo" name="modelo">
                        </div>
                        <br>
                        <div>
                            <label for="version">Version:</label>
                            <input type="text" id="version" name="version">
                        </div>
                        <br>
                        <div>
                            <input type="checkbox" id="vehiculos_recibidos" name="vehiculos_recibidos">
                            <label for="vehiculos_recibidos">Vehiculos Recibidos</label>
                            <input type="checkbox" id="cotizacion_no_enviada" name="cotizacion_no_enviada">
                            <label for="cotizacion_no_enviada"> Cotizacion no enviada</label>
                        </div>
                        <br>
                        <br>
                        <div>
                            <label for="acciones">Acciones en masa:</label>
                            <select id="acciones" name="acciones">
                                <option value="acciones">Seleccione</option>
                                <option value="acciones1">1</option>
                            </select>
                        </div>
                        <br>
                        <!--Tabla-->
                        <div>
                            <h2>Tabla de Resultados</h2>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Imagen    |</th>
                                        <th>Descripcion    |</th>
                                        <th>Estatus   |</th>
                                        <th>Empresa    |</th>
                                        <th>Fecha    |</th>
                                        <th>Solicitante / Evaluador / Fijador de precio   |</th>
                                        <th>Reparaciones    |</th>
                                        <th>Evaluacion    |</th>
                                        <th>Total   |</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>Descripción</td>
                                        <td>Activo</td>
                                        <td>Empresa A</td>
                                        <td>2024-04-09</td>
                                        <td>Juan Pérez</td>
                                        <td>Reparación 1</td>
                                        <td>Buena</td>
                                        <td>$1000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>

            {{-- VENTA EXPRESS --}}
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2>VENTAS EXPRESS</h2>
            <div>
                <label for="estatus">Estatus:</label>
                <select id="estatus" name="estatus">
                    <option value="estatus">Todos</option>
                    <option value="estatus1">Por Resolver</option>
                    <option value="estatus2">En proceso</option>
                    <option value="estatus3">Aprobado</option>
                    <option value="estatus4">Cerrado</option>
                    <option value="estatus5">Aguardando Venta</option>
                </select>
            </div>
            <br>
            <div>
                <label for="buscar">Buscar:</label>
                <input type="text" id="buscar" name="buscar">
            </div>
            <br>
            <div>
                <label for="vendedor">Vendedor:</label>
                <input type="text" id="vendedor" name="vendedor">
            </div>
            <br>
            <div>
                <label for="evaluador">Evaluador:</label>
                <input type="text" id="evaluador" name="evaluador">
            </div>
            <br>
            <div>
                <label for="fecha_inicial">Fecha Inicial:</label>
                <input type="date" id="fecha_inicial" name="fecha_inicial">
            </div>
            <br>
            <div>
                <label for="fecha_final">Fecha Final:</label>
                <input type="date" id="fecha_final" name="fecha_final">
            </div>

            {{-- EVALUACION ONLINE --}}
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2>EVALUACION ONLINE</h2>
            <div>
                <label for="evaluacion">Link del Grupo:</label>
                <input type="text" id="evaluacion" name="evaluacionr">
            </div>

            {{-- INFORMES --}}
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2>ANALISIS DE COMPRAS</h2>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Hola</title>
                <!-- Agrega la biblioteca ApexCharts.js -->
                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            </head>
            <body>
            <!-- Aquí es donde se renderizará el gráfico -->
            <div id="chart"></div>

            <script>
                // Datos para el gráfico de barras
                var options = {
                    chart: {
                        type: 'bar'
                    },
                    series: [{
                        name: 'Sales',
                        data: [1, 2, 3, 4, 5, 6, 7, 8, 1,1, 2, 3, 4, 5, 6, 7, 8, .9,1, 2, 3, 4, 5, 6, 7, 8, 4]
                    }],
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Jan1', 'Feb1', 'Mar1', 
                        'Apr1', 'May1', 'Jun1', 'Jul1', 'Aug1', 'Sep1','Jan2', 'Feb2', 'Mar2', 'Apr2', 'May2', 'Jun2', 'Jul2', 'Aug2', 'Sep2']
                    }
                };

                // Crear el gráfico
                var chart = new ApexCharts(document.querySelector("#chart"), options);

                // Renderizar el gráfico
                chart.render();
            </script>
            </body>
            </html>
            <!--Tabla-->
            <div>
                <h2></h2>
                <table>
                    <thead>
                        <tr>
                            <th>Marca |</th>
                            <th>Con precio    |</th>
                            <th>Comprados   |</th>
                            <th>Reventa   |</th>
                        </tr>
                     </thead>
                      <tbody>
                        <tr>
                            <td>CHEVROLET</td>
                            <td>4</td>
                            <td>- </td>
                            <td>1</td>
                                        
                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        </x-slot>
    </x-layout.page>
</x-app-layout>
