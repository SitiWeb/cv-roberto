<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            cursor: none;
        }
    </style>
</head>

<body class="text-zinc-950 antialiased lg:bg-zinc-100 dark:bg-zinc-900 dark:text-white dark:lg:bg-zinc-950">
    <div class="max-w-5xl mx-auto p-6 space-y-8">

        <header
            class="flex flex-col md:flex-row items-center md:items-start gap-6 lg:rounded-lg lg:bg-white lg:p-10 lg:shadow-xs lg:ring-1 lg:ring-zinc-950/5 dark:lg:bg-zinc-900 dark:lg:ring-white/10 transition">

            <!-- Profielfoto -->
            <div class="shrink-0">
                <img src="{{ asset('storage/roberto.png') }}" alt="Profielfoto"
                    class="w-32 h-32 rounded-full object-cover shadow-md ring-4 ring-zinc-200 dark:ring-zinc-800">
            </div>

            <!-- Content -->
            <div class="flex-1 space-y-3">
                <h1 class="text-4xl font-bold leading-tight text-zinc-900 dark:text-white">
                    Roberto Guagliardo
                </h1>

                <p class="text-lg text-sitiweb-green font-medium">
                    Full Stack Developer · Laravel Expert · DevOps Enthousiast
                </p>

                <p class="text-zinc-600 dark:text-zinc-300 text-sm leading-relaxed max-w-3xl">
                    Ik word enthousiast van alles wat systemen sneller, stabieler en slimmer maakt. Of het nu gaat om
                    het automatiseren van deploys, het opzetten van monitoring met Grafana & Promtail, of het draaien
                    van Docker-containers op Proxmox — ik denk graag in oplossingen die schaalbaar zijn en onderhoud
                    verminderen. <br><br>
                    Ik werk op het snijvlak van development en systeembeheer, en zoek continu naar manieren om processen
                    te versimpelen, te automatiseren en te verbeteren.
                </p>

                <!-- Optioneel: Socials -->
                <div class="flex gap-4 pt-2">
                    <a href="https://github.com/SitiWeb" target="_blank"
                        class="text-zinc-500 hover:text-black dark:hover:text-white text-xl">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://nl.linkedin.com/in/roberto-guagliardo-489061a5" target="_blank"
                        class="text-zinc-500 hover:text-blue-600 text-xl">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </header>


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Linkerkolom (1/3) -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Personalia -->
                <section
                    class="lg:rounded-lg lg:bg-white lg:p-10 lg:shadow-xs lg:ring-1 lg:ring-zinc-950/5 dark:lg:bg-zinc-900 dark:lg:ring-white/10">
                    <h2 class="text-2xl font-semibold mb-4">
                        <i class="fa-solid fa-user mr-2 text-sitiweb-green"></i> Profiel
                    </h2>

                    @include('frontend.personalia')
                </section>

                <!-- Vaardigheden -->
                <section
                    class="lg:rounded-lg lg:bg-white lg:p-10 lg:shadow-xs lg:ring-1 lg:ring-zinc-950/5 dark:lg:bg-zinc-900 dark:lg:ring-white/10">
                    <h2 class="text-2xl font-semibold mb-4">
                        <i class="fa-solid fa-tools mr-2 text-sitiweb-green"></i> Vaardigheden
                    </h2>

                    @include('frontend.vaardigheden')
                </section>

            </div>

            <!-- Rechterkolom (2/3) -->
            <div class="lg:col-span-2 space-y-6 min-h-screen" id="right-column">

                <div id="right-content" class="space-y-6">
                    <!-- Werkervaring -->
                    <section
                        class="lg:rounded-lg lg:bg-white lg:p-10 lg:shadow-xs lg:ring-1 lg:ring-zinc-950/5 dark:lg:bg-zinc-900 dark:lg:ring-white/10">
                        <h2 class="text-2xl font-semibold mb-4">
                            <i class="fa-solid fa-briefcase mr-2 text-sitiweb-green"></i> Werkervaring
                        </h2>

                        @include('frontend.werkervaring')
                    </section>

                    <!-- Opleidingen -->
                    <section
                        class="lg:rounded-lg lg:bg-white lg:p-10 lg:shadow-xs lg:ring-1 lg:ring-zinc-950/5 dark:lg:bg-zinc-900 dark:lg:ring-white/10">
                        <h2 class="text-2xl font-semibold mb-4">
                            <i class="fa-solid fa-graduation-cap mr-2 text-sitiweb-green"></i> Opleidingen
                        </h2>
                        @include('frontend.opleidingen')
                    </section>


                </div>
            </div>



        </div>

        @include('frontend.cta')
        <!-- Footer -->
        <footer class="text-center text-sm text-gray-500 dark:text-gray-400 mt-10">
            &copy; {{ date('Y') }} Roberto Guagliardo. Alle rechten voorbehouden.
        </footer>
        <div id="custom-cursor">
            {!! file_get_contents(public_path('storage/sitiweb.svg')) !!}
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script>
            const cursor = document.getElementById('custom-cursor');

            document.addEventListener('mousemove', (e) => {
                gsap.to(cursor, {
                    duration: 0.2,
                    x: e.clientX + 20,
                    y: e.clientY - 15,
                    ease: 'power2.out'
                });
            });
        </script>

        @stack('scripts')

</body>

</html>
