<x-modal.modal id="ModalUsuarios" size="modal-lg">
    <x-slot name="titulo"> Usuarios </x-slot>
    <x-slot name="body">
        <form class="js-validate needs-validation" novalidate="" data-name="FormUsuarios" id="FormUsuarios" method="POST" >
            <input type="hidden" id="{{ $inputs['users']->id }}" name="{{ $inputs['users']->id }}" value="">
            <x-form.input-double >
                <x-slot name="primero">
                    <x-form.input tipo="text" id="{{ $inputs['users']->name }}" titulo="Nombre/s" holder="" required="true" options='' validationclass=''></x-form.input>
                </x-slot>
                <x-slot name="segundo">
                    <x-form.input tipo="text" id="{{ $inputs['users']->apellidos }}" titulo="Apellidos" holder="" required="true" options='' validationclass=''></x-form.input>
                </x-slot>
            </x-form.input-double>

            <x-form.input-double >
                <x-slot name="primero">
                    <x-form.input tipo="email" id="{{ $inputs['users']->email }}" titulo="Correo electrónico" holder="" required="true" options='' validationclass=''></x-form.input>
                </x-slot>

                <x-slot name="segundo">
                    <x-form.input tipo="password" id="{{ $inputs['users']->password_plain }}" titulo="Contraseña" holder="" required="true"
                                  error="Campo obligatorio, debe de tener más de 8 caracteres" validationclass="data-hs-validation-validate-class"
                                  options='minlength="8"'></x-form.input>
                </x-slot>
            </x-form.input-double>

            <x-form.input-double >
                <x-slot name="primero">
                    <x-form.select tipo="email" id="{{ $inputs['users']->rol }}" titulo="Rol" holder="" required="true" multiple="" class=""></x-form.select>
                </x-slot>
            </x-form.input-double>


            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success" style="margin-right: 4px"> <i class="bi-check-lg"></i> Guardar</button>
                <button type="button" class="btn btn-white text-danger" data-bs-dismiss="modal"> <i class="bi-x-lg"></i> Cancelar</button>
            </div>
        </form>
    </x-slot>
    @push('js_modulo')
        // const datatable = HSCore.components.HSDatatables.getItem('datatable')

        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================
        HSBsValidation.init('.js-validate', {
            onSubmit: data => {
                data.event.preventDefault()
                HSCallStore.init(data,success)
            }
        })

        const success = (data) => {
            if(data.respuesta) {
                tata.success('Éxito', data.mensaje)
                datatable.ajax.reload()
            }
        }
    @endpush
</x-modal.modal>