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
    <script>document.documentElement.classList.add('js')</script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <!-- Include Tailwind CSS styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link rel="stylesheet" href="{{asset('../../assets/vendor/aos/dist/aos.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>Aplikasi Pelanggaran</title>
    @vite('resources/css/app.css')
</head>
<body class="">
    <nav class="fixed w-full p-4 top-0 mt-0 z-10 bg-white shadow md:flex md:items-center md:justify-between">
        <div class="flex justify-between items-center">
            <span class="text-2xl font-[Poppins]">
                MATA
            </span>
            <span class="text-3xl cursor-pointer md:hidden block" id="menuIcon">
                <ion-icon name="menu-outline"></ion-icon>
            </span>
        </div>
        <ul class="md:flex md:items-center z-[-10] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top[-400px] transition-all ease-in duration-500 justify-center" id="menuList">
            <li class="mx-4 my-6 md:my-0">
                <a href="#" class="text-xl hover:text-blue-500 duration-300">HOME</a>
            </li>
            <li class="mx-4 my-6 md:my-0">
                <a href="#" class="text-xl hover:text-blue-300 duration-300">TENTANG KAMI</a>
            </li>
            <li class="mx-4 my-6 md:my-0">
                <a href="#" class="text-xl hover:text-blue-500 duration-300">DEMO</a>
            </li>
            <li class="mx-4 my-6 md:my-0 mr-[300px]">
                <a href="#" class="text-xl hover:text-blue-500 duration-300">SUPPORT</a>
            </li>
    
            <button class="bg-blue-300 text-white duration-300 px-6 py-2 mx-4 hover:bg-blue-500 rounded">
                Login
            </button>
        </ul>
    </nav>
    <div class="hero mt-24 mx-auto px-5 lg:flex">
      <!-- Tampilan PC -->
      <div class="hidden lg:flex lg:items-center lg:w-1/2">
        <div class="hero-title lg:ml-10 lg:mr-20">
          <h1 class="text-3xl text-left mt-5 lg:w-96 delay-[300ms] duration-[600ms] taos:translate-x-[200px] taos:opacity-0 " data-taos-offset="400">APLIKASI PENCATATAN PELANGGARAN SISWA</h1>
          <p class="text-md text-justify mt-4 w-96">Aplikasi ini dibuat untuk membantu guru piket dan petugas osis untuk mencatat dan memberi point kepada para siswa yang melanggar, agar catatan tersebut tersimpan ke dalam data dan tidak hilang</p>
          <div class="mt-9">
            <a class="py-2 px-5 border-2 border-blue-300 rounded-sm hover:bg-blue-300 hover:text-white ease-in-out duration-300" href="">Demo Aplikasi <i class="fas fa-play-circle"></i></a>
          </div>
        </div>
        <div class="hero-image">
          <img src="{{asset('/foto/Rectangle 5.png')}}" alt="" class="rounded-lg w-full">
        </div>
      </div>
    
      <!-- Tampilan Mobile -->
      <div class="lg:hidden">
        <div class="hero-image mb-5">
          <img src="{{asset('/foto/Rectangle 5.png')}}" alt="" class="rounded-lg">
        </div>
        <div class="hero-title">
          <h1 class="text-3xl text-left mt-5">APLIKASI PENCATATAN PELANGGARAN SISWA</h1>
          <p class="text-md text-justify mt-4">Aplikasi ini dibuat untuk membantu guru piket dan petugas osis untuk mencatat dan memberi point kepada para siswa yang melanggar, agar catatan tersebut tersimpan ke dalam data dan tidak hilang</p>
          <div class="mt-3">
            <a class="block py-2 px-5 border-2 border-blue-300 rounded-sm hover:bg-blue-300 hover:text-white ease-in-out duration-300 text-center" href="">Demo Aplikasi <i class="fas fa-play-circle"></i></a>
          </div>
        </div>
      </div>
    </div>
    
        <div class="card mt-24">
        <div class="mx-24 hidden sm:block">
          <button class="prev-btn bg-blue-500 text-white px-4 py-2 rounded" id="prevBtn">Sebelumnya</button>
          <button class="next-btn bg-blue-500 text-white px-4 py-2 rounded ml-2" id="nextBtn">Berikutnya</button>
        </div>
        <div class="owl-carousel owl-theme p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
            <!--Card 1-->
            <div class="item rounded overflow-hidden shadow-lg bg-red-300 lg:bg-green-300">
              <img class="w-full" src="{{asset('/foto/Rectangle 5.png')}}" alt="Mountain">
              <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Mountain</div>
                <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
              </div>
              <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
              </div>
            </div>
            <!--Card 2-->
            <div class="item rounded overflow-hidden shadow-lg bg-red-300 lg:bg-green-300">
              <img class="w-full" src="{{asset('/foto/Rectangle 5.png')}}" alt="River">
              <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">River</div>
                <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
              </div>
              <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#summer</span>
              </div>
            </div>
            <!--Card 3-->
            <div class="item rounded overflow-hidden shadow-lg bg-red-300 lg:bg-green-300">
              <img class="w-full" src="{{asset('/foto/Rectangle 5.png')}}" alt="Forest">
              <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Forest</div>
                <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
              </div>
              <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#fall</span>
              </div>
            </div>
          </div>
        </div>    
      </div>
      {{-- for mobile --}}
      <div class="cards">
        <h1>Pembuat Aplikasi</h1>
      </div>
      <div class="name-tag lg:hidden">
        <div class="jusify-center align-center ml-14">
        <div class="flex gap-x-6 mt-6">
        <div class="tag">
            <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="text-center">
            <h1>Aldy</h1>
            <p>masak</p>
          </div>
        </div>
        <div class="tag">
          <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="text-center">
            <h1>Aldy</h1>
            <p>masak</p>
          </div>
        </div>
      </div>
        <div class="flex gap-x-6 mt-6">
        <div class="tag">
          <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
          <div class="text-center">
          <h1>Aldy</h1>
          <p>masak</p>
        </div>
        </div>
        <div class="tag">
          <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="text-center">
            <h1>Aldy</h1>
            <p>masak</p>
          </div>
        </div>
      </div>
        <div class="flex gap-x-6 mt-6">
        <div class="tag">
          <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
          <div class="text-center">
          <h1>Aldy</h1>
          <p>masak</p>
        </div>
        </div>
        <div class="tag">
          <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="text-center">
            <h1>Aldy</h1>
            <p>masak</p>
          </div>
        </div>
      </div>
    </div>
      </div> 
      <div class="card-name justify-center lg:bg-blue-300 h-60">
      <div class="name-tag hidden lg:flex justify-center align-center gap-x-1.5">
        <div class="grid grid-cols-2 lg:grid-cols-6 gap-4">
          <div class="tag mx-9 my-9">
            <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="justify-center text-center">
              <h1 class="text-xl">Aldy</h1>
              <p>Analyst</p>
              <a href="#">@aldyaditiah</a>
            </div>
          </div>
          <div class="tag mx-9 my-9">
            <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="justify-center align-center text-center">
            <h1 class="text-xl">Huseng</h1>
            <p>Bekend</p>
            <a href="#">@maulhusen_</a>
          </div>
          </div>
          <div class="tag mx-9 my-9">
            <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="justify-center text-center">
            <h1 class="text-xl">Adun</h1>
            <p>beken</p>
            <a href="https://instagram.com/ghvvari?igshid=OGQ5ZDc2ODk2ZA==">@ghvvari</a>
            </div>
          </div>
          <div class="tag mx-9 my-9">
            <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="justify-center text-center">
            <h1 class="text-xl">Yasel</h1>
            <p>frontend</p>
            <a href="#">@yasel_disini</a>
            </div>
          </div>
          <div class="tag mx-9 my-9">
            <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="justify-center text-center">
            <h1 class="text-xl">Bintang</h1>
            <p>Frontend</p>
            <a href="#">@sstarrr4_</a>
            </div>
          </div>
          <div class="tag mx-9 my-9">
            <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-24 h-24">
            <div class="justify-center text-center">
            <h1 class="text-xl ">Rafli</h1>
            <p>bekend</p>
            <a href="https://instagram.com/raflisodri67?igshid=OGQ5ZDc2ODk2ZA==">@raflisodri67</a>
          </div>
        </div>
      </div>
    </div>
    <script>
        $(document).on('ready', function () {
          // initialization of aos
          AOS.init({
            duration: 650,
            once: true
          });
        });
      </script>
    <script src="{{asset('../../assets/vendor/aos/dist/aos.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Sintak JavaScript untuk menangani klik pada ikon menu
        var isMenuVisible = falseKakak;
        document.getElementById('menuIcon').addEventListener('click', function () {
            var menuList = document.getElementById('menuList');
            isMenuVisible = !isMenuVisible; // Toggle nilai variabel
            menuList.style.opacity = isMenuVisible ? '1' : '0';
            menuList.style.top = isMenuVisible ? '60px' : '-400px';
        });
    </script>
     <script src="{{asset('/app.js')}}"></script>
     <script>
     $(document).ready(function () {
    $(".owl-carousel").owlCarousel({
      items: 1,
      loop: true,
      margin: 10,
      nav: false,
      dots: true,
      responsive: {
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });
  });
    </script>
    <script>
      $(document).ready(function () {
        var owl = $(".owl-carousel");
    
        owl.owlCarousel({
          items: 1,
          loop: true,
          margin: 10,
          nav: true,
          dots: false,
          responsive: {
            600: {
              items: 2
            },
            1000: {
              items: 3
            }
          }
        });
    
        // Button click events
        $("#prevBtn").click(function () {
          owl.trigger("prev.owl.carousel");
        });
    
        $("#nextBtn").click(function () {
          owl.trigger("next.owl.carousel");
        });
      });
    </script>
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
</body>
</html>