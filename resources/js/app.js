require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// aqui importamos nuestras propias librerias
import { createApp } from "vue";

const app = createApp({
	/* root component options */
});

// aqui importamos nuestros componentes
app.component(
	"mediumn-editor",
	require("./components/MediumEditor.vue").default
);
// componete dropzonejs
app.component("dropzonejs", require("./components/Dropzonejs.vue").default);
app.component("lista-skills", require("./components/ListaSkills.vue").default);
app.component(
	"estado-vacante",
	require("./components/vacantes/estadoVacante.vue").default
);
app.component(
	"eliminar-vacante",
	require("./components/vacantes/eliminarVacante.vue").default
);
app.component("v-select", require("./components/vacantes/vSelect.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

app.mount("#app");
