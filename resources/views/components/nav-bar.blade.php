<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-gray-800">
	<div class="max-w-7xl mx-auto px-4 sm:px-6">
		<div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
			<div class="flex justify-start lg:w-0 lg:flex-1">
				<a href="#">
					<span class="sr-only">Workflow</span>
					<img
						class="h-8 w-auto sm:h-10"
						src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
						alt=""
					>
				</a>
			</div>
			<nav class="flex space-x-10">
				<a
					href="#"
					class="text-base font-medium text-gray-500 hover:text-gray-100"
				> Pricing </a>
				<a
					href="#"
					class="text-base font-medium text-gray-500 hover:text-gray-100"
				> Docs </a>

			</nav>
			<div class="flex items-center justify-end md:flex-1 lg:w-0">
				<a
					href="{{ route('login') }}"
					class="whitespace-nowrap text-base font-medium  {{ request()->is('login')? 'px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-teal-500 hover:bg-teal-700': 'text-gray-500 hover:text-gray-100' }}"
				> Sign in </a>
				<a
					href="{{ route('register') }}"
					class="ml-4 whitespace-nowrap text-base font-medium {{ request()->is('register')? 'px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-teal-500 hover:bg-teal-700': 'text-gray-500 hover:text-gray-100' }}"
				> Sign up </a>
			</div>
		</div>
	</div>
</div>
