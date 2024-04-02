<x-modal.modal id="ModalUsuarios" size="modal-xl">
	<x-slot name="titulo"> @lang("blog.titulo_modal") </x-slot>
	<x-slot name="body">
		<form class="js-validate needs-validation" novalidate="" data-name="FormUsuarios" id="FormUsuarios" method="POST" action="{{ route('posts.store') }}">
			<div class="row">
				<div class="col-lg-4 mb-3">
					<label class="form-label" > Imagen de portada</label>
					<input type="file" class="dropify" data-max-file-size="2M" name="{{ $inputs['posts']->img_portada }}" id="{{ $inputs['posts']->img_portada }}" data-default-file="" accept="image/png, image/gif, image/jpeg, image/jpg"/>
					<span class="form-label">Tamaño maximo de la imagen 2 mb.</span>
				</div>
				<div class="col-lg-8">
					<input type="hidden" id="{{ $inputs['posts']->id }}" name="{{ $inputs['posts']->id }}" value="">
					<x-form.input tipo="text" id="{{ $inputs['posts']->titulo }}" titulo="Titulo" holder="Titulo" required="true" options='' validationclass=''/>
					<x-form.input tipo="text" id="{{ $inputs['posts']->key_words }}" titulo="Palablas clave" holder='Las Key words deben estar separadas con una coma. ej: "reals state, departamentos, etc".' required="true" options='' validationclass=''/>
					<x-form.text-area id="{{ $inputs['posts']->descripcion }}" titulo="Descripción" holder="Descripción" required="true"/>
					<x-form.select id="{{ $inputs['posts']->categoria }}" titulo="Categoria/s" required="true" multiple='multiple' class='categoria'/>
					<x-form.select id="{{ $inputs['posts']->tags }}" titulo="Tags" required="true" multiple='multiple' class='tags'/>
				</div>
			</div>
            <!-- Quill -->
            <div class="quill-custom mb-3">
                <div class="js-quill" style="min-height: 15rem;"
                    data-hs-quill-options='{
                    "placeholder": "Escribe tu mensaje...",
                        "modules": {
                        "toolbar": [
                            ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                        ]
                        }
                    }' id="quill">
                </div>
            </div>
			 <input id="{{ $inputs['posts']->cuerpo }}" name="{{ $inputs['posts']->cuerpo }}" type="hidden">
            <!-- End Quill -->
			<div class="d-flex justify-content-end">
				<button type="submit" class="btn btn-success" style="margin-right: 4px"><i class="bi-check-lg"></i> Guardar </button>
				<button type="button" class="btn btn-white text-danger" data-bs-dismiss="modal"><i class="bi-x-lg"></i> Cancelar </button>
			</div>
		</form>
	</x-slot> 
	@push('js_modulo') 
				// INITIALIZATION OF BOOTSTRAP VALIDATION
				// =======================================================
				HSBsValidation.init('.js-validate', {
					onSubmit: data => {
						data.event.preventDefault()

                		$('#{{ $inputs['posts']->cuerpo }}').val(JSON.stringify(quill.getContents()));

						let postData = new FormData($("#"+data.form.dataset.name)[0]);

						$.ajax({
                        url: data.form.action,
                        type: data.form.method,
                        data: postData,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        beforeSend: function(){
                            loading();
                        },
                        success: function (data) {
							close_loading()
                            if(data.respuesta) {
                                tata.success('Éxito', data.mensaje)
                                datatable.ajax.reload();
                            }
                        },
                        error: function (data) {
							close_loading()
							errorSwal('Error',data)
                        }
                    });
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