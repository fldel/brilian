<footer class="relative z-50 bg-[#0B1320] text-white py-12 px-6">
  <div class="max-w-7xl mx-auto">

    <!-- Atas: Logo kiri & Tagline kanan -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
      <div class="flex items-center justify-center space-x-2">
        <img src="{{ asset('img/brilianwhite.png') }}"  class="w-10 h-10">
        <h1 class="font-cave text-3xl">BRILIAN</h1>
      </div>
      <span class="text-gray-500 font-cave text-[20px] md:text-[30px] text-center md:text-right">
        Made with fidelina affectine sweat
      </span>
    </div>

    <!-- Tengah: 3/4 kolom sejajar -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12">

      <!-- Company -->
      <div>
        <h4 class="font-cave text-[24px] md:text-[30px] text-gray-500 mb-4">COMPANY</h4>
        <ul class="space-y-2 text-white font-cave text-[20px] md:text-[26px]">
          <li><a href="{{ route('about') }}" class="hover:text-gray-300">About</a></li>
          <li><a href="#" class="hover:text-gray-300">Help Center</a></li>
          <li><a href="#" class="hover:text-gray-300">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Scholarship -->
      <div>
        <h4 class="font-cave text-[24px] md:text-[30px] text-gray-500 mb-4">SCHOLARSHIP</h4>
        <ul class="space-y-2 text-white font-cave text-[20px] md:text-[26px]">
          <li><a class="hover:text-gray-300">S1</a></li>
          <li><a class="hover:text-gray-300">S2</a></li>
          <li><a class="hover:text-gray-300">Diploma</a></li>
          <li><a class="hover:text-gray-300">SMK/SMA</a></li>
          <li><a class="hover:text-gray-300">Research Grant</a></li>
          <li><a class="hover:text-gray-300">Student Exchange</a></li>
        </ul>
      </div>

      <!-- Contact Us -->
      <div>
        <h4 class="font-cave text-[24px] md:text-[30px] text-gray-500 mb-4">CONTACT US</h4>
        <ul class="space-y-2 text-white font-cave text-[20px] md:text-[26px]">
          <li>+62 812-3456-7890</li>
          <li>brilianshibal@gmail.com</li>
        </ul>
      </div>

    </div>

    <!-- Bawah -->
    <div class="border-t border-gray-700 mt-10 pt-6 text-center text-gray-500 text-[18px] md:text-[26px] font-cave">
      <p>© 2025 Brilian — Terms — Privacy Policy</p>
    </div>
  </div>
</footer>
