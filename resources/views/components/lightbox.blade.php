@props(['imagenes' => []])
<div
	id="lightbox"
	class="fixed inset-0 z-10 hidden h-full w-full overflow-auto bg-gray-800/80 p-5"
>
	<span
		class="absolute top-0 right-0 m-4 cursor-pointer text-3xl text-white"
		onclick="closeModal()"
	>&times;</span>

	<div class="relative mx-auto mt-10 w-11/12 overflow-hidden rounded-lg bg-gray-500 sm:w-5/6 md:w-1/2 lg:w-1/3">
		@foreach ($imagenes as $key => $urlImagen)
			<div class="mySlides hidden">
				<div class="absolute top-0 select-none rounded-br-lg bg-gray-300 px-2 py-1 text-sm text-gray-700">
					{{ $key + 1 }} / {{ $loop->count }}
				</div>
				<img
					src="{{ asset('storage/' . $urlImagen) }}"
					style="w-full"
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
				class="demo w-20 cursor-pointer rounded-lg"
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
 const openModal = () => {
  document.getElementById("lightbox").style.display = "block";
 }

 const closeModal = () => {
  document.getElementById("lightbox").style.display = "none";
 }

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
   dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  captionText.innerHTML = dots[slideIndex - 1].alt;
 }

 let slideIndex = 1;
 showSlides(slideIndex);

 const modal = document.getElementById("lightbox");
 //  evento para hacer scroll en el modal
 modal.addEventListener("wheel", (e) => {
  e.preventDefault();
  if (e.deltaY < 0) {
   plusSlides(1);
  } else {
   plusSlides(-1);
  }
 }, {
  passive: false
 });
 //  evento para hacer scroll en el modal en movil
 modal.addEventListener("touchmove", (e) => {
  e.preventDefault();
  if (e.deltaY < 0) {
   plusSlides(1);
  } else {
   plusSlides(-1);
  }
 }, {
  passive: false
 });
</script>
