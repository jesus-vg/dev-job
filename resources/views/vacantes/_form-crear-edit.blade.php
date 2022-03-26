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
				<v-select
					name="categoria"
					data="{{ json_encode($categorias) }}"
					value="{{ old('categoria', $vacante->categoria_id) }}"
				></v-select>
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
				<v-select
					name="experiencia"
					data="{{ json_encode($experiencias) }}"
					value="{{ old('experiencia', $vacante->experiencia_id) }}"
				></v-select>
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
				<v-select
					name="ubicacion"
					data="{{ json_encode($ubicaciones) }}"
					value="{{ old('ubicacion', $vacante->ubicacion_id) }}"
				></v-select>
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
				<v-select
					name="salario"
					data="{{ json_encode($salarios) }}"
					value="{{ old('salario', $vacante->salario_id) }}"
				></v-select>
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
