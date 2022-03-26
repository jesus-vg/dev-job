const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");

module.exports = {
	content: [
		"./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
		"./storage/framework/views/*.php",
		"./resources/views/**/*.blade.php",
		"./resources/js/components/**/*.vue",
	],

	theme: {
		extend: {
			fontFamily: {
				sans: ["Nunito", ...defaultTheme.fontFamily.sans],
			},
		},
	},

	plugins: [
		require("@tailwindcss/forms"),
		// https://github.com/tailwindlabs/tailwindcss-aspect-ratio
		require("@tailwindcss/aspect-ratio"),
		// https://tailwindcss.com/docs/plugins#adding-components
		plugin(function ({ addComponents, theme }) {
			addComponents({
				".scroll-custom": {
					/* width */
					"&::-webkit-scrollbar": {
						width: "4px",
					},
					/* Track */
					"&::-webkit-scrollbar-track": {
						// boxShadow: "inset 0 0 5px grey",
						// bg-gray-700/30
						backgroundColor:
							"rgb(229 231 235 / var(--tw-bg-opacity))",
						borderRadius: ".25rem",
					},
					/* Handle */
					"&::-webkit-scrollbar-thumb": {
						// bg-gray-500
						backgroundColor: "#6b7280",
						borderRadius: ".25rem",
					},
					/* Handle on hover */
					"&::-webkit-scrollbar-thumb:hover": {
						// bg-gray-700/80
						backgroundColor: "rgb(55 65 81 / 0.8)",
					},
				},
			});
		}),
	],
};
