<div {{ $attributes->merge(['class' => 'flex flex-col sm:justify-center items-center py-10 sm:py-20 bg-gray-100']) }}>
	<div>
		{{ $logo }}
	</div>

	<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
		{{ $slot }}
	</div>
</div>
