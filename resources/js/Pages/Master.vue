<template>
	<app-layout :title="title">
        <template #header>
            <div class="flex items-center justify-between">
                <h1 class="font-semibold text-2xl text-blue-500 leading-tight">
                    <Link :href="backurl">{{ title }} /</Link> <span class="text-gray-800">{{ subtitle }}</span>
                </h1>
                <div>
                    <Link :href="backurl" class="px-5 py-3 rounded-xl text-sm font-medium text-gray-500 bg-white hover:bg-gray-200 active:bg-grey-900 focus:outline-none border border-grey-600 focus:border-gray-600 transition-all align-middle self-center inline-flex"><ArrowCircleLeftIcon class="h-5 w-5 mr-2 text-xl self-center"/> <span class="self-center">Back</span></Link>
                </div>
            </div>
        </template>
        <div class="pt-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card -->
            <div class="bg-white border border-gray-300 rounded p-5">
                <!-- Card Header -->
                <slot></slot>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { ArrowCircleLeftIcon } from '@heroicons/vue/outline'
    export default {
        props: ['title', 'subtitle', 'backurl'],
        components: {
            AppLayout,
            ArrowCircleLeftIcon,
        },
    }
</script>