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
	<input type="hidden" name="imagen" ref="imgVacante" />
</template>

<script>
import axios from "axios";

export default {
	props: {
		imagenesTemporales: {
			type: String,
			default: [],
		},
	},
	data() {
		return {
			imagenes: JSON.parse(this.imagenesTemporales),
			myDropzone: null,
		};
	},
	mounted() {
		// 'http://curso.test/dev-job/vacantes/crear#F51'
		const url = window.location.href.split("vacantes")[0] + "storage/";

		// evento una vez que el DOM esté listo
		document.addEventListener("DOMContentLoaded", () => {
			// configurar el dropzone, doc https://www.dropzone.dev/js/
			this.myDropzone = new Dropzone("#dropzonejs", {
				url: "./imagen-upload",
				headers: {
					"X-CSRF-TOKEN": document
						.querySelector('meta[name="csrf-token"]')
						.getAttribute("content"),
				},
				acceptedFiles: "image/*",
				addRemoveLinks: true,
				dictInvalidFileType: "Solo se aceptan imagenes",
				maxFiles: 5,
				uploadMultiple: false, // solo una imagen
				paramName: "imagen",
				dictDefaultMessage: "Arrastra las imagenes aqui o haz click",
				dictFallbackMessage:
					"Tu navegador no soporta la funcionalidad de arrastrar y soltar",
				dictFallbackText:
					" Usa el formulario de abajo para subir archivos como en los viejos tiempos.",
				dictFileTooBig: "Archivo demasiado grande",
				dictInvalidFileType: "No se aceptan archivos de este tipo",
				dictResponseError: "Server responded with  code.",
				dictCancelUpload: "Cancelar subida",
				dictUploadCanceled: "Subida canceleda",
				dictCancelUploadConfirmation:
					"¿Estas seguro que deseas cancelar la subida?",
				dictRemoveFile: "Borrar",
				dictMaxFilesExceeded: "No se pueden subir mas archivos",
			});

			this.myDropzone.on("addedfile", (file) => {
				// si se excede el numero de archivos permitidos eliminamos el archivo que se acaba de agregar
				if (
					this.myDropzone.files.length >
					this.myDropzone.options.maxFiles - 1
				) {
					this.myDropzone.removeFile(file);
				}
			});

			this.myDropzone.on("removedfile", (file) => {
				// si existe la propiedad nameServer entonces es una imagen que ya se guardo en el servidor,
				// se debe eliminar del directorio
				if (file.nameServer) {
					const params = {
						imagen: file.nameServer,
					};

					axios
						.post("./imagen-delete", params)
						.then((res) => {
							// eliminar la imagen del array de imagenes
							this.imagenes = this.imagenes.filter(
								(imagen) => imagen !== file.nameServer
							);

							// bug de dropzonejs que no muestra el mensaje default "Arrastra las imagenes aqui o haz click"
							if (this.imagenes.length === 0) {
								// si no hay imagenes se muestra el mensaje default
								document
									.getElementById("dropzonejs")
									.classList.remove("dz-started");
							}
						})
						.catch((err) => {
							console.log(err);
						});
				}

				// quitamos el mensaje de error si ya no hay archivos
				if (this.myDropzone.files.length === 0) {
					document.getElementById("file-no-valid").innerHTML = "";
				}
			});

			this.myDropzone.on("success", (file, response) => {
				document.getElementById("file-no-valid").innerHTML = "";

				// agregamos al objeto file el nombre de la imagen que le asignamos en el servidor
				file.nameServer = response.path_temp;

				this.imagenes.push(response.path_temp);
			});

			this.myDropzone.on("error", function (file, response) {
				document.getElementById("file-no-valid").innerHTML =
					response.errors?.imagen.join("<br>") ?? response;

				// quitamos el archivo de la lista de archivos
				this.myDropzone.removeFile(file);
			});

			// doc para agregar archivos existentes desde el servidor
			// https://github.com/dropzone/dropzone/pull/2003/files/628d30907d674871f49cf2ce822db90d07997a82
			this.imagenes.forEach((imagen, i) => {
				// imagen = temp/1/vacantes/imagenes/0u5UH9NOTfr99z5kbW9ivcqgsGtQ6C0lxnPWN0KP.jpg
				const nombreImagen = imagen.split("/")[4];

				let mockFile = {
					name: nombreImagen,
					size: 12345,
					nameServer: imagen,
					accepted: true,
					status: "success",
				};

				this.myDropzone.displayExistingFile(mockFile, url + imagen); // agregamos al preview
				this.myDropzone.files.push(mockFile); // agregamos el archivo a la lista de archivos
				this.myDropzone._updateMaxFilesReachedClass();
			});

			const form = document.querySelector(".form-vacante");

			// prevenimos el envio del formulario para antes agregar los archivos al input imgVacante
			form.addEventListener("submit", (e) => {
				e.preventDefault();

				const inputImg = this.$refs.imgVacante;

				if (inputImg) {
					inputImg.value = JSON.stringify(this.imagenes);
					form.submit();
				}
			});
		});
	},
};
</script>
