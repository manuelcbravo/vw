<x-app-layout>
    <x-layout.page>
        <x-slot name="titulo">LINK PARA EVALUACION ONLINE DEL GRUPO</x-slot>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <div class="row mb-4">
                <h4>Link del Grupo</h4>
                <div class="col-sm-8">
                    <x-form.input tipo="text" id="estatus" titulo="Estatus" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
                <h4>LINK PARA EVALUACION ONLINE DE LA EMPRESA</h4>
                <div class="col-sm-8">
                    <x-form.input tipo="text" id="estatus" titulo="Estatus" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            
        </x-slot>
    </x-layout.page>
</x-app-layout>
