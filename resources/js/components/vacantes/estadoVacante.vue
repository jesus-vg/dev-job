<template>
	<span
		class="cursor-pointer px-1 rounded-sm"
		:class="
			estadoVacante
				? 'bg-green-800/50 text-green-500'
				: 'bg-red-800/50 text-red-500'
		"
		@click="cambiarEstado()"
	>
		{{ estadoVacanteTexto }}
	</span>
</template>

<script>
export default {
	props: {
		slugVacante: {
			type: String,
			required: true,
		},
		estado: {
			type: Boolean,
			required: true,
		},
	},
	data: function () {
		return {
			estadoVacante: this.estado,
		};
	},
	methods: {
		/**
		 * Cambia el estado de la vacante mediante axios.
		 */
		cambiarEstado: function () {
			axios
				.post(`./vacantes/cambiar-estado/${this.slugVacante}`, {
					estado: !this.estadoVacante ? 1 : 0,
				})
				.then((response) => {
					console.log(response);
					this.estadoVacante = !this.estadoVacante;
				})
				.catch((error) => {
					console.log(error);
					this.estadoVacante = this.estado;
				});
		},
	},
	computed: {
		/**
		 * Devuelve el estado de la vacante en formato texto.
		 */
		estadoVacanteTexto: function () {
			return this.estadoVacante ? "Activo" : "Inactivo";
		},
	},
};
</script>
