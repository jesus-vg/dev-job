<x-app-layout>
	<x-slot name="header">
		<div class="container mx-auto flex justify-between">
			<h1 class="text-xl font-semibold leading-tight text-teal-500">
				Notificaciones
			</h1>
		</div>
	</x-slot>

	<div>
		<div class="container mx-auto mt-4 rounded-md bg-white p-3 shadow-md">

			<h2>Notificaciones sin leer</h2>

			@if (count($notificaciones_sin_leer) > 0)
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
												Vacante
											</th>
											<th
												scope="col"
												class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400"
											>
												Fecha
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
										@foreach ($notificaciones_sin_leer as $notificacion)
											<tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
												<td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
													{{ $notificacion->data['titulo'] }}
												</td>
												<td class="whitespace-nowrap py-4 px-6 text-sm text-gray-500 dark:text-gray-400">
													{{ $notificacion->created_at->format('d/m/Y') }}
												</td>
												<td class="whitespace-nowrap py-4 px-6 text-right text-sm font-medium">
													<a
														href="#"
														class="text-blue-500 hover:underline"
													>Ver candidatos</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			@else
				<h2 class="my-5 text-center text-3xl font-medium text-gray-400">Estas al día con las notificaciones</h2>
			@endif



			<h2>Notificaciones anteriores</h2>

			@if (count($notificaciones_leidas) > 0)

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
												Vacante
											</th>
											<th
												scope="col"
												class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400"
											>
												Fecha
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
										@foreach ($notificaciones_leidas as $notificacion)
											<tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
												<td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
													{{ $notificacion->data['titulo'] }}
												</td>
												<td class="whitespace-nowrap py-4 px-6 text-sm text-gray-500 dark:text-gray-400">
													{{ $notificacion->created_at->format('d/m/Y') }}
												</td>
												<td class="whitespace-nowrap py-4 px-6 text-right text-sm font-medium">
													<a
														href="{{ route('candidatos.index', ['slugVacante' => basename($notificacion->data['url'])]) }}"
														class="text-blue-500 hover:underline"
													>Ver candidatos</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			@else
				<h2 class="my-5 text-center text-3xl font-medium text-gray-400">No hay notificaciones aún</h2>
			@endif
</x-app-layout>
