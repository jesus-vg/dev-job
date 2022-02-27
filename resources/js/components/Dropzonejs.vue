<template>
	<label
		class="block mb-2 text-sm font-medium text-gray-900 mt-4"
		for="dropzonejs"
	>
		Imagen de la vancate
	</label>
	<div
		id="dropzonejs"
		class="dropzone rounded-lg bg-gray-100 border border-dashed border-gray-800 max-w-md mx-auto py-3 mb-4"
	></div>
	<div class="mb-4 text-red-500" id="file-no-valid"></div>
	<input type="hidden" id="imgVacante" name="imgVacante" name-img="" />
</template>

<script>
export default {
	data() {
		return {
			img: "",
		};
	},
	mounted() {
		// evento una vez que el DOM esté listo
		document.addEventListener("DOMContentLoaded", () => {
			// crear un editor de texto
			const myDropzone = new Dropzone("#dropzonejs", {
				url: "./imagen-upload",
				headers: {
					"X-CSRF-TOKEN": document
						.querySelector('meta[name="csrf-token"]')
						.getAttribute("content"),
				},
				dictDefaultMessage: "Arrastra las imagenes aqui o haz click",
				acceptedFiles: "image/*",
				addRemoveLinks: true,
				dictRemoveFile: "Eliminar",
				maxFiles: 1,
				uploadMultiple: false, // solo una imagen
				// maxFilesize: 2, // 2 MB
			});
			myDropzone.on("maxfilesexceeded", function (file) {
				// console.log("maxfilesexceeded");
				if (myDropzone.files[1] != null) {
					myDropzone.removeFile(myDropzone.files[0]);
				}
			});
			myDropzone.on("removedfile", function (file) {
				// console.log("removedfile");
				const imgOld = document
					.getElementById("imgVacante")
					.getAttribute("name-img");

				if (file.name == imgOld) {
					document.getElementById("imgVacante").value = "";
					document
						.getElementById("imgVacante")
						.setAttribute("name-img", "");
				}
			});
			myDropzone.on("success", function (file, response) {
				// console.log("success");
				document.getElementById("imgVacante").value = file.dataURL;
				document
					.getElementById("imgVacante")
					.setAttribute("name-img", file.name);

				document.getElementById("file-no-valid").innerHTML = "";
				// console.log(myDropzone);

				// removeItemsPreview();
			});
			myDropzone.on("error", function (file, response) {
				console.log(response);
				document.getElementById("file-no-valid").innerHTML =
					"Archivo no valido";
			});
			myDropzone.on("addedfile", function (file) {
				console.log("addedfile");
				if (myDropzone.files[1] != null) {
					myDropzone.removeFile(myDropzone.files[0]);
				}
			});
		});
	},
	methods: {
		removeItemsPreview() {
			const myDropzone = new Dropzone("#dropzonejs");
			myDropzone.files.forEach((file) => {
				if (file.previewElement != null) {
					file.previewElement.remove();
				}
			});
		},
	},
};
</script>

<style></style>
