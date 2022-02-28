<x-app-layout>

	<x-slot name="styles">
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.2/css/medium-editor.min.css"
			integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<link
			href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css"
			rel="stylesheet"
			type="text/css"
		/>
	</x-slot>

	<x-slot name="header">
		<div class="flex justify-between container mx-auto">
			<h2 class="font-semibold text-xl text-teal-500 leading-tight">
				Crear nueva vacante
			</h2>
		</div>
	</x-slot>

	<div class="container shadow-md bg-white rounded-md mx-auto my-4 p-3">
		<form
			action="{{ route('vacantes.store') }}"
			method="POST"
			class="w-full"
		>
			@csrf
			<div class="flex flex-wrap">
				<div class="w-full md:w-1/2 lg:w-1/3 p-3">
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								class="block mb-2 text-sm font-medium text-gray-900 "
								for="titulo"
							>
								Titulo de la vacante:
							</label>
						</div>
						<div class="md:w-2/3">
							<input
								type="text"
								id="titulo"
								name="titulo"
								class="bg-gray-200 border rounded-lg appearance-none w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none  focus:border-gray-800 focus:ring-gray-800 @error('titulo') border-red-500 @enderror"
								value="{{ old('titulo', '') }}"
							>
							@error('titulo')
								<x-mensaje-error-input :message="$message" />
							@enderror
						</div>
					</div>
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								for="categoria"
								class="block mb-2 text-sm font-medium text-gray-900 "
							>Categoria</label>
						</div>
						<div class="md:w-2/3">
							<select
								id="categoria"
								name="categoria"
								class="bg-gray-700 border placeholder-gray-400 text-gray-300 focus:ring-gray-500 focus:border-gray-500 rounded-lg text-sm w-full @error('categoria') border-red-500 @enderror"
							>
								<option>- Selecciona una categoria -</option>
								@foreach ($categorias as $categoria)
									<option
										value="{{ $categoria->id }}"
										{{ old('categoria') == $categoria->id ? 'selected' : '' }}
									>
										{{ $categoria->nombre }}
									</option>
								@endforeach
							</select>
							@error('categoria')
								<x-mensaje-error-input :message="$message" />
							@enderror
						</div>
					</div>
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								for="experiencia"
								class="block mb-2 text-sm font-medium text-gray-900 "
							>Experiencia</label>
						</div>
						<div class="md:w-2/3">
							<select
								id="experiencia"
								name="experiencia"
								class="bg-gray-700 border placeholder-gray-400 text-gray-300 focus:ring-gray-500 focus:border-gray-500 rounded-lg text-sm w-full @error('experiencia') border-red-500 @enderror"
							>
								<option>- Selecciona una categoria -</option>
								@foreach ($experiencias as $experiencia)
									<option
										value="{{ $experiencia->id }}"
										{{ old('experiencia') == $experiencia->id ? 'selected' : '' }}
									>{{ $experiencia->nombre }}</option>
								@endforeach
							</select>
							@error('experiencia')
								<x-mensaje-error-input :message="$message" />
							@enderror
						</div>
					</div>
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								for="ubicacion"
								class="block mb-2 text-sm font-medium text-gray-900 "
							>Ubicación</label>
						</div>
						<div class="md:w-2/3">
							<select
								id="ubicacion"
								name="ubicacion"
								class="bg-gray-700 border placeholder-gray-400 text-gray-300 focus:ring-gray-500 focus:border-gray-500 rounded-lg text-sm w-full @error('ubicacion') border-red-500 @enderror"
							>
								<option>- Selecciona una ubicación -</option>
								@foreach ($ubicaciones as $ubicacion)
									<option
										value="{{ $ubicacion->id }}"
										{{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
									>{{ $ubicacion->nombre }}</option>
								@endforeach
							</select>
							@error('ubicacion')
								<x-mensaje-error-input :message="$message" />
							@enderror
						</div>
					</div>
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								for="salario"
								class="block mb-2 text-sm font-medium text-gray-900 "
							>Salario</label>
						</div>
						<div class="md:w-2/3">
							<select
								id="salario"
								name="salario"
								class="bg-gray-700 border placeholder-gray-400 text-gray-300 focus:ring-gray-500 focus:border-gray-500 rounded-lg text-sm w-full @error('salario') border-red-500 @enderror"
							>
								<option>- Selecciona un rango -</option>
								@foreach ($salarios as $salario)
									<option
										value="{{ $salario->id }}"
										{{ old('salario') == $salario->id ? 'selected' : '' }}
									>{{ $salario->nombre }}</option>
								@endforeach
							</select>
							@error('salario')
								<x-mensaje-error-input :message="$message" />
							@enderror
						</div>
					</div>
				</div>
				<div class="w-full md:w-1/2 lg:w-2/3 p-3">
					<mediumn-editor descripcion="{{ old('descripcion', '') }}"></mediumn-editor>
					@error('descripcion')
						<x-mensaje-error-input :message="$message" />
					@enderror
				</div>
				<div class="w-full text-center">
					<dropzonejs imagenes-temporales="{{ json_encode($imagenesTemp) }}"></dropzonejs>
					@error('imagen')
						<x-mensaje-error-input :message="$message" />
					@enderror
				</div>
				<div class="max-w-2xl mx-auto text-center my-4">
					@php
						$skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails'];
					@endphp
					<lista-skills :skills="{{ json_encode($skills) }}"></lista-skills>
					@error('skills')
						<x-mensaje-error-input :message="$message" />
					@enderror
				</div>
				<div class="w-full text-center">
					<button
						type="submit"
						class="btn-primary"
					>Enviar</button>
				</div>
		</form>
	</div>


	<x-slot name="scripts">
		<script
		  src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.2/js/medium-editor.min.js"
		  integrity="sha512-d6bIVjxc9jWlQOuvjRh5AT2TIJ9IEH/kzCQ8qcek1Cos8ybrj/kCAMKBjRrpHce8nFDpodMKSD+Liu/Nyir9Sw=="
		  crossorigin="anonymous"
		  referrerpolicy="no-referrer"
		></script>
		<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
	</x-slot>

</x-app-layout>
