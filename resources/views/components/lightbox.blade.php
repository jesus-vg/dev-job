@props(['imagenes' => []])
<div
	id="lightbox"
	class="fixed inset-0 z-10 hidden h-full w-full overflow-auto bg-gray-800/90 p-5"
>
	<span
		class="absolute top-0 right-0 m-4 cursor-pointer text-3xl text-white"
		onclick="closeModal()"
	>&times;</span>

	<div class="relative mx-auto mt-10 overflow-hidden rounded-lg bg-gray-500 sm:w-5/6 md:w-full xl:w-2/3">
		@foreach ($imagenes as $key => $urlImagen)
			<div class="absolute top-0 select-none rounded-br-lg bg-gray-300 px-2 py-1 text-sm text-gray-700">
				{{ $key + 1 }} / {{ $loop->count }}
			</div>
			<div class="mySlides aspect-w-16 aspect-h-9 hidden">
				<img
					src="{{ asset('storage/' . $urlImagen) }}"
					class="object-contain"
				>
			</div>
		@endforeach

		<a
			class="absolute top-1/2 z-20 -mt-12 w-auto cursor-pointer select-none rounded-r-lg bg-gray-300 p-4 text-xl font-medium text-gray-800 opacity-50 hover:bg-gray-800 hover:text-gray-100 hover:opacity-100"
			aria-readonly="prev"
			title="Anterior"
			onclick="plusSlides(-1)"
		>&#10094;</a>
		<a
			class="absolute top-1/2 right-0 z-20 -mt-12 w-auto cursor-pointer select-none rounded-l-lg bg-gray-300 p-4 text-xl font-medium text-gray-800 opacity-50 hover:bg-gray-800 hover:text-gray-100 hover:opacity-100"
			aria-readonly="next"
			title="Siguiente"
			onclick="plusSlides(1)"
		>&#10095;</a>
	</div>
	<div class="my-4 text-center">
		<p id="caption">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
	</div>
	<div class="my-4 flex flex-wrap justify-center">
		@foreach ($imagenes as $key => $urlImagen)
			<img
				src="{{ asset('storage/' . $urlImagen) }}"
				class="demo m-1 w-20 cursor-pointer rounded-lg opacity-100"
				onclick="currentSlide({{ $key + 1 }})"
				alt=""
			>
		@endforeach
	</div>
</div>
{{-- por si queremos usar lightbox2 agregar jquery al proyecto
	para mas detalles ver
	https://www.udemy.com/course/curso-laravel-crea-aplicaciones-y-sitios-web-con-php-y-mvc/learn/lecture/20329845#questions --}}
<script>
 // TODO: agregar aspecto de la imagen en las miniaturas, agregar funciones para cambiar imagen con las flechas del teclado
 const openModal = () => {
  document.getElementById("lightbox").style.display = "block";
  //   agregar esto para que no se pueda hacer scroll
  document.body.style.overflow = "hidden";
 };


 const closeModal = () => {
  document.getElementById("lightbox").style.display = "none";
  //   agregar esto para que se pueda hacer scroll
  document.body.style.overflow = "auto";
 };

 const plusSlides = (n) => {
  showSlides(slideIndex += n);
 }

 const currentSlide = (n) => {
  showSlides(slideIndex = n);
 }

 const showSlides = (n) => {
  const slides = document.getElementsByClassName("mySlides");
  const dots = document.getElementsByClassName("demo");
  const captionText = document.getElementById("caption");

  if (n > slides.length) {
   slideIndex = 1
  }

  if (n < 1) {
   slideIndex = slides.length
  }

  for (let i = 0; i < slides.length; i++) {
   slides[i].style.display = "none";
  }

  for (let i = 0; i < dots.length; i++) {
   dots[i].className = dots[i].className.replace(" opacity-100", " opacity-50");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " opacity-100";
  dots[slideIndex - 1].classList.remove("opacity-50");
  captionText.innerHTML = dots[slideIndex - 1].alt;
 }

 let slideIndex = 1;
 showSlides(slideIndex);
</script>
