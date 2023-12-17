<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="{{ asset('../assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
<!-- Tambahkan CSS Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<!-- Tambahkan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Tambahkan Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>document.documentElement.classList.add('js')</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"/>
<!-- Include Tailwind CSS styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"/>
<link rel="stylesheet" href="{{asset('../../assets/vendor/aos/dist/aos.css')}}">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('style.css')}}">
<title>Aplikasi Pelanggaran</title>
@vite('resources/css/app.css')
</head>

<body class="bg-blue-400 ">
	<div class="background flex">
		<div class="image-slideshow absolute inset-y-0 right-0">
		  	
			<div class="image fade">
				<img src="https://iili.io/HWdl3Al.md.jpg" alt="Mountain Top">
				</div>
				  
				<div class="image fade">
				<img src="https://iili.io/HWdlRDB.md.jpg" alt="Palm Trees">
				</div>
				  
				<div class="image fade">
				<img src="https://iili.io/HWdlWDN.md.jpg" alt="Neon Sign">
				</div>
			  </div>
		</div>
		<div class="trapezium absolute"></div>
	</div>
	<header>
		<div class="nav">
			<span>
				<img src="/foto/mata.png" class="w-24 h-14" alt="">
			</span>
			<ul class="links">
				<li><a class="hover:text-blu" href="">home</a></li>
				<li><a class="hover:text-blu" href ="">about us</a></li>
				<li><a class="hover:text-blu" href ="">contact</a></li>
				<li><a class="hover:text-blu" href ="">support</a></li>
			</ul>
			<a href="" class="btn-login ">Login</a>
			<div class="toggle-btn ">
				<i class="fas fa-solid fa-bars"></i>
			</div>
		</div>

		<div class="dropdown-menu">
			<li><a href="">home</a></li>
			<li><a href="">about us</a></li>
			<li><a href="">contact</a></li>
			<li><a href="">support</a></li>
			<li><a href="" class="btn-login">Login</a></li>
		</div>
	</header>
	<script>
		 const toggleBtn = document.querySelector('.toggle-btn');
    const toggleBtnIcon = document.querySelector('.toggle-btn i');
    const dropDownMenu = document.querySelector('.dropdown-menu');

    toggleBtn.onclick = function () {
        dropDownMenu.classList.toggle('open');
        const isOpen = dropDownMenu.classList.contains('open');

        toggleBtnIcon.className = isOpen
            ? 'fas fa-times'
            : 'fas fa-bars';
    };
	</script>
	<script>
	let index = 0;
displayImages();
function displayImages() {
  let i;
  const images = document.getElementsByClassName("image");
  for (i = 0; i < images.length; i++) {
    images[i].style.display = "none";
  }
  index++;
  if (index > images.length) {
    index = 1;
  }
  images[index-1].style.display = "block";
  setTimeout(displayImages, 2000); 
}
	</script>
	<script>

	</script>
</body>
</html>