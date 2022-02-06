<x-base-layout>

    <header class="bg-primary">
        <nav class="max-w-screen-xl px-5 mx-auto" aria-label="Top">
            <div class="lg:border-none border-primary flex items-center justify-between w-full py-6 border-b">
                <div class="flex items-center">
                    <a href="#">
                        <span class="sr-only">Workflow</span>
                        <img class="w-auto h-10" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white" alt="">
                    </a>
                    <div class="lg:block hidden ml-10 space-x-8">
                        <a href="#" class="hover:text-indigo-50 text-base font-medium text-white"> Solutions </a>

                        <a href="#" class="hover:text-indigo-50 text-base font-medium text-white"> Pricing </a>

                        <a href="#" class="hover:text-indigo-50 text-base font-medium text-white"> Docs </a>

                        <a href="#" class="hover:text-indigo-50 text-base font-medium text-white"> Company </a>
                    </div>
                </div>
                <div class="ml-10 space-x-4">
                    <a href="#" class="hover:bg-opacity-75 inline-block px-4 py-2 text-base font-medium text-white bg-indigo-500 border border-transparent rounded-md">Sign in</a>
                    <a href="#" class="hover:bg-indigo-50 inline-block px-4 py-2 text-base font-medium text-indigo-600 bg-white border border-transparent rounded-md">Sign up</a>
                </div>
            </div>
            <div class="lg:hidden flex flex-wrap justify-center py-4 space-x-6">
                <a href="#" class="hover:text-indigo-50 text-base font-medium text-white"> Solutions </a>

                <a href="#" class="hover:text-indigo-50 text-base font-medium text-white"> Pricing </a>

                <a href="#" class="hover:text-indigo-50 text-base font-medium text-white"> Docs </a>

                <a href="#" class="hover:text-indigo-50 text-base font-medium text-white"> Company </a>
            </div>
        </nav>
    </header>

    <main class="max-w-screen-xl px-5 mx-auto my-10">
        {{ $slot }}
    </main>

    <footer>
        <div class="max-w-screen-xl px-5 mx-auto">
            <div class="sm:text-left py-8 text-sm text-center text-gray-500"><span class="sm:inline block">&copy; 2022 MSC Solutions LLC.</span> <span class="sm:inline block">All rights reserved.</span></div>
        </div>
    </footer>
</x-base-layout>
