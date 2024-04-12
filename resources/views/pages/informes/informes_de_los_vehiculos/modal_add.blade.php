<x-modal.modal id="ModalCategoria" size="modal-lg">
	<x-slot name="titulo"> Categoría </x-slot>
	<x-slot name="body">
		<form class="js-validate needs-validation" novalidate="" data-name="FormUsuarios" id="FormUsuarios" method="POST" action="{{ route('categorias.store') }}">
			<div class="row">
				<input type="hidden" id="{{ $inputs['posts']->id }}" name="{{ $inputs['posts']->id }}" value="">
				<x-form.input tipo="text" id="{{ $inputs['posts']->nombre }}" titulo="Categoría" holder="ej. Linux, Laravel, PHP, etc" required="true" options='' validationclass=''/>
				<x-form.text-area id="{{ $inputs['posts']->descripcion }}" titulo="Descripción" holder="Descripción" required="true"/>
			</div>
			<div class="d-flex justify-content-end">
				<button type="submit" class="btn btn-success" style="margin-right: 4px"><i class="bi-check-lg"></i> Guardar </button>
				<button type="button" class="btn btn-white text-danger" data-bs-dismiss="modal"><i class="bi-x-lg"></i> Cancelar </button>
			</div>
		</form>
	</x-slot> 
	@push('js_modulo') 
			HSBsValidation.init('.js-validate', {
				onSubmit: data => {
					data.event.preventDefault()
					HSCallStore.init(data, success)
				}
			})

			const success = (data) => {
				if (data.respuesta) {
					tata.success('Éxito', data.mensaje)
					datatable.ajax.reload()
				}
			}
				
	@endpush
</x-modal.modal>