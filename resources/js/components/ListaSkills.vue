<template>
	<ul class="flex flex-wrap justify-center">
		<li
			class="p-2 bg-gray-100 rounded-lg m-2"
			v-for="skill in skills"
			:key="skill.id"
		>
			{{ skill }}
		</li>
	</ul>
</template>

<script>
export default {
	props: {
		skills: {
			type: Array,
			required: true,
		},
	},
	mounted() {
		// console.log(this.skills);
	},
};
</script>
