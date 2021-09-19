<template>
    <div class="mt-6 -mb-1 flex flex-wrap">
        <template v-for="link in links">
            <div v-if="link.url === null" class="mr-1 mb-1 px-3 py-2 text-sm border rounded text-gray-400" :class="{ 'ml-auto': link.label === 'Next' }">{{ link.label }}</div>
            <Link v-else class="mr-1 mb-1 px-3 py-2 text-sm border border-gray-300 rounded bg-white hover:bg-blue-500 hover:border-blue-500 hover:text-white focus:border-blue-800" :class="{ 'bg-blue-500 border-blue-500 text-white': link.active, 'ml-auto': link.label === 'Next' }" :href="link.url">{{ link.label }}</Link>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            links: Array,
        },
    }
</script>