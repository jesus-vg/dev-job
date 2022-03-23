<x-app-layout>
	<x-slot name="header">
		<div class="container mx-auto flex justify-between">
			<h2 class="text-xl font-semibold leading-tight text-teal-500">
				Adiministrar tus vacantes
			</h2>
			<a
				href="{{ route('vacantes.create') }}"
				class="btn-primary"
			>Agregar vacante</a>
		</div>
	</x-slot>

	<div class="relative">
		@if (session('success'))
			<p class="absolute top-0 right-0 rounded-md border-l-2 border-green-800 bg-green-300 p-3 text-green-800">
				{{ session('success') }}
			</p>
		@endif

		<div class="mx-auto mt-4 rounded-md bg-white p-3 shadow-md">

			@if (count($vacantes) > 0)
				<h1 class="my-5 text-center text-gray-700">Vacantes disponibles</h1>
				<div class="flex flex-col">
					<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
						<div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
							<div class="overflow-hidden shadow-md sm:rounded-lg">
								<table class="min-w-full">
									<thead class="bg-gray-50 dark:bg-gray-700">
										<tr>
											<th
												scope="col"
												class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400"
											>
												Nombre
											</th>
											<th
												scope="col"
												class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400"
											>
												Candidatos
											</th>
											<th
												scope="col"
												class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400"
											>
												Estado
											</th>
											<th
												scope="col"
												class="relative py-3 px-6"
											>
												<span class="sr-only">Edit</span>
											</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($vacantes as $vacante)
											<tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
												<td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
													{{ $vacante->titulo }}
													<br>
													<span class="text-gray-400">Categoria: {{ $vacante->categoria->nombre }}</span>
												</td>
												<td class="whitespace-nowrap py-4 px-6 text-sm text-gray-500 dark:text-gray-400">
													Candidatos
												</td>
												<td class="whitespace-nowrap py-4 px-6 text-sm text-gray-500 dark:text-gray-400">
													@if ($vacante->activo)
														<span class="text-green-500">Activo</span>
													@else
														<span class="text-red-500">Inactivo</span>
													@endif
												</td>
												<td class="whitespace-nowrap py-4 px-6 text-right text-sm font-medium">
													<a
														href="#"
														class="text-blue-500 hover:underline"
													>Edit</a>
													<a
														href="#"
														class="text-red-500 hover:underline"
													>Eliminar</a>
													<a
														href="{{ route('vacantes.show', $vacante) }}"
														class="text-teal-500 hover:underline dark:text-blue-500"
													>ver</a>

												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					{{-- Paginacion --}}
					{{ $vacantes->links() }}
				</div>
			@else
				<p class="my-5 text-center text-3xl font-medium text-gray-400">No hay vacantes creadas</p>
			@endif
		</div>
	</div>
</x-app-layout>
