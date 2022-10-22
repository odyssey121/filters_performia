<template>
    <div class="flex flex-wrap place-items-center">
        <section class="relative mx-auto ">
            <nav class="flex justify-between bg-gray-900 text-white w-screen">
                <div class="px-5 xl:px-12 py-6 flex w-full items-center">
                    <a class="text-2xl font-bold font-heading"
                       href="/">
                        "ПЕРФОРМИЯ"
                    </a>
                    <ul class="px-4 font-semibold font-heading mr-0 ml-auto">
                        <li v-if="$route.path === '/about'"><a class="hover:text-gray-200" href="/">Go Home</a></li>
                        <li v-else><a class="hover:text-gray-200" href="/about">About Me</a></li>
                    </ul>
                </div>
            </nav>
        </section>
    </div>
    <div class="absolute bottom-0 right-0 mb-4 mr-4 z-10">
        <div>
            <a title="Follow me on github" href="https://github.com/odyssey121/filters_performia" target="_blank"
               class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
                <img class="object-cover object-center w-full h-full rounded-full"
                     src="https://github.githubassets.com/images/modules/logos_page/Octocat.png"/>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "NavBar",
    data() {
        return {
            //
        }
    },
    created() {
    },
    methods: {}
}
</script>
