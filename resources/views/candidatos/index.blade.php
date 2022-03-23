<x-app-layout>
	<x-slot name="header">
		<div class="container mx-auto flex justify-between">
			<h1 class="text-xl font-semibold leading-tight text-teal-500">
				Candidatos
			</h1>
		</div>
	</x-slot>

	<div>
		<h2>Vacante: {{ $vacante->titulo }}</h2>

		@if (count($candidatos) > 0)
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
											Usuario
										</th>
										<th
											scope="col"
											class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400"
										>
											Fecha postulación
										</th>
										<th
											scope="col"
											class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400"
										>
											CV
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($candidatos as $candidato)
										<tr class="border-b border-gray-700 bg-gray-800 text-sm text-gray-400">
											<td class="whitespace-nowrap py-4 px-6">
												<span class="font-medium text-white">{{ $candidato->nombre }}</span>
												<br>
												{{ $candidato->email }}
											</td>
											<td class="whitespace-nowrap py-4 px-6">
												{{ $candidato->created_at->format('d/m/Y') }}
											</td>
											<td class="whitespace-nowrap py-4 px-6 text-right">
												@if ($candidato->cv)
													<a
														href="{{ asset('storage/' . $candidato->cv) }}"
														target="_blank"
														class="hover:text-teal-500 hover:underline"
													>CV</a>
												@else
													-
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			{{ $candidatos->links() }}
		@else
			<h2 class="my-5 text-center text-3xl font-medium text-gray-400">Aún no hay candidatos para esta vacante</h2>
		@endif
	</div>

</x-app-layout>
