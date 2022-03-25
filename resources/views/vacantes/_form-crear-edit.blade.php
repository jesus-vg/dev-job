{{-- Doc para returilizar formularios
	https://aprendible.com/series/laravel-desde-cero/lecciones/reutilizando-el-formulario --}}
@csrf
<div class="flex flex-wrap">
	<div class="w-full p-3 md:w-1/2 lg:w-1/3">
		<div class="mb-6 md:flex md:items-center">
			<div class="md:w-1/3">
				<label
					class="mb-2 block text-sm font-medium text-gray-900"
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
					class="@error('titulo') border-red-500 @enderror w-full appearance-none rounded-lg border bg-gray-200 py-2 px-4 leading-tight text-gray-700 focus:border-gray-800 focus:outline-none focus:ring-gray-800"
					value="{{ old('titulo', $vacante->titulo) }}"
				>
				@error('titulo')
					<x-mensaje-error-input :message="$message" />
				@enderror
			</div>
		</div>
		<div class="mb-6 md:flex md:items-center">
			<div class="md:w-1/3">
				<label
					for="categoria"
					class="mb-2 block text-sm font-medium text-gray-900"
				>Categoria</label>
			</div>
			<div class="md:w-2/3">
				<select
					id="categoria"
					name="categoria"
					class="@error('categoria') border-red-500 @enderror w-full rounded-lg border bg-gray-700 text-sm text-gray-300 placeholder-gray-400 focus:border-gray-500 focus:ring-gray-500"
				>
					<option value="">- Selecciona una categoria -</option>
					@foreach ($categorias as $categoria)
						<option
							value="{{ $categoria->id }}"
							{{ old('categoria', $vacante->categoria_id) == $categoria->id ? 'selected' : '' }}
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
		<div class="mb-6 md:flex md:items-center">
			<div class="md:w-1/3">
				<label
					for="experiencia"
					class="mb-2 block text-sm font-medium text-gray-900"
				>Experiencia</label>
			</div>
			<div class="md:w-2/3">
				<select
					id="experiencia"
					name="experiencia"
					class="@error('experiencia') border-red-500 @enderror w-full rounded-lg border bg-gray-700 text-sm text-gray-300 placeholder-gray-400 focus:border-gray-500 focus:ring-gray-500"
				>
					<option value="">- Selecciona una categoria -</option>
					@foreach ($experiencias as $experiencia)
						<option
							value="{{ $experiencia->id }}"
							{{ old('experiencia', $vacante->experiencia_id) == $experiencia->id ? 'selected' : '' }}
						>{{ $experiencia->nombre }}</option>
					@endforeach
				</select>
				@error('experiencia')
					<x-mensaje-error-input :message="$message" />
				@enderror
			</div>
		</div>
		<div class="mb-6 md:flex md:items-center">
			<div class="md:w-1/3">
				<label
					for="ubicacion"
					class="mb-2 block text-sm font-medium text-gray-900"
				>Ubicación</label>
			</div>
			<div class="md:w-2/3">
				<select
					id="ubicacion"
					name="ubicacion"
					class="@error('ubicacion') border-red-500 @enderror w-full rounded-lg border bg-gray-700 text-sm text-gray-300 placeholder-gray-400 focus:border-gray-500 focus:ring-gray-500"
				>
					<option value="">- Selecciona una ubicación -</option>
					@foreach ($ubicaciones as $ubicacion)
						<option
							value="{{ $ubicacion->id }}"
							{{ old('ubicacion', $vacante->ubicacion_id) == $ubicacion->id ? 'selected' : '' }}
						>{{ $ubicacion->nombre }}</option>
					@endforeach
				</select>
				@error('ubicacion')
					<x-mensaje-error-input :message="$message" />
				@enderror
			</div>
		</div>
		<div class="mb-6 md:flex md:items-center">
			<div class="md:w-1/3">
				<label
					for="salario"
					class="mb-2 block text-sm font-medium text-gray-900"
				>Salario</label>
			</div>
			<div class="md:w-2/3">
				<select
					id="salario"
					name="salario"
					class="@error('salario') border-red-500 @enderror w-full rounded-lg border bg-gray-700 text-sm text-gray-300 placeholder-gray-400 focus:border-gray-500 focus:ring-gray-500"
				>
					<option value="">- Selecciona un rango -</option>
					@foreach ($salarios as $salario)
						<option
							value="{{ $salario->id }}"
							{{ old('salario', $vacante->salario_id) == $salario->id ? 'selected' : '' }}
						>{{ $salario->nombre }}</option>
					@endforeach
				</select>
				@error('salario')
					<x-mensaje-error-input :message="$message" />
				@enderror
			</div>
		</div>
	</div>
	<div class="w-full p-3 md:w-1/2 lg:w-2/3">
		<mediumn-editor descripcion="{{ old('descripcion', $vacante->descripcion) }}"></mediumn-editor>
		@error('descripcion')
			<x-mensaje-error-input :message="$message" />
		@enderror
	</div>
	<div class="w-full text-center">
		@if (isset($imagenesTemp))
			<dropzonejs imagenes-temporales="{{ old('imagen', json_encode($imagenesTemp)) }}"></dropzonejs>
		@else
			<dropzonejs
				imagenes-guardadas="{{ old('imagen', $vacante->imagen) }}"
				:id-vacante="{{ $vacante->id }}"
			>
			</dropzonejs>
		@endif

		@error('imagen')
			<x-mensaje-error-input :message="$message" />
		@enderror
	</div>
	<div class="mx-auto my-4 max-w-2xl text-center">
		@php
			$skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails'];
		@endphp
		<lista-skills
			:skills="{{ json_encode($skills) }}"
			:old-skills="{{ json_encode(old('skills', $vacante->skills)) }}"
		></lista-skills>
		@error('skills')
			<x-mensaje-error-input :message="$message" />
		@enderror
	</div>
	<div class="w-full text-center">
		<button
			type="submit"
			class="btn-primary"
		>
			{{ $btnText }}
		</button>
	</div>
</div>
