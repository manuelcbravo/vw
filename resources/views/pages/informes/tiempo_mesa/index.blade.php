<x-app-layout>
    <x-layout.page>
        <x-slot name="titulo">Informes del Tiempo de Fijacion del Precio</x-slot>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <div class="row mb-4">
                <div class="col-sm-3">
                    <x-form.input tipo="text" id="tienda" titulo="Tienda" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-3">
                    <x-form.input tipo="text" id="venta_express" titulo="Estatus Venta Express" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-6">
                    <x-form.input tipo="text" id="filtro" titulo="Filtro" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>

            <x-layout.page>
                <x-slot name="titulo">  </x-slot>
                <!-- Otras partes de tu diseño aquí -->
                <x-slot name="cuerpo">
                    <x-layout.card-table idEntries="datatableEntries" idPagination="datatablePagination">
                        <x-slot name="header">
                            <x-layout.table-header id="datatableSearch"></x-layout.table-header>
                        </x-slot>
                        <x-slot name="header2"> </x-slot>
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
                                    <th>ID</th>
                                    <th>ID Cotizacion</th>
                                    <th>Datos del Anuncio</th>
                                    <th>Empresa</th>
                                    <th>Placa</th>
                                    <th>Vendedor</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Version</th>
                                    <th>Año de Modelo</th>
                                    <th>Año de Fabricacion</th>
                                    <th>Oferta</th>
                                    <th>Mayor Oferta</th>
                                    <th>Valor Compra</th>
                                    <th>Valor Ref. WEB</th>
                                    <th>Valor Ref. Mercado</th>
                                    <th>Valor Ref. Auto Action</th>
                                    <th>Lance</th>
                                    <th>Data Lance</th>
                                    <th>Hora Lance</th>
                                    <th>Lojista</th>
                                    <th>CPF</th>   
                                    <th>Tem lance aceito</th> 
                                </x-slot>
                            </x-layout.table>
                        </x-slot>
                    </x-layout.card-table>
                </x-slot>
            </x-layout.page>
            
        </x-slot>
    </x-layout.page>
</x-app-layout>
