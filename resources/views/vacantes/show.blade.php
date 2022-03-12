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
					Publicado por: <span class="font-normal">{{ $vacante->usuario->name }}</span>
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

				{{-- imagenes, usamo el component lightbox para mostrar las imagenes (usamos el evento onclick) --}}
				<div class="my-5">
					<div class="flex flex-wrap justify-center">
						@php
							$imagenes = json_decode($vacante->imagen);
						@endphp

						@foreach ($imagenes as $key => $urlImagen)
							<div class="w-52 rounded-lg">
								<img
									src="{{ asset('storage/' . $urlImagen) }}"
									alt="{{ $vacante->titulo }}"
									class="w-full cursor-pointer"
									onclick="openModal();currentSlide({{ $key + 1 }})"
								>
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
			<aside class="mx-1 rounded bg-gray-800 p-3 text-gray-100 md:mx-3 md:w-2/5 md:px-4 xl:p-10">
				<h2 class="mb-3 text-2xl">Contacta al reclutador</h2>
				<form
					action=""
					method="post"
					enctype="multipart/form-data"
				>
					@csrf
					<div class="mb-4">
						<label
							for="nombre"
							class="mb-2 block text-sm font-bold text-gray-400"
						>
							Nombre
						</label>
						<input
							type="text"
							name="nombre"
							id="nombre"
							class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow placeholder:text-gray-400 focus:outline-none @error('nombre') border-red-500 @enderror"
							placeholder="Tu nombre"
							value="{{ old('nombre', '') }}"
							required
						>
						@error('nombre')
							<p class="mt-4 text-xs italic text-red-500">
								{{ $message }}
							</p>
						@enderror
					</div>
					<div class="mb-4">
						<label
							for="email"
							class="mb-2 block text-sm font-bold text-gray-400"
						>
							Email
						</label>
						<input
							type="email"
							name="email"
							id="email"
							class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow placeholder:text-gray-400 focus:outline-none @error('email') border-red-500 @enderror"
							placeholder="Tu email"
							value="{{ old('email', '') }}"
							required
						>
						@error('email')
							<p class="mt-4 text-xs italic text-red-500">
								{{ $message }}
							</p>
						@enderror
					</div>
					<div class="mb-4">
						<label
							for="mensaje"
							class="mb-2 block text-sm font-bold text-gray-400"
						>
							Mensaje
						</label>
						<textarea
							name="mensaje"
							id="mensaje"
							class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
							rows="3"
							required
						></textarea>
					</div>
					<div class="mb-4 text-gray-700">
						<label
							for="cv"
							class="mb-2 block text-sm font-bold text-gray-400"
						>
							Elige un CV
						</label>
						<input
							type="file"
							name="cv"
							id="cv"
							class="hidden"
							accept="application/pdf"
							onchange="fileChange()"
						>
						<p
							class="mb-2 py-2 text-sm text-gray-400"
							id="fileName"
						></p>
						<button
							type="button"
							class="focus:shadow-outline rounded border-2 border-teal-500 py-2 px-4 font-bold text-white hover:border-teal-700 focus:outline-none"
							id="btnCv"
							onclick="document.getElementById('cv').click()"
						>
							Selecionar cv
						</button>
						@error('cv')
							<p class="mt-3 text-xs italic text-red-500">
								{{ $message }}
							</p>
						@enderror
					</div>
					<div class="text-center">
						<button class="btn-primary mt-4">
							Enviar
						</button>
					</div>
				</form>
			</aside>
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
		</script>
	</x-slot>

</x-app-layout>
