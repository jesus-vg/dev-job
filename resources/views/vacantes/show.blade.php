<x-app-layout>
	<x-slot name="header">
		<div class="container mx-auto flex justify-between">
			<h2 class="text-xl font-semibold leading-tight text-teal-500">
				Datos de la vacante
			</h2>
		</div>
	</x-slot>

	<div class="container mx-auto">
		<h1 class="text-3xl font-medium text-gray-700">{{ $vacante->titulo }}</h1>
		<div class="mt-5 items-start md:flex">
			<div class="w-3/5 text-gray-700">
				<p class="my-2 font-bold">
					Publicado por: <span class="font-normal">{{ $vacante->reclutador->name }}</span>
				</p>
				<p class="my-2 font-bold">
					Publicado: <span class="font-normal">{{ $vacante->created_at->diffForHumans() }}</span>
				</p>
				<p class="my-2 font-bold">
					Categoría: <span class="font-normal">{{ $vacante->categoria->nombre }}</span>
				</p>
				<p class="my-2 font-bold">
					Salario: <span class="font-normal">{{ $vacante->salario->nombre }}</span>
				</p>
				<p class="my-2 font-bold">
					Ubicación: <span class="font-normal">{{ $vacante->ubicacion->nombre }}</span>
				</p>
				<p class="my-2 font-bold">
					Experiencia: <span class="font-normal">{{ $vacante->experiencia->nombre }}</span>
				</p>

				@php
					$imagenes = json_decode($vacante->imagen);
				@endphp

				{{-- imagenes, usamos el component lightbox para mostrar las imagenes (usamos el evento onclick) --}}
				<div class="my-5">
					<div class="flex flex-wrap">
						@foreach ($imagenes as $key => $urlImagen)
							<div class="m-1 w-52 overflow-hidden rounded-lg shadow-md">
								<div class="aspect-w-16 aspect-h-9 bg-gray-400">
									<img
										src="{{ asset('storage/' . $urlImagen) }}"
										alt="{{ $vacante->titulo }}"
										class="h-full w-full cursor-pointer object-cover"
										onclick="openModal();currentSlide({{ $key + 1 }})"
									>
								</div>
							</div>
						@endforeach
					</div>
				</div>

				{{-- conocimientos y habilidades --}}
				<div class="my-5">
					<h3 class="mb-5 text-center text-2xl font-medium">Conocimientos y habilidades</h3>
					<ul class="list-none">
						@foreach (explode(',', $vacante->skills) as $skill)
							<li
								class="m-1 inline-block select-none rounded-lg border border-gray-400 py-1 px-2 hover:bg-gray-800 hover:text-gray-100"
							>
								{{ $skill }}
							</li>
						@endforeach
					</ul>
				</div>

				{{-- descripcion de la vancante --}}
				<div class="editable text-justify">
					{!! Purify::clean($vacante->descripcion) !!}
				</div>
			</div>

			@include('vacantes.form-contacto')

		</div>
	</div>

	<x-slot name="scripts">
		<x-lightbox :imagenes="$imagenes"></x-lightbox>

		<script>
		 const fileChange = () => {
		  const inputCV = document.getElementById('cv');
		  const labelFileName = document.getElementById('fileName');
		  const file = inputCV.files[0];

		  labelFileName.innerHTML = file ? file.name : 'Selecione un archivo pdf';
		 }

		 const validarFormulario = () => {
		  const btnForm = document.getElementById('btnForm');

		  btnForm.disabled = true;
		  btnForm.innerHTML = 'Enviando...';
		 }
		</script>
	</x-slot>

</x-app-layout>
