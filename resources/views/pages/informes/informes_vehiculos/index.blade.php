<x-app-layout>
    <x-layout.page>
        <x-slot name="titulo">Informes de los Vehiculos</x-slot>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <div class="row mb-4">
                <h4></h4>
                <div class="col-sm-4">
                    <x-form.input tipo="date" id="inicial" titulo="Fecha Inicial" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="date" id="final" titulo="Fecha Final" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="buscar" titulo="Buscar" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
        </x-slot>
    </x-layout.page>
</x-app-layout>
