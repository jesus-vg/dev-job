<x-app-layout>

	<x-slot name="styles">
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.2/css/medium-editor.min.css"
			integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<link
			href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css"
			rel="stylesheet"
			type="text/css"
		/>
	</x-slot>

	<x-slot name="header">
		<div class="container mx-auto flex justify-between">
			<h2 class="text-xl font-semibold leading-tight text-teal-500">
				Actualizar vacante
			</h2>
		</div>
	</x-slot>

	<div class="container mx-auto my-4 rounded-md bg-white p-3 shadow-md">
		<form
			action="{{ route('vacantes.update', [$vacante]) }}"
			method="POST"
			class="form-vacante w-full"
		>
			@method('PUT')
			@include('vacantes._form-crear-edit', [
			    'btnText' => 'Actualizar vacante',
			])
		</form>
	</div>


	<x-slot name="scripts">
		<script
		  src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.2/js/medium-editor.min.js"
		  integrity="sha512-d6bIVjxc9jWlQOuvjRh5AT2TIJ9IEH/kzCQ8qcek1Cos8ybrj/kCAMKBjRrpHce8nFDpodMKSD+Liu/Nyir9Sw=="
		  crossorigin="anonymous"
		  referrerpolicy="no-referrer"
		></script>
		<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
	</x-slot>

</x-app-layout>
