<x-app-layout>
	<x-slot name="header">
		<div class="flex justify-between container mx-auto">
			<h2 class="font-semibold text-xl text-teal-500 leading-tight">
				Crear nueva vacante
			</h2>
		</div>
	</x-slot>

	<div class="container shadow-md bg-white rounded-md mx-auto mt-4 p-3">

		<form class="w-full max-w-sm">
			<div class="md:flex md:items-center mb-6">
				<div class="md:w-1/3">
					<label
						class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
						for="inline-full-name"
					>
						Titulo de la vacante:
					</label>
				</div>
				<div class="md:w-2/3">
					<input
						type="text"
						id="inline-full-name"
						name="title"
						class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
						value="{{ old('titulo') }}"
					>
				</div>
			</div>
			<div class="md:flex md:items-center mb-6">
				<div class="md:w-1/3">
					<label
						for="categoria"
						class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"
					>Categoria</label>
				</div>
				<div class="md:w-2/3">
					<select
						id="countries"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					>
						<option
							disabled
							selected
						>- Selecciona una categoria -</option>
						@foreach ($categorias as $categoria)
							<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="md:flex md:items-center mb-6">
				<div class="md:w-1/3">
					<label
						for="categoria"
						class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"
					>Experiencia</label>
				</div>
				<div class="md:w-2/3">
					<select
						id="countries"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					>
						<option
							disabled
							selected
						>- Selecciona una categoria -</option>
						@foreach ($experiencias as $experiencia)
							<option value="{{ $experiencia->id }}">{{ $experiencia->nombre }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="md:flex md:items-center mb-6">
				<div class="md:w-1/3">
					<label
						class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
						for="inline-password"
					>
						Password
					</label>
				</div>
				<div class="md:w-2/3">
					<input
						class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
						id="inline-password"
						type="password"
						placeholder="******************"
					>
				</div>
			</div>
			<div class="md:flex md:items-center mb-6">
				<div class="md:w-1/3"></div>
				<label class="md:w-2/3 block text-gray-500 font-bold">
					<input
						class="mr-2 leading-tight"
						type="checkbox"
					>
					<span class="text-sm">
						Send me your newsletter!
					</span>
				</label>
			</div>
			<div class="md:flex md:items-center">
				<div class="md:w-1/3"></div>
				<div class="md:w-2/3">
					<button
						class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
						type="button"
					>
						Sign Up
					</button>
				</div>
			</div>
		</form>


		<button
			type="button"
			class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
		>Green</button>


		<button
			type="button"
			class="btn-primary"
		>Hola</button>
	</div>
</x-app-layout>
