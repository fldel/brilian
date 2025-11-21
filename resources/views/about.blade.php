<x-app-layout>
       <!-- Background Video -->
        <div class="fixed inset-0 -z-10">
            <video autoplay muted loop playsinline 
                class="absolute inset-0 object-cover w-full h-full pointer-events-none">
                <source src="/videos/bgabout.mp4" type="video/mp4">
            </video>
        </div>

        <div class="relative flex flex-col items-center justify-center min-h-screen text-center mt-10 px-6">

            <h1 class="text-[80px] sm:text-[100px] md:text-[100px] text-black drop-shadow-lg font-cave leading-[0.8]">
                About Brilian
            </h1>
            
            <h3 class="text-[24px] sm:text-[30px] md:text-[40px] font-cave text-black/80 mb-10">
                Cool. Smart. User-Friendly
            </h3>

            <div class="flex justify-center">
                <img src="{{ asset('img/aboutus.jpg') }}" 
                    class="w-[1500px] h-[600px] rounded-lg shadow-lg border-2 border-black object-cover">
            </div>
        </div>

        <div class="relative flex flex-col items-center justify-centertext-center py-10 px-6">

            <h1 class="text-center text-[40px] sm:text-[60px] md:text-[100px] text-black drop-shadow-lg font-cave leading-[0.8]">
            Ready to contact us today
            </h1>

            <h3 class="text-[24px] sm:text-[30px] md:text-[40px] font-cave text-black/80 mb-10">
               You know where we can assist you
            </h3>
        
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Email -->
            <div class="flex items-center gap-4 bg-white rounded-xl shadow-md p-6 w-[480px] h-[170px] border-2 border-black">
                <!-- Icon -->
                <div class="flex items-center justify-center w-24 h-24 rounded-lg bg-blue-100 text-brand-default border-2 border-black">
                    <!-- Ganti dengan icon email -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0l-4-4m4 4l-4 4" />
                    </svg>
                </div>
                <!-- Text -->
                <div class="leading-[1.2]">
                    <h3 class="text-[35px] font-cave text-black">Email</h3>
                    <p class="text-[30px] font-cave text-gray-600">brilianve@gmail.com</p>
                </div>
            </div>

            <!-- Phone -->
            <div class="flex items-center gap-4 bg-white rounded-xl shadow-md p-6 w-[480px] h-[170px] border-2 border-black">
                <div class="flex items-center justify-center w-24 h-24 rounded-lg bg-green-100 text-brand-default border-2 border-black">
                    <!-- Icon phone -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3 7-1.34 2.68a1 1 0 00.22 1.13l2.1 2.1a1 1 0 001.13.22L17 15l3 3v2a1 1 0 01-1 1h-1a16 16 0 01-16-16V6a1 1 0 011-1z"/>
                    </svg>
                </div>
                <div class="leading-[1.2]">
                    <h3 class="text-[35px] font-cave text-black">Phone</h3>
                    <p class="text-[30px] font-cave text-gray-600">+62 812-3354-6324</p>
                </div>
            </div>

            <!-- Address -->
            <div class="flex items-center gap-4 bg-white rounded-xl shadow-md p-6 w-[480px] h-[170px] border-2 border-black">
                <div class="flex items-center justify-center w-24 h-24 rounded-lg bg-red-100 text-brand-default border-2 border-black">
                    <!-- Icon address -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.656 0 3-1.344 3-3s-1.344-3-3-3-3 1.344-3 3 1.344 3 3 3zm0 1c-2.209 0-4 1.791-4 4v3h8v-3c0-2.209-1.791-4-4-4z"/>
                    </svg>
                </div>
                <div class="leading-[1.2]">
                    <h3 class="text-[35px] font-cave text-black">Address</h3>
                    <p class="text-[30px] font-cave text-gray-600">Suite 400, New York, USA</p>
                </div>
            </div>
        </div>

        <section class="bg-white mt-16 w-full max-w-[1500px] min-h-[600px] border-2 border-black rounded-lg flex flex-col md:flex-row items-center px-6 md:px-12 py-10 gap-10">

            <div class="flex-1">
                <h2 class="text-[40px] md:text-[65px] font-bold text-black mb-4 font-cave">
                    Our Story
                </h2>
                <p class="text-gray-700 text-[20px] md:text-[28px] font-cave leading-relaxed">
                    Every great solution begins with a problem. We noticed many students 
                    struggling to find out scholarships information, missing out on opportunities, 
                    and wasting time on bad resources.  
                    <br>
                    That’s why we set out to create a website platform that can easily help 
                    many students out there reaching for help in their struggle finding scholarships.
                </p>
            </div>

            <div class="flex-shrink-0">
                <img src="{{ asset('img/storygif.gif') }}" 
                    alt="Our Story" 
                    class="w-[700px] max-w-full md:h-[520px] rounded-lg border-2 border-black object-cover">
            </div>
        </section>

        <section class="bg-white mt-8 w-full max-w-[1500px] min-h-[600px] border-2 border-black rounded-lg flex flex-col md:flex-row items-center px-6 md:px-12 py-10 gap-10">

            <div class="flex-shrink-0">
                <img src="{{ asset('img/targetgif.gif') }}" 
                    alt="Our Story" 
                    class="w-[700px] max-w-full md:h-[520px] rounded-lg border-2 border-black object-cover">
            </div>

            <div class="flex-1">
                <h2 class="text-[40px] md:text-[65px] font-bold text-black mb-4 font-cave">
                    Our Target
                </h2>
                <p class="text-gray-700 text-[20px] md:text-[28px] font-cave leading-relaxed">
                    Our aim is to help students. Our web is designed to adapt to your unique needs and easily helps your struggles. We prioritize fostering long-term students loyalty by understanding needs and delivering experiences at every interaction.  
            
                </p>
            </div>
        </section>

        <div class="relative flex flex-col items-center justify-center text-center mt-24 py-10 px-6">

            <h1 class="text-center text-[40px] sm:text-[60px] md:text-[100px] text-black drop-shadow-lg font-cave leading-[0.8]">
                Meet our experts
            </h1>

            <h3 class="text-center leading-[1] text-[20px] sm:text-[28px] md:text-[36px] font-cave text-black/80 mb-10 max-w-3xl">
                Discover the passionate team of innovators, strategists, and customer success professionals
            </h3>

        <!-- Team Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center mt-10 mb-24">

            <!-- Card 1 -->
            <div class="w-[400px] h-[500px] bg-white border-2 border-black rounded-xl shadow-md p-4 flex flex-col">
                <!-- Image -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('img/Bintang.jpeg') }}" 
                        alt="Bintang Harvindi" 
                        class="w-full h-[320px] object-cover rounded-lg border-2 border-black">
                </div>
                <!-- Name & Role -->
                <div class="mt-4 text-left">
                    <h3 class="text-[36px] text-black font-cave leading-[1.2]">Bintang Harvindi</h3>
                    <p class="text-[22px] text-gray-600 font-cave">Passive Person</p>
                </div>
                <!-- Social Icons -->
                <div class="mt-6 flex justify-end gap-3">
                    <a href="https://instagram.com/username1" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>                    
                    </a>
                    <a href="https://linkedin.com/in/username1" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                    </svg>                    
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="w-[400px] h-[500px] bg-white border-2 border-black rounded-xl shadow-md p-4 flex flex-col">
                <div class="flex-shrink-0">
                    <img src="{{ asset('img/Fidelina.jpg') }}" 
                        alt="Fidelina Affectine" 
                        class="w-full h-[320px] object-cover rounded-lg border-2 border-black">
                </div>
                <div class="mt-4 text-left">
                    <h3 class="text-[36px] text-black font-cave leading-[1.2]">Fidelina Affectine</h3>
                    <p class="text-[22px] text-gray-600 font-cave">Fullstack Developer, UI/UX Designer</p>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <a href="https://instagram.com/username1" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>                    
                    </a>
                    <a href="https://linkedin.com/in/username1" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                    </svg>                    
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="w-[400px] h-[500px] bg-white border-2 border-black rounded-xl shadow-md p-4 flex flex-col">
                <div class="flex-shrink-0">
                    <img src="{{ asset('img/Jefferson.jpeg') }}" 
                        alt="Jefferson Smith" 
                        class="w-full h-[320px] object-cover rounded-lg border-2 border-black">
                </div>
                <div class="mt-4 text-left">
                    <h3 class="text-[36px] text-black font-cave leading-[1.2]">Jefferson Smith</h3>
                    <p class="text-[22px] text-gray-600 font-cave">Passive Person</p>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <a href="https://instagram.com/username1" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>                    
                    </a>
                    <a href="https://linkedin.com/in/username1" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                    </svg>                    
                    </a>
                </div>
            </div>
            </div>

        </div>

    </div>

        @include('layouts.footer')

</x-app-layout>
