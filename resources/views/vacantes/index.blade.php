<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-teal-500 leading-tight container mx-auto">
			Adiministrar tus vacantes
		</h2>
	</x-slot>

	<div class="container shadow-md bg-white rounded-md mx-auto mt-4 p-3">
		<div class="w-full max-w-xs">
			<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
				<div class="mb-4">
					<label
						class="block text-gray-700 text-sm font-bold mb-2"
						for="username"
					>
						Username
					</label>
					<input
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						id="username"
						type="text"
						placeholder="Username"
					>
				</div>
				<div class="mb-6">
					<label
						class="block text-gray-700 text-sm font-bold mb-2"
						for="password"
					>
						Password
					</label>
					<input
						class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
						id="password"
						type="password"
						placeholder="******************"
					>
					<p class="text-red-500 text-xs italic">Please choose a password.</p>
				</div>
				<div class="flex items-center justify-between">
					<button
						class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
						type="button"
					>
						Sign In
					</button>
					<a
						class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
						href="#"
					>
						Forgot Password?
					</a>
				</div>
			</form>

			<form class="w-full max-w-sm">
				<div class="md:flex md:items-center mb-6">
					<div class="md:w-1/3">
						<label
							class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
							for="inline-full-name"
						>
							Full Name
						</label>
					</div>
					<div class="md:w-2/3">
						<input
							class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
							id="inline-full-name"
							type="text"
							value="Jane Doe"
						>
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


			<p class="text-center text-gray-500 text-xs">
				&copy;2020 Acme Corp. All rights reserved.
			</p>
		</div>


		<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
			<a href="#">
				<img
					class="rounded-t-lg"
					src="/docs/images/blog/image-1.jpg"
					alt=""
				/>
			</a>
			<div class="p-5">
				<a href="#">
					<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions
						2021</h5>
				</a>
				<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions
					of 2021 so far, in reverse chronological order.</p>
				<a
					href="#"
					class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
				>
					Read more
					<svg
						class="ml-2 -mr-1 w-4 h-4"
						fill="currentColor"
						viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							fill-rule="evenodd"
							d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
							clip-rule="evenodd"
						></path>
					</svg>
				</a>
			</div>
		</div>

		<button
			type="button"
			class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
		>Green</button>

		<button
			id="dropdownButton"
			data-dropdown-toggle="dropdown"
			class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
			type="button"
		>Dropdown button <svg
				class="ml-2 w-4 h-4"
				fill="none"
				stroke="currentColor"
				viewBox="0 0 24 24"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="M19 9l-7 7-7-7"
				></path>
			</svg></button>

		<!-- Dropdown menu -->
		<div
			id="dropdown"
			class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"
		>
			<ul
				class="py-1"
				aria-labelledby="dropdownButton"
			>
				<li>
					<a
						href="#"
						class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
					>Dashboard</a>
				</li>
				<li>
					<a
						href="#"
						class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
					>Settings</a>
				</li>
				<li>
					<a
						href="#"
						class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
					>Earnings</a>
				</li>
				<li>
					<a
						href="#"
						class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
					>Sign out</a>
				</li>
			</ul>
		</div>

		<button
			type="button"
			class="btn-primary"
		>Hola</button>
	</div>
</x-app-layout>
