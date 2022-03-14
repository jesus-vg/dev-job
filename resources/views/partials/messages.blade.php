@if (session('success'))
	<div
		class="alert bg-green-100 p-4 text-center text-sm text-green-700"
		role="alert"
	>
		{{ session('success') }}
	</div>
@endif

@if (session('error'))
	<div
		class="alert bg-red-100 p-4 text-center text-sm text-red-700"
		role="alert"
	>
		{{ session('error') }}
	</div>
@endif
