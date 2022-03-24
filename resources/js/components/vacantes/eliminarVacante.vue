<template>
	<button
		class="px-1 text-red-500 hover:underline"
		:class="cargando ? 'cursor-not-allowed' : 'cursor-pointer'"
		@click="eliminarVacante()"
	>
		Eliminar
	</button>
</template>

<script>
export default {
	props: {
		slug: {
			type: String,
			required: true,
		},
		titulo: {
			type: String,
			required: true,
		},
	},
	methods: {
		/**
		 * Elimina la vacante mediante axios, con mensaje de confirmacion con sweetalert2.
		 */
		eliminarVacante: function () {
			Swal.fire({
				title: "¿Estás seguro?",
				html: `¿Seguro que deseas eliminar la vacante <strong>"${this.titulo}"</strong>?
				<br><small>Una vez eliminada no se podrá recuperar</small>`,
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Si, eliminar la vacante",
				buttonsStyling: false,
				customClass: {
					confirmButton: "btn-primary",
					cancelButton: "btn-secondary ml-3",
				},
				iconColor: "#14b8a6",
			}).then((result) => {
				if (result.isConfirmed) {
					this.cargando = true;
					axios
						.delete(`./vacantes/${this.slug}`)
						.then((response) => {
							// console.log(response);
							Swal.fire({
								title: "¡Eliminado!",
								text: "La vacante ha sido eliminada.",
								icon: "success",
								buttonsStyling: false,
								customClass: {
									confirmButton: "btn-primary",
								},
							});
							this.$emit("eliminado");
						})
						.catch((error) => {
							// console.log(error);
							Swal.fire(
								"¡Error!",
								"La vacante no ha podido ser eliminada.",
								"error"
							);
						});
				}
			});
		},
	},
};
</script>
