<aside class="mx-1 rounded bg-gray-800 p-3 text-gray-100 md:mx-5 md:w-2/5 md:px-4 xl:p-10">
	<h2 class="mb-5 text-2xl">Contacta al reclutador</h2>
	<form
		action="{{ route('candidatos.store') }}"
		method="post"
		enctype="multipart/form-data"
	>
		@csrf
		<div class="mb-4">
			<label
				for="nombre"
				class="mb-2 block text-sm font-bold text-gray-400"
			>
				Nombre
			</label>
			<input
				type="text"
				name="nombre"
				id="nombre"
				class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow placeholder:text-gray-400 focus:outline-none @error('nombre') border-red-500 @enderror"
				placeholder="Tu nombre"
				value="{{ old('nombre', '') }}"
				required
			>
			@error('nombre')
				<p class="mt-4 text-xs italic text-red-500">
					{{ $message }}
				</p>
			@enderror
		</div>
		<div class="mb-4">
			<label
				for="email"
				class="mb-2 block text-sm font-bold text-gray-400"
			>
				Email
			</label>
			<input
				type="email"
				name="email"
				id="email"
				class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow placeholder:text-gray-400 focus:outline-none @error('email') border-red-500 @enderror"
				placeholder="Tu email"
				value="{{ old('email', '') }}"
				required
			>
			@error('email')
				<p class="mt-4 text-xs italic text-red-500">
					{{ $message }}
				</p>
			@enderror
		</div>
		<div class="mb-4">
			<label
				for="mensaje"
				class="mb-2 block text-sm font-bold text-gray-400"
			>
				Mensaje
			</label>
			<textarea
    name="mensaje"
    id="mensaje"
    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
    rows="3"
    required
></textarea>
		</div>
		<div class="mb-4 text-gray-700">
			<label
				for="cv"
				class="mb-2 block text-sm font-bold text-gray-400"
			>
				Elige un CV
			</label>
			<input
				type="file"
				name="cv"
				id="cv"
				class="hidden"
				accept="application/pdf"
				onchange="fileChange()"
			>
			<p
				class="mb-2 py-2 text-sm text-gray-400"
				id="fileName"
			></p>
			<button
				type="button"
				class="focus:shadow-outline rounded border-2 border-teal-500 py-2 px-4 font-bold text-white hover:border-teal-700 focus:outline-none"
				id="btnCv"
				onclick="document.getElementById('cv').click()"
			>
				Selecionar cv
			</button>
			@error('cv')
				<p class="mt-3 text-xs italic text-red-500">
					{{ $message }}
				</p>
			@enderror
		</div>
		<div class="text-center">
			<button class="btn-primary mt-4">
				Enviar
			</button>
		</div>
	</form>
</aside>
{{-- usa script js (para subir archivos), ver en vacantes.show --}}
