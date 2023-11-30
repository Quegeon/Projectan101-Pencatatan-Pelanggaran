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
    <div class="hero mx-auto px-5 py-24 lg:flex bg-sky-900">
      <!-- Tampilan PC -->
      <div class="hidden lg:flex lg:items-center lg:w-1/2">
        <div class="hero-title lg:ml-10 lg:mr-20">
          <h1 class="text-3xl text-left mt-5 lg:w-96 delay-[300ms] duration-[600ms] taos:translate-x-[200px] taos:opacity-0 " data-taos-offset="400">APLIKASI PENCATATAN PELANGGARAN SISWA</h1>
          <p class="text-md text-justify mt-4 w-96 delay-[300ms] duration-[600ms] taos:translate-y-[200px] taos:opacity-0" data-taos-offset="300"">Aplikasi ini dibuat untuk membantu guru piket dan petugas osis untuk mencatat dan memberi point kepada para siswa yang melanggar, agar catatan tersebut tersimpan ke dalam data dan tidak hilang</p>
          <div class="mt-9">
            <a class="py-2 px-5 border-2 border-blue-300 rounded-sm hover:bg-blue-300 hover:text-white ease-in-out duration-300" href="">Demo Aplikasi <i class="fas fa-play-circle"></i></a>
          </div>
        </div>
      </div>
      <div class="hero-image w-full">
        <img src="{{asset('/foto/Rectangle 5.png')}}" alt="" class="rounded-lg w-96 delay-[300ms] duration-[600ms] taos:translate-x-[200px] taos:opacity-0 " data-taos-offset="400"">
      </div>
      <div class="hero-image w-full rounded-full z-[-1]">
        <img src="{{asset('/foto/g.jpg')}}" alt="" class="rounded-full w-96 delay-[300ms] duration-[600ms] taos:translate-x-[200px] taos:opacity-0 " data-taos-offset="400"">
      </div>
      <!-- Tampilan Mobile -->
      <div class="lg:hidden">
        <div class="hero-image mb-5 delay-[300ms]">
          <img src="{{asset('/foto/Rectangle 5.png')}}" alt="" class="rounded-lg duration-[600ms] taos:translate-x-[200px] taos:opacity-0" data-taos-offset="400">
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
        <div class="ml-10 hidden sm:block">
          <button class="prev-btn bg-blue-500 text-white px-4 py-2 rounded" id="prevBtn"><</button>
          <button class="next-btn bg-blue-500 text-white px-4 py-2 rounded ml-2" id="nextBtn">></button>
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
        <h1 class="text-4xl ml-10">Perancang Aplikasi</h1>
      </div>
      <div class="name-tag lg:hidden">
        <div class="jusify-center align-center ml-14">
        <div class="flex gap-x-6 mt-6">
        <div class="tag">
            <img src="{{asset('/foto/g.jpg')}}" alt="" class="drop-shadow-xl  rounded-full w-24 h-24">
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
    <div class="container my-12 mx-auto px-2 md:px-4">

      <section class="mb-32">
  
          <div class="flex justify-center">
              <div class="text-center md:max-w-xl lg:max-w-3xl">
                  <h2 class="mb-12 px-6 text-3xl font-bold">
                      Contact us
                  </h2>
              </div>
          </div>
  
          <div class="flex flex-wrap">
  
              <form class="mb-12 w-full shrink-0 grow-0 basis-auto md:px-3 lg:mb-0 lg:w-5/12 lg:px-6">
  
                  <div class="mb-3 w-full">
                      <label class="block font-medium mb-[2px] text-teal-700" htmlFor="exampleInput90">
                              Name
                      </label>
                      <input type="text" class="px-2 py-2 border w-full outline-none rounded-md" id="exampleInput90" placeholder="Name" />
                  </div>
  
                  <div class="mb-3 w-full">
                      <label class="block font-medium mb-[2px] text-teal-700" htmlFor="exampleInput90">
                              Email
                      </label>
                      <input type="email" class="px-2 py-2 border w-full outline-none rounded-md" id="exampleInput90"
                              placeholder="Enter your email address" />
                  </div>
  
                  <div class="mb-3 w-full">
                      <label class="block font-medium mb-[2px] text-teal-700" htmlFor="exampleInput90">
                              Message
                      </label>
                      <textarea class="px-2 py-2 border rounded-[5px] w-full outline-none" name="" id=""></textarea>
                  </div>
  
                  <button type="button"
                          class="mb-6 inline-block w-full rounded bg-teal-400 px-6 py-2.5 font-medium uppercase leading-normal text-white hover:shadow-md hover:bg-teal-500">
                          Send
                  </button>
  
              </form>
  
              <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                  <div class="flex flex-wrap">
                      <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                          <div class="flex items-start">
                              <div class="shrink-0">
                                  <div class="inline-block rounded-md bg-teal-400-100 p-4 text-teal-700">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                                      </svg>
                                  </div>
                              </div>
                              <div class="ml-6 grow">
                                  <p class="mb-2 font-bold">
                                      Technical support
                                  </p>
                                  <p class="text-neutral-500 ">
                                      support@example.com
                                  </p>
                                  <p class="text-neutral-500 ">
                                      +1 234-567-89
                                  </p>
                              </div>
                          </div>
                      </div>
                      <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                          <div class="flex items-start">
                              <div class="shrink-0">
                                  <div class="inline-block rounded-md bg-teal-400-100 p-4 text-teal-700">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                      </svg>
                                  </div>
                              </div>
                              <div class="ml-6 grow">
                                  <p class="mb-2 font-bold ">
                                      Sales questions
                                  </p>
                                  <p class="text-neutral-500 ">
                                      sales@example.com
                                  </p>
                                  <p class="text-neutral-500 ">
                                      +1 234-567-89
                                  </p>
                              </div>
                          </div>
                      </div>
                      <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                          <div class="align-start flex">
                              <div class="shrink-0">
                                  <div class="inline-block rounded-md bg-teal-400-100 p-4 text-teal-700">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                      </svg>
                                  </div>
                              </div>
                              <div class="ml-6 grow">
                                  <p class="mb-2 font-bold ">Press</p>
                                  <p class="text-neutral-500 ">
                                      press@example.com
                                  </p>
                                  <p class="text-neutral-500 ">
                                      +1 234-567-89
                                  </p>
                              </div>
                          </div>
                      </div>
                      <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                          <div class="align-start flex">
                              <div class="shrink-0">
                                  <div class="inline-block rounded-md bg-teal-400-100 p-4 text-teal-700">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 12.75c1.148 0 2.278.08 3.383.237 1.037.146 1.866.966 1.866 2.013 0 3.728-2.35 6.75-5.25 6.75S6.75 18.728 6.75 15c0-1.046.83-1.867 1.866-2.013A24.204 24.204 0 0112 12.75zm0 0c2.883 0 5.647.508 8.207 1.44a23.91 23.91 0 01-1.152 6.06M12 12.75c-2.883 0-5.647.508-8.208 1.44.125 2.104.52 4.136 1.153 6.06M12 12.75a2.25 2.25 0 002.248-2.354M12 12.75a2.25 2.25 0 01-2.248-2.354M12 8.25c.995 0 1.971-.08 2.922-.236.403-.066.74-.358.795-.762a3.778 3.778 0 00-.399-2.25M12 8.25c-.995 0-1.97-.08-2.922-.236-.402-.066-.74-.358-.795-.762a3.734 3.734 0 01.4-2.253M12 8.25a2.25 2.25 0 00-2.248 2.146M12 8.25a2.25 2.25 0 012.248 2.146M8.683 5a6.032 6.032 0 01-1.155-1.002c.07-.63.27-1.222.574-1.747m.581 2.749A3.75 3.75 0 0115.318 5m0 0c.427-.283.815-.62 1.155-.999a4.471 4.471 0 00-.575-1.752M4.921 6a24.048 24.048 0 00-.392 3.314c1.668.546 3.416.914 5.223 1.082M19.08 6c.205 1.08.337 2.187.392 3.314a23.882 23.882 0 01-5.223 1.082" />
                                      </svg>
                                  </div>
                              </div>
                              <div class="ml-6 grow">
                                  <p class="mb-2 font-bold">
                                      Bug report
                                  </p>
                                  <p class="text-neutral-500 ">
                                      bugs@example.com
                                  </p>
                                  <p class="text-neutral-500">
                                      +1 234-567-89
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
  
          </div>
      </section>
  </div>
    <script src="{{asset('../../assets/vendor/aos/dist/aos.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Sintak JavaScript untuk menangani klik pada ikon menu
        var isMenuVisible = false;
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