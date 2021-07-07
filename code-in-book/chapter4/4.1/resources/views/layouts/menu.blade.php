<nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-teal-500 mb-3">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="#pablo">
                My App
            </a>
            <button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button"
                onclick="toggleNavbar('example-collapse-navbar')"
            >
                <span class="block relative w-6 h-px rounded-sm bg-white"></span>
                <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
                <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center" id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none ml-auto">
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo">
                        Discover
                    </a>
                </li>
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo">
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo">
                        Setting
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function toggleNavbar(collapseID){
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("flex");
    }
</script>
