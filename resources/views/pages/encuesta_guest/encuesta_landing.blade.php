<!DOCTYPE html>
<html lang="en" dir="">
	<!-- Mirrored from htmlstream.com/preview/front-v4.3.1/page-faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jan 2023 22:22:06 GMT -->
	<head>
		<!-- Required Meta Tags Always Come First -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Title -->
		<title>Encuesta</title>
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<!-- Font -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">
		<!-- CSS Implementing Plugins -->
		<link rel="stylesheet" href="{{ asset('_assets') }}/css/vendor.min.css">
		<link rel="stylesheet" href="{{ asset('_assets') }}/vendor/bootstrap-icons/font/bootstrap-icons.css">
		<!-- CSS Front Template -->
		<link rel="stylesheet" href="{{ asset('_assets') }}/css/theme.minc619.css?v=1.0">

        <style>
            .hero-image {
                background-image: url('{{ asset('_assets') }}/img/pasteko/portada.png');
                background-size: cover;
                background-position: center;
                height: 100vh; /* Esto hace que la sección ocupe el 100% de la altura de la ventana del navegador */
            }
            @media (max-width: 768px) {
                .hero-image {
                    height: 40vh;
                }
            }

            .range-slider {
                width: 100%;
                background: linear-gradient(to right, 
                    green 0%,
                    yellow 33.33%,
                    orange 66.66%,
                    red 100%
                );
                height: 4px; /* Altura del slider */
                border-radius: 2px; /* Radio de los bordes del slider */
                padding:0.2126rem 1rem !important;
            }

            .range-slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background: white;
                cursor: pointer;
            }

            .form-check-input:checked {
                background-color: #ea5731ff!important;
            }

            .radio-image {
                height: 40px; /* Elige la altura deseada */
                width: auto; /* Esto mantendrá la proporción original */
            }
            
            .image-slide {
                height: 50px; /* Elige la altura deseada */
                width: auto; /* Esto mantendrá la proporción original */
            }

        </style>
	</head>
	<body>
		
		<!-- ========== MAIN CONTENT ========== -->
		<main id="content" role="main" class="bg-black">

			<!-- Hero -->
			<div class="hero-image" >
				
			</div>
			<!-- End Hero -->
			<!-- FAQ -->
			<div class="container content-space-1 content-space-b-lg-2">
                <form class="js-validate needs-validation" novalidate="" data-name="FormUsuarios" id="FormUsuarios" method="POST" > 
                    <div class="w-lg-75 mx-lg-auto">
                        <div class="d-grid gap-10">
                            <div class="d-grid gap-2 text-center">
                                <h1 class="text-white">BIENVENID@</h1>
                                <img class="avatar avatar-xl avatar-4x3 mx-auto" src="../{{ ENV('APP_LOGO') }}" alt="Logo">
                                <h3 class="text-white">SUCURSAL: PALOMAS</h3>
                                <h6 class="text-white mt-3">Gracias por brindarnos sus comentarios para mejorar nuestro servicio.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="w-lg-75 mx-5">
                        <h6 class="text-white mt-3">1. ¿Qué le pareció el servicio de la sucursal?</h6>
                        <div class="mb-4">
                            <div class="row my-3">
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple1.png" alt="Logo">
                                </div>
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple2.png" alt="Logo">
                                </div>
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple3.png" alt="Logo">
                                </div>
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple4.png" alt="Logo">
                                </div>
                            </div>
                            <input type="range"  class="form-control range-slider" name="hireUsFormNameCompanyName" id="hireUsFormCompanyName" placeholder="Nombre" aria-label="Nombre" min="0" max="3" step="1">
                        </div>
                        <h6 class="text-white mt-3">2. ¿Nuestro personal fue amable con usted?</h6>
                        <div class="my-4 d-flex justify-content-center align-items-center">
                            <div class="radio-container text-center mx-5">
                                <img class="radio-image" src="{{ asset('_assets') }}/img/pasteko/cara1.png" alt="Opción 1">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="formInlineRadio1" class="form-check-input" name="formInlineRadio">
                                    <label class="form-check-label text-white" for="formInlineRadio1">
                                        Si
                                    </label>
                                </div>
                            </div>
                            <div class="radio-container text-center mx-5">
                                <img class="radio-image" src="{{ asset('_assets') }}/img/pasteko/cara2.png" alt="Opción 2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="formInlineRadio2" class="form-check-input indeterminate-checkbox" name="formInlineRadio">
                                    <label class="form-check-label text-white" for="formInlineRadio2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-white mt-3">3. ¿Qué le pareció el sabor de nuestros alimentos?</h6>
                        <div class="mb-4">
                            <div class="row my-3">
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple1.png" alt="Logo">
                                </div>
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple2.png" alt="Logo">
                                </div>
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple3.png" alt="Logo">
                                </div>
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple4.png" alt="Logo">
                                </div>
                            </div>
                            <input type="range"  class="form-control range-slider" name="hireUsFormNameCompanyName" id="hireUsFormCompanyName" placeholder="Nombre" aria-label="Nombre" min="0" max="3" step="1">
                        </div>
                        <h6 class="text-white mt-3">4. ¿Al hacer su pedido, el personal le invitó a probar algún producto?</h6>
                        <div class="my-4 d-flex justify-content-center align-items-center">
                            <div class="radio-container text-center mx-5">
                                <img class="radio-image" src="{{ asset('_assets') }}/img/pasteko/bueno1.png" alt="Opción 1">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="formInlineRadio1" class="form-check-input" name="formInlineRadio">
                                    <label class="form-check-label text-white" for="formInlineRadio1">
                                        Si
                                    </label>
                                </div>
                            </div>
                            <div class="radio-container text-center mx-5">
                                <img class="radio-image" src="{{ asset('_assets') }}/img/pasteko/bueno2.png" alt="Opción 2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="formInlineRadio2" class="form-check-input indeterminate-checkbox" name="formInlineRadio">
                                    <label class="form-check-label text-white" for="formInlineRadio2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-white mt-3">5. ¿Como calificaría la limpieza e higiene de la sucursal?</h6>
                        <div class="mb-4">
                            <div class="row my-3">
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple1.png" alt="Logo">
                                </div>
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple2.png" alt="Logo">
                                </div>
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple3.png" alt="Logo">
                                </div>
                                <div class="col-3 text-center">
                                    <img class="image-slide" src="{{ asset('_assets') }}/img/pasteko/multiple4.png" alt="Logo">
                                </div>
                            </div>
                            <input type="range"  class="form-control range-slider" name="hireUsFormNameCompanyName" id="hireUsFormCompanyName" placeholder="Nombre" aria-label="Nombre" min="0" max="3" step="1">
                        </div>
                    </div>
                    
                    <div class="w-lg-75 mx-4 mt-7">
                        <h6 class="text-white mt-3">Muchas gracias por sus comentarios, en <img  src="../{{ ENV('APP_LOGO') }}" alt="Logo2" style="height: 1.2em; vertical-align: middle;"> siempre estamos comprometido con la calidad</h6>
                        <div class="mb-4">
                            <label class="form-label text-white" for="hireUsFormCompanyName">Nombre <span class="form-label-secondary text-white">(Optional)</span></label>
                            <input type="text" class="form-control form-control-lg" name="hireUsFormNameCompanyName" id="hireUsFormCompanyName" placeholder="Nombre" aria-label="Nombre">
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-white" for="hireUsFormCompanyName">Correo electrónico <span class="form-label-secondary text-white">(Optional)</span></label>
                            <input type="text" class="form-control form-control-lg" name="hireUsFormNameCompanyName" id="hireUsFormCompanyName" placeholder="Correo electrónico" aria-label="Correo electrónico">
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-white" for="hireUsFormDetails">Comentarios <span class="form-label-secondary text-white">(Optional)</span></label>
                            <textarea class="form-control form-control-lg" name="hireUsFormNameDetails" id="hireUsFormDetails" placeholder="Comentarios" aria-label="Comentarios" rows="4"></textarea>
                        </div>
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn text-white" style="background-color: #ea5731ff;">Terminar</button>
                        </div>
                    </div>
                </form>
			</div>
			<!-- End FAQ -->
		</main>
		<!-- ========== END MAIN CONTENT ========== -->
		
		
		<!-- JS Implementing Plugins -->
		<script src="{{ asset('_assets') }}/js/vendor.min.js"></script>
		<!-- JS Front -->
		<script src="{{ asset('_assets') }}/js/theme.min.js"></script>
		<!-- JS Plugins Init. -->
		<script>
			(function() {
			
			  
			  HSBsValidation.init('.js-validate', {
			    onSubmit: data => {
			      data.event.preventDefault()
			      alert('Submited')
			    }
			  })
			  
			})()
		</script>
	</body>
</html>