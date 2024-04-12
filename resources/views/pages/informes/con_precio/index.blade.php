<x-app-layout>
    <x-layout.page>
        <x-slot name="titulo">Con precio</x-slot>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <div class="row mb-4">
                <h4></h4>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="empresa" titulo="Empresa" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="status" titulo="Estatus" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="busqueda" titulo="Busqueda" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
                <h4></h4>
                <div class="col-sm-4">
                    <x-form.input tipo="date" id="año" titulo="Año" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="marca" titulo="Marca" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="modelo" titulo="Modelo" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
                <h4></h4>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="version" titulo="Versión" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
                <h4></h4>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="acciones" titulo="Acciones en masa" holder="" required="true" options='' validationclass=''></x-form.input>
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
                                    <th>Imagen</th>
                                    <th>Descripción</th>
                                    <th>Estatus</th>
                                    <th>Empresa</th>
                                    <th>Fecha</th>
                                    <th>Solicitante/ Evaluador /Fijador de precio</th>
                                    <th>Reparaciones</th>
                                    <th>Evaluación</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </x-slot>
                            </x-layout.table>
                        </x-slot>
                    </x-layout.card-table>
                </x-slot>
            </x-layout.page>
        </x-slot>
    </x-layout.page>
</x-app-layout>
