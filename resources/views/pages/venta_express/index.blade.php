<x-app-layout>
    <x-layout.page>
        <x-slot name="titulo">Ventas Online</x-slot>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <div class="row mb-4">
                <h4>Estatus</h4>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="estatus" titulo="Estatus" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-8">
                    <x-form.input tipo="text" id="buscar" titulo="Buscar" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
                <h4></h4>
                <div class="col-sm-3">
                    <x-form.input tipo="text" id="vendedor" titulo="Vendedor" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-3">
                    <x-form.input tipo="text" id="evaluador" titulo="Evaluador" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-3">
                    <x-form.input tipo="date" id="Fecha_inicial" titulo="Fecha Inicial" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-3">
                    <x-form.input tipo="date" id="Fecha_final" titulo="Fecha Final" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            
        </x-slot>
    </x-layout.page>
</x-app-layout>
