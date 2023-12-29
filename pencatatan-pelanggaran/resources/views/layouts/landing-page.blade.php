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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Tambahkan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Tambahkan Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>document.documentElement.classList.add('js')</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"/>
<!-- Include Tailwind CSS styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"/>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="{{asset('style.css')}}">
<title>Aplikasi Pelanggaran</title>
@vite('resources/css/app.css')
</head>

<body class="bg-abu ">
	<div class="background flex">
		<div class="image-slideshow absolute inset-y-0 right-0">
			<div class="image fade">
				<img src="/foto/f1.JPG" class="fotos" alt="Mountain Top">
				</div>
				  
				<div class="image fade">
				<img src="/foto/f2.JPG" class="fotos" alt="Palm Trees">
				</div>
				  
				<div class="image fade">
				<img src="/foto/f3.JPG" class="fotos" alt="Neon Sign">
				</div>
				<div class="image fade">
				<img src="/foto/f4.JPG" class="fotos" alt="Neon Sign">
				</div>
		</div>
		<div class="photo">
			<img src="/foto/lapp.png" alt="" class="jos">
		</div>
		<div class="trapezium absolute"></div>
	</div>
	<header>
		<div class="nav">
			<span>
				<img id=navbarImage src="/foto/mataw.png" class="sm:w-30 h-28" alt="">
			</span>
			<ul class="links">
				<li><a href="#">Home</a></li>
				<li><a href ="#card-profile">About us</a></li>
				<li><a href ="#support">Support</a></li>
				<li><a href ="#contact">Contact</a></li>
			</ul>
			<a href="" class="btn-login ">Login</a>
			<div class="toggle-btn ">
				<i class="fas fa-solid fa-bars"></i>
			</div>
		</div>

		<div class="dropdown-menu">
			<li><a href="#">Home</a></li>
			<li><a href="#card-profile">About us</a></li>
			<li><a href="#support">Support</a></li>
			<li><a href="#contact">Contact</a></li>
			<li><a href="" class="btn-login">Login</a></li>
		</div>
	</header>
	<div class="hero" data-aos="fade-right">
		<div class="hero-body">
			<h1>APLIKASI PELANGGARAN SISWA</h1>
			<p>aplikasi ini dibuat untuk memudahkan petugas atau guru piket mencatat siswa yang melanggar</p>
			<a href="#" class="full-width-button"><i class="fas fa-solid fa-play"></i> Lihat Video</a>
		</div>
	</div>
	
    <div class="w3-content" data-aos="fade-up">
		<div class="w3-section nav-buttons">
            <button data-aos="fade-right" class="w3-button r" onclick="plusDivs(-1)"><i class="fas fa-solid fa-chevron-left" ></i></button>
            <button data-aos="fade-left" class="w3-button l" onclick="plusDivs(1)"><i class="fas fa-solid fa-chevron-right"></i></button>
        </div>
		<div class="w3-container ">
			<h2>Tampilan Halaman</h2>
		</div>
		<div class="image-container">
			<img class="mySlides" src="/foto/bk-hanya-bisa-melihat-data.png" onclick="openModal('/foto/bk-hanya-bisa-melihat-data.png','blablabalbalbaablal')">
			<div class="detail-text">Klik untuk lebih lengkap</div>
		</div>
		<div class="image-container">
			<img class="mySlides" src="/foto/dashboard-bk-versi-2.png" onclick="openModal('/foto/dashboard-bk-versi-2.png','lorem')">
			<div class="detail-text">Klik untuk lebih lengkap</div>
			
		</div>
		<div class="image-container">
			<img class="mySlides" src="/foto/dashboard-bk.png" onclick="openModal('/foto/dashboard-bk.png','blablabalbalbaablal')">
			<div class="detail-text">Klik untuk lebih lengkap</div>
			
		</div>
		<div class="image-container">
			<img class="mySlides" src="/foto/dashboard-petugas.png" onclick="openModal('/foto/dashboard-petugas.png','blablabalbalbaablal')">
			<div class="detail-text">Klik untuk lebih lengkap</div>
			
		</div>
		<div class="image-container">
			<img class="mySlides" src="/foto/inbox-bk.png" onclick="openModal('/foto/inbox-bk.png','blablabalbalbaablal')">
			<div class="detail-text">Klik untuk lebih lengkap</div>
			
		</div>
		<div class="image-container">
			<img class="mySlides" src="/foto/login.png" onclick="openModal('/foto/login.png','blablabalbalbaablal')">
			<div class="detail-text">Klik untuk lebih lengkap</div>
			
		</div>
		<div class="image-container">
			<img class="mySlides" src="/foto/memproses-laporan.png" onclick="openModal('/foto/memproses-laporan.png','blablabalbalbaablal')">
			<div class="detail-text">Klik untuk lebih lengkap</div>
		
		</div>
		<br>
		<div class="dot-navigation">
			<div class="dots">
			<span class="dot" onclick="currentDiv(1)"></span>
			<span class="dot" onclick="currentDiv(2)"></span>
			<span class="dot" onclick="currentDiv(3)"></span>
			<span class="dot" onclick="currentDiv(4)"></span>
			<span class="dot" onclick="currentDiv(5)"></span>
			<span class="dot" onclick="currentDiv(6)"></span>
			<span class="dot" onclick="currentDiv()"></span>
			<!-- Add more dots as needed -->
		</div>
		</div>
	</div>
	<!-- The Modal -->
    <div id="myModal" class="modal">
		<span class="close" onclick="closeModal()">&times;</span>
		<img class="modal-content" id="modalImg">
		<div class="modal-description" id="modalDescription"></div>
		<div class="detail-text" id="modalDetailText"></div>
	</div>
	<div class="card-profile" id="card-profile">
		<div class="tittle-profiles">
			<h2>Core Team MATA Group</h2>
		</div>
		<div class="card-profile-content"  data-aos="zoom-in">
			<div class="row">
				<div class="image-card-profile">
					<img src="/foto/foto-non-color/5.png" data-src="/foto/foto-color/5.png" alt="">
					<div class="tittle-profile">
						<h2>Maulana</h2>
						<p>Backend</p>
					</div>
				</div>
				<div class="image-card-profile">
					<img src="/foto/foto-non-color/6.png" data-src="/foto/foto-color/6.png" alt="">
					<div class="tittle-profile">
						<h2>Ghifari</h2>
						<p>Backend</p>
					</div>
				</div>
				<div class="image-card-profile">
					<img src="/foto/foto-non-color/3.png" data-src="/foto/foto-color/3.png" alt="">
					<div class="tittle-profile">
						<h2>Rafli</h2>
						<p>Analyst</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="image-card-profile">
					<img src="/foto/foto-non-color/4.png" data-src="/foto/foto-color/4.png" alt="">
					<div class="tittle-profile">
						<h2>Bintang</h2>
						<p>Frontend</p>
					</div>
				</div>
				<div class="image-card-profile">
					<img src="/foto/foto-non-color/1.png" data-src="/foto/foto-color/1.png" alt="">
					<div class="tittle-profile">
						<h2>Yasel</h2>
						<p>Dokumentation</p>
					</div>
				</div>
			</div>
		</div>
		<div class="tittle-cards">
			<h2>Our Leader</h2>
		</div>
		<div class="card-profile-content">
			<div class="row">
				<div class="image-card-profile"  data-aos="zoom-in">
					<img src="/foto/foto-non-color/2.png" data-src="/foto/foto-color/2.png" alt="">
					<div class="tittle-profile">
						<h2>Aldy</h2>
						<p>Project Manager</p>
					</div>
				</div>
			</div>
	</div>
	<div class="support" id="support">
		<div class="support-content">
			<h1>Thank's To</h1>
			<div class="support-image">
				<img data-aos="flip-left" src="/foto/marhas.png" alt="" id="marhas">
				<img data-aos="flip-right" src="/foto/osis.png" alt="" id="osis">
			</div>
		</div>
	</div>
	<footer class="fo" id="contact">
	<div class="footer-content">
			<div class="footer-image">
				<img src="/foto/mataw1.png" alt="">
				<p>MATA adalah sebuah nama group yang beranggotakan 6 orang yang ditugaskan membuat sebuah aplikasi untuk sekolah</p>
			</div>
			<div class="footer-social">
				<div class="mata-footer">
					<p>Contact us</p>
					<a href=""><i class="fa fa-envelope"></i>   mata.projectan101@proton.me</a>
				</div>
				<div class="owner-footer">
					<p>Social Media</p>
					<a class="text-left pointer" href=""><i class="fa fa-instagram"></i>  Aldy</a>
					<a class="text-left pointer" href=""><i class="fa fa-instagram"></i>  Maulana</a>
					<a class="text-left pointer" href=""><i class="fa fa-instagram"></i>  Rafly</a>
					<a class="text-left pointer" href=""><i class="fa fa-instagram"></i>  Ghifari</a>
					<a class="text-left pointer" href=""><i class="fa fa-instagram"></i>  Yasel</a>
					<a class="text-left pointer" href=""><i class="fa fa-instagram"></i>  Bintang</a>
				</div>
			</div>
		</div>
	</footer>
	<div class="footer">
		<p>@2023, made with love by MATA</p>
	</div>

	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
	  AOS.init();
	</script>
