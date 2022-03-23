{{-- Para resaltar el boton de la pagina actual
	https://aprendible.com/series/laravel-desde-cero/lecciones/activacion-de-links-de-navegacion/ --}}
<nav
	x-data="{ open: false }"
	class="bg-gray-800 text-gray-400"
>
	<!-- Primary Navigation Menu -->
	<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="flex h-16 justify-between">
			<div class="flex">
				<!-- Logo -->
				<div class="flex shrink-0 items-center">
					<a href="{{ route('dashboard') }}">
						<x-application-logo class="block h-10 w-auto fill-current text-teal-500" />
					</a>
				</div>

				<!-- Navigation Links -->
				<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
					<x-nav-link
						:href="route('vacantes.index')"
						{{-- :active="request()->is('vacantes')" --}}
						:active="request()->routeIs('vacantes.*')"
					>
						Vacantes
					</x-nav-link>
					<x-nav-link
						:href="route('vacantes.index')"
						:active="request()->is('usuarios')"
					>
						Usuarios
					</x-nav-link>
				</div>
			</div>

			<!-- Settings Dropdown -->
			<div class="hidden sm:ml-6 sm:flex sm:items-center">
				<x-dropdown
					align="right"
					width="48"
				>
					<x-slot name="trigger">
						<button
							class="flex items-center text-sm font-medium transition duration-150 ease-in-out hover:border-gray-300 hover:text-gray-300 focus:border-teal-500 focus:text-gray-300 focus:outline-none"
						>
							<img
								src="https://ui-avatars.com/api/?size=30&background=0D8ABC&color=fff&name={{ Auth::user()->name }}"
								alt="{{ Auth::user()->name }}"
								class="mr-3 rounded-lg"
							>
							<div class="relative">{{ Auth::user()->name }}
								@php
									$notificaciones = Auth::user()->unreadNotifications->count();
								@endphp

								<a
									href="{{ route('notificaciones.index') }}"
									class="hover:text-teal-500"
								>
									@if ($notificaciones > 0)
										<svg
											xmlns="http://www.w3.org/2000/svg"
											width="16"
											height="16"
											fill="currentColor"
											class="mr-4 ml-1 inline-block text-teal-500"
											viewBox="0 0 16 16"
										>
											<path
												d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"
											/>
										</svg>
										<span class="absolute right-0 top-0 text-xs font-extralight text-teal-500">
											{{ $notificaciones }}
										</span>
									@else
										<svg
											xmlns="http://www.w3.org/2000/svg"
											width="16"
											height="16"
											fill="currentColor"
											class="bi bi-bell mx-2 inline-block"
											viewBox="0 0 16 16"
										>
											<path
												d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"
											/>
										</svg>
									@endif
								</a>
							</div>

							<div class="ml-1">
								<svg
									class="h-4 w-4 fill-current"
									xmlns="http://www.w3.org/2000/svg"
									viewBox="0 0 20 20"
								>
									<path
										fill-rule="evenodd"
										d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
										clip-rule="evenodd"
									/>
								</svg>
							</div>
						</button>
					</x-slot>

					<x-slot name="content">
						<!-- Authentication -->
						<form
							method="POST"
							action="{{ route('logout') }}"
						>
							@csrf

							<x-dropdown-link
								:href="route('logout')"
								onclick="event.preventDefault();
																																																this.closest('form').submit();"
							>
								{{ __('Log Out') }}
							</x-dropdown-link>
						</form>
					</x-slot>
				</x-dropdown>
			</div>

			<!-- Hamburger -->
			<div class="-mr-2 flex items-center sm:hidden">
				<button
					@click="open = ! open"
					class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
				>
					<svg
						class="h-6 w-6"
						stroke="currentColor"
						fill="none"
						viewBox="0 0 24 24"
					>
						<path
							:class="{'hidden': open, 'inline-flex': ! open }"
							class="inline-flex"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="M4 6h16M4 12h16M4 18h16"
						/>
						<path
							:class="{'hidden': ! open, 'inline-flex': open }"
							class="hidden"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="M6 18L18 6M6 6l12 12"
						/>
					</svg>
				</button>
			</div>
		</div>
	</div>

	<!-- Responsive Navigation Menu -->
	<div
		:class="{'block': open, 'hidden': ! open}"
		class="hidden sm:hidden"
	>
		<div class="space-y-1 pt-2 pb-3">
			<x-responsive-nav-link
				:href="route('dashboard')"
				:active="request()->routeIs('dashboard')"
			>
				Vacantes
			</x-responsive-nav-link>
		</div>

		<!-- Responsive Settings Options -->
		<div class="border-t border-gray-200 pt-4 pb-1">
			<div class="px-4">
				<div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
				<div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
			</div>

			<div class="mt-3 space-y-1">
				<!-- Authentication -->
				<form
					method="POST"
					action="{{ route('logout') }}"
				>
					@csrf

					<x-responsive-nav-link
						:href="route('logout')"
						onclick="event.preventDefault();
																																								this.closest('form').submit();"
					>
						{{ __('Log Out') }}
					</x-responsive-nav-link>
				</form>
			</div>
		</div>
	</div>
</nav>
