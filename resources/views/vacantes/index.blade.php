<x-app-layout>
	<x-slot name="styles">
		<script
		  src="//cdn.jsdelivr.net/npm/sweetalert2@11"
		  lazy
		></script>
	</x-slot>

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


	<div class="mt-4 rounded-md bg-white p-3 shadow-md md:px-5 md:py-4">

		@if (count($vacantes) > 0)
			<h1 class="my-5 text-center text-gray-700">Vacantes disponibles</h1>
			<div class="flex flex-col">
				<div class="overflow-x-auto">
					<div class="inline-block min-w-full">
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
												@php
													$candidatos = $vacante->candidatos->count();
												@endphp
												<a href="{{ route('candidatos.index', ['slugVacante' => $vacante->slug]) }}">
													{{ $candidatos > 0 ? $candidatos . ' Candidatos' : 'No hay candidatos' }}
												</a>
											</td>
											<td class="whitespace-nowrap py-4 px-6 text-sm text-gray-500 dark:text-gray-400">
												<estado-vacante
													slug-vacante="{{ $vacante->slug }}"
													:estado="{{ $vacante->activo ? 'true' : 'false' }}"
												></estado-vacante>
											</td>
											<td class="whitespace-nowrap py-4 px-6 text-right text-sm font-medium">
												<a
													href="{{ route('vacantes.edit', [$vacante]) }}"
													class="px-1 text-green-500 hover:underline"
												>Edit</a>
												<eliminar-vacante
													slug="{{ $vacante->slug }}"
													titulo="{{ $vacante->titulo }}"
												></eliminar-vacante>
												<a
													href="{{ route('vacantes.show', $vacante) }}"
													class="px-1 text-blue-500 hover:underline"
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
</x-app-layout>
