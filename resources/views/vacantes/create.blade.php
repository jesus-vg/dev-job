<x-app-layout>

	<x-slot name="styles">
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.2/css/medium-editor.min.css"
			integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
	</x-slot>

	<x-slot name="header">
		<div class="flex justify-between container mx-auto">
			<h2 class="font-semibold text-xl text-teal-500 leading-tight">
				Crear nueva vacante
			</h2>
		</div>
	</x-slot>

	<div class="container shadow-md bg-white rounded-md mx-auto my-4 p-3">
		<form class="w-full">
			<div class="flex flex-wrap">
				<div class="w-full md:w-1/2 lg:w-1/3 p-3">
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								class="block mb-2 text-sm font-medium text-gray-900 "
								for="titulo"
							>
								Titulo de la vacante:
							</label>
						</div>
						<div class="md:w-2/3">
							<input
								type="text"
								id="titulo"
								name="titulo"
								class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
								value="{{ old('titulo') }}"
							>
						</div>
					</div>
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								for="categoria"
								class="block mb-2 text-sm font-medium text-gray-900 "
							>Categoria</label>
						</div>
						<div class="md:w-2/3">
							<select
								id="categoria"
								name="categoria"
								class="bg-gray-700 border border-gray-600 placeholder-gray-400 text-gray-300 focus:ring-gray-500 focus:border-gray-500 rounded-lg text-sm w-full"
							>
								<option
									disabled
									selected
								>- Selecciona una categoria -</option>
								@foreach ($categorias as $categoria)
									<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								for="experiencia"
								class="block mb-2 text-sm font-medium text-gray-900 "
							>Experiencia</label>
						</div>
						<div class="md:w-2/3">
							<select
								id="experiencia"
								name="experiencia"
								class="bg-gray-700 border border-gray-600 placeholder-gray-400 text-gray-300 focus:ring-gray-500 focus:border-gray-500 rounded-lg text-sm w-full"
							>
								<option
									disabled
									selected
								>- Selecciona una categoria -</option>
								@foreach ($experiencias as $experiencia)
									<option
										value="{{ $experiencia->id }}"
										class="hover:bg-teal-500 p-2"
									>{{ $experiencia->nombre }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								for="ubicacion"
								class="block mb-2 text-sm font-medium text-gray-900 "
							>Ubicación</label>
						</div>
						<div class="md:w-2/3">
							<select
								id="ubicacion"
								name="ubicacion"
								class="bg-gray-700 border border-gray-600 placeholder-gray-400 text-gray-300 focus:ring-gray-500 focus:border-gray-500 rounded-lg text-sm w-full"
							>
								<option
									disabled
									selected
								>- Selecciona una ubicación -</option>
								@foreach ($ubicaciones as $ubicacion)
									<option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
							<label
								for="salario"
								class="block mb-2 text-sm font-medium text-gray-900 "
							>Salario</label>
						</div>
						<div class="md:w-2/3">
							<select
								id="salario"
								name="salario"
								class="bg-gray-700 border border-gray-600 placeholder-gray-400 text-gray-300 focus:ring-gray-500 focus:border-gray-500 rounded-lg text-sm w-full"
							>
								<option
									disabled
									selected
								>- Selecciona un rango -</option>
								@foreach ($salarios as $salario)
									<option value="{{ $salario->id }}">{{ $salario->nombre }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="w-full md:w-1/2 lg:w-2/3 p-3 flex flex-col">
					<label
						for="descripcion"
						class="block mb-2 text-sm font-medium text-gray-900 "
					>Descripción de la vacante</label>
					<div class="editable p-3 rounded-md shadow-md outline-gray-800 h-full">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque assumenda provident reiciendis fugiat, tempore
						facilis
						illo consequuntur molestiae? Eveniet praesentium tempora pariatur doloremque molestias optio? Maiores veniam cum
						rem
						incidunt.
					</div>
					<input
						type="hidden"
						name="descripcion"
						name="descripcion"
					>
				</div>
				<div class="w-full text-center">
					<button
						type="button"
						class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
					>Green</button>
				</div>
		</form>
	</div>



	<x-slot name="scripts">
		<script>
		 // $(document).ready(function () {
		 // 	$('#countries').select2({
		 // 		placeholder: 'Selecciona una ubicación',
		 // 		allowClear: true,
		 // 		language: "es"
		 // 	});
		 // });
		</script>
		<script
		  src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.2/js/medium-editor.min.js"
		  integrity="sha512-d6bIVjxc9jWlQOuvjRh5AT2TIJ9IEH/kzCQ8qcek1Cos8ybrj/kCAMKBjRrpHce8nFDpodMKSD+Liu/Nyir9Sw=="
		  crossorigin="anonymous"
		  referrerpolicy="no-referrer"
		></script>

		<script>
		 // evento una vez que el DOM esté listo
		 document.addEventListener('DOMContentLoaded', function() {
		  // crear un editor de texto
		  const editor = new MediumEditor('.editable', {
		   toolbar: {
		    buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3', 'quote', 'pre', 'orderedlist', 'unorderedlist',
		     'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'removeFormat', 'preview', 'clear'
		    ],
		    static: false,
		    /* options which only apply when static is true */
		    align: 'center',
		    sticky: false,
		    updateOnEmptySelection: false
		    // forcePlainText: true,
		    // sticky: true,
		    // stickyTopOffset: 0,
		    // stickyBottomOffset: 0,
		    // stickyTarget: document.body,
		    // toolbarContainer: document.body,
		    // toolbarTarget: document.body,
		    // relativeContainer: document.body,
		    // diffLeft: 0,
		    // diffTop: 0,
		    // placeholder: '',
		    // hideOnClick: true,
		    // hideOnBlur: true,
		    // contentWindow: window,
		    // ownerDocument: document,
		    // targetCheckbox:
		    // 	'<input type="checkbox" class="medium-editor-toolbar-anchor-target" checked="">',
		   },
		  });

		  editor.subscribe('editableInput', function(event, editable) {
		   console.log(editable.innerHTML);
		   console.log(event, editable);
		  });

		 });


		 //  const editor = new MediumEditor('.editable', {
		 //   toolbar: {
		 //    /* These are the default options for the toolbar,
		 //       if nothing is passed this is what is used */
		 //    allowMultiParagraphSelection: true,
		 //    buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3', 'quote'],
		 //    diffLeft: 0,
		 //    diffTop: -10,
		 //    firstButtonClass: 'medium-editor-button-first',
		 //    lastButtonClass: 'medium-editor-button-last',
		 //    relativeContainer: null,
		 //    standardizeSelectionStart: false,
		 //    static: false,
		 //    /* options which only apply when static is true */
		 //    align: 'center',
		 //    sticky: false,
		 //    updateOnEmptySelection: false
		 //   },
		 //   placeholder: {
		 //    /* This example includes the default options for placeholder,
		 //       if nothing is passed this is what it used */
		 //    text: 'Ingrese una descripción de la vacante',
		 //    hideOnClick: true
		 //   },
		 //   keyboardCommands: {
		 //    /* This example includes the default options for keyboardCommands,
		 //       if nothing is passed this is what it used */
		 //    commands: [{
		 //      command: 'bold',
		 //      key: 'B',
		 //      meta: true,
		 //      shift: false,
		 //      alt: false
		 //     },
		 //     {
		 //      command: 'italic',
		 //      key: 'I',
		 //      meta: true,
		 //      shift: false,
		 //      alt: false
		 //     },
		 //     {
		 //      command: 'underline',
		 //      key: 'U',
		 //      meta: true,
		 //      shift: false,
		 //      alt: false
		 //     }
		 //    ],
		 //   }
		 //  });
		</script>
	</x-slot>

</x-app-layout>
