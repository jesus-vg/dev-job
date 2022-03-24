const defaultTheme = require("tailwindcss/defaultTheme");

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
	],
};
