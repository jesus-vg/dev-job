<template>
	<div class="flex flex-col h-full">
		<label
			for="descripcion"
			class="block mb-2 text-sm font-medium text-gray-900"
			>Descripción de la vacante</label
		>
		<div
			class="editable p-3 rounded-md shadow-md outline-gray-800 md:flex-1 h-80 overflow-y-auto"
		></div>
		<input
			type="hidden"
			name="descripcion"
			id="descripcion"
			ref="descripcion"
		/>
	</div>
</template>

<script>
export default {
	props: {
		descripcion: {
			type: String,
			val: "",
		},
		// label: {
		// 	required: true,
		// 	type: String,
		// 	val: "",
		// },
	},
	mounted() {
		// evento una vez que el DOM esté listo
		document.addEventListener("DOMContentLoaded", () => {
			// crear un editor de texto
			const editor = new MediumEditor(".editable", {
				toolbar: {
					buttons: [
						"bold",
						"italic",
						"underline",
						"anchor",
						"h2",
						"h3",
						"quote",
						"pre",
						"orderedlist",
						"unorderedlist",
						"justifyLeft",
						"justifyCenter",
						"justifyRight",
						"justifyFull",
						"removeFormat",
						"preview",
						"clear",
					],
					static: false,
					align: "center",
					sticky: false,
					updateOnEmptySelection: false,
				},
				placeholder: {
					text: "Ingrese una descripción ...",
					hideOnClick: true,
				},
				keyboardCommands: {
					commands: [
						{
							command: "bold",
							key: "B",
							meta: true,
							shift: false,
							alt: false,
						},
						{
							command: "italic",
							key: "I",
							meta: true,
							shift: false,
							alt: false,
						},
						{
							command: "underline",
							key: "U",
							meta: true,
							shift: false,
							alt: false,
						},
					],
				},
			});

			editor.subscribe("editableInput", (event, editable) => {
				const html = editor.getContent(); // obtener el contenido del editor
				console.log(html);
				this.$refs.descripcion.value = html;
			});

			editor.setContent(this.descripcion); // poner el contenido del editor
			this.$refs.descripcion.value = this.descripcion;
		});
	},
};
</script>

<style></style>
