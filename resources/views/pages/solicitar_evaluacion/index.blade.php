<x-app-layout>
    <x-layout.page>
        <x-slot name="titulo">Solicitudes de Evaluación</x-slot>
        <x-slot name="boton"></x-slot>
        <x-slot name="indicadores"></x-slot>
        <x-slot name="cuerpo">
            <div class="row mb-4">
                <h4>Evaluación</h4>
                <div class="col-sm-6">
                    <x-form.input tipo="text" id="tipoEvaluacion" titulo="Tipo de Evaluación" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-6">
                    <x-form.input tipo="text" id="vendedor" titulo="Vendedor" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
                <h4>Datos del Cliente</h4>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="name" titulo="Nombre" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="email" id="email" titulo="Correo" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="number" id="movil" titulo="Móvil" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
            <h4>Vehiculo de Interes</h4>
                <div class="col-sm-4">
                    <x-form.input tipo="date" id="date" titulo="Año" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-8">
                    <x-form.input tipo="text" id="vehiculo" titulo="Vehiculo" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
            <h4>Vehiculo para Evaluacion</h4>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="vin" titulo="VIN" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="exdelcliente" titulo="Expectativa del Cliente" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="vehiculo" titulo="¿Tiene el historial del servicio?" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
            <h4></h4>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="historial" titulo="El historial del servicio contiene..." holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="expecauto" titulo="Expectatuva del auto" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="manueal" titulo="¿Tiene manual de propietario?" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="row mb-4">
            <h4></h4>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="duplicadollave" titulo="¿Usted tiene duplicado de llave?" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="siniestro" titulo="¿Tuvo algun siniestro?" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
                <div class="col-sm-4">
                    <x-form.input tipo="text" id="dueño" titulo="¿Es el primer dueño?" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            </div>
            <div class="col-sm-4">
                    <x-form.input tipo="text" id="vehiculofinanciado" titulo="¿El vehiculo esta finaciado?" holder="" required="true" options='' validationclass=''></x-form.input>
                </div>
            
        </x-slot>
    </x-layout.page>
</x-app-layout>
