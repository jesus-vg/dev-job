<template>
	<ul class="flex flex-wrap justify-center">
		<li
			class="p-2 bg-gray-100 rounded-lg m-2 cursor-pointer"
			v-for="skill in skills"
			:key="skill.id"
			@click="selectSkill($event, skill)"
		>
			{{ skill }}
		</li>
	</ul>
	<input type="hidden" id="skills" name="skills" ref="skills" />
</template>

<script>
export default {
	props: {
		skills: {
			type: Array,
			required: true,
		},
	},
	data() {
		return {
			listaSkills: new Set(),
		};
	},
	methods: {
		/**
		 * Selecciona una skill.
		 * Aplica o quita la clase 'bg-gray-100' a la skill seleccionada.
		 * @param {Event} event
		 * @param {String} skill
		 */
		selectSkill(e, skill) {
			e.preventDefault();
			e.stopPropagation();
			const element = e.target.classList;

			if (element.contains("bg-gray-100")) {
				// Seleccionamos el skill
				element.remove("bg-gray-100");
				element.add("bg-gray-800");
				element.add("text-white");
			} else {
				// Deseleccionamos el skill
				element.add("bg-gray-100");
				element.remove("bg-gray-800");
				element.remove("text-white");
			}

			this.agregarQuitarSkills(!element.contains("bg-gray-100"), skill);
		},
		/**
		 * Agrega o quita una skill a la lista de skills.
		 * @param {Boolean} agregar
		 * @param {String} skill
		 * @returns {void}
		 */
		agregarQuitarSkills(agregar, skill) {
			if (agregar) {
				this.listaSkills.add(skill);
			} else {
				this.listaSkills.delete(skill);
			}
			// actualizamos el valor del input con la lista de skills seleccionadas
			this.$refs.skills.value = Array.from(this.listaSkills);
		},
	},
	mounted() {
		// console.log(this.skills);
	},
};
</script>
