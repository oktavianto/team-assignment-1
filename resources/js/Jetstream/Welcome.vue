<template>
    <div>
        <div class="p-6 bg-white border-b border-gray-300">
            <div class="text-2xl">
                Selamat Datang <span class="font-bold text-indigo-500">{{ $page.props.user.name }}</span>! 🚀
            </div>

            <div class="mt-4 text-gray-500">
                Project ini dibuat untuk Tugas Kelompok 1 - Web Programming.
            </div>
            <div class="mt-4 text-gray-500">
                Made with <span class="font-bold text-red-500">&#10084;&#65039;</span> by <span class="font-bold text-red-500">Team 4</span>
            </div>
            <div class="mt-4 text-gray-500">
                Dengan fitur yang dibuat sebagai berikut:
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><Link :href="route('product.index')">Product Management</Link></div>
                </div>

                <div class="ml-12">
                    <Link :href="route('product.index')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                <div>Check the Product Management</div>

                                <div class="ml-1 text-indigo-500">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                        </div>
                    </Link>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><Link :href="route('user.index')">User Management</Link></div>
                </div>

                <div class="ml-12">
                    <Link :href="route('user.index')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                <div>Check the User Management</div>

                                <div class="ml-1 text-indigo-500">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },
    })
</script>