</body>
<script>
	document.addEventListener("DOMContentLoaded", function () {
    var imageProfiles = document.querySelectorAll(".image-card-profile img");

    imageProfiles.forEach(function (img) {
        var originalSrc = img.src;
        var newSrc = img.getAttribute("data-src");

        img.addEventListener("mouseover", function () {
            img.src = newSrc;
        });

        img.addEventListener("mouseout", function () {
            img.src = originalSrc;
        });
    });
});

</script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
    var navbarImage = document.getElementById("navbarImage");

    window.addEventListener("scroll", function() {
        // Ganti gambar saat Anda scroll ke bawah (sesuaikan dengan nilai scroll yang diinginkan)
        if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
            navbarImage.src = "/foto/mata.png"; // Ganti dengan path gambar yang baru
        } else {
            navbarImage.src = "/foto/mataw.png"; // Ganti dengan path gambar yang asli
        }
    });
});

</script>
<script>
	document.addEventListener('scroll', () => {
		const header = document.querySelector('header');

		if(window.scrollY > 0 ){
			header.classList.add('scrolled');
		}else{
			header.classList.remove('scrolled');
		}
	})
</script>
    <script>
     var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function currentDiv(n) {
    showDivs(slideIndex = n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");

    if (n > x.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = x.length; }

    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    x[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}


    // Modal Image Script
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("modalImg");
    var modalDescription = document.getElementById("modalDescription");
    var modalDetailText = document.getElementById("modalDetailText");

    function openModal(imgSrc, description, detailText) {
        modalImg.src = imgSrc;
        modalDescription.innerHTML = description;
        modalDetailText.innerHTML = detailText;
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }
		
    </script>

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
  images[index-1].classList.add("zoom-in-out");
  
  setTimeout(() => {
    images[index-1].classList.remove("zoom-in-out");
    displayImages();
  }, 3000);
}

</script>
</html>