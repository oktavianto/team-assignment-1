<template>
    <app-layout title="Product">
        <template #header>
            <div class="flex items-center justify-between">
                <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                    Product Management
                </h1>
                <div>
                    <Link :href="route('product.create')" class="px-5 py-3 rounded-xl text-sm font-medium text-white bg-blue-600 hover:bg-blue-800 active:bg-grey-900 focus:outline-none border-4 border-white focus:border-blue-200 transition-all align-middle self-center inline-flex"><PlusCircleIcon class="h-5 w-5 mr-2 text-xl self-center"/> <span class="self-center" v-if="$page.props.user.role == 'admin'">New</span></Link>
                </div>
            </div>
        </template>

        <div class="pt-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card -->
            <div class="bg-white border border-gray-300 rounded shadow">
                <!-- Card Header -->
                <div class="py-3 px-4 border-b border-gray-300">
                    <h2 class="text-lg">Products Data</h2>
                </div>
                <!-- Card Body -->
                <div>
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-white text-sm text-gray-600 border-b border-gray-300">Product</th>
                                <th class="py-4 px-6 bg-white text-sm text-gray-600 border-b border-gray-300">Description</th>
                                <th class="py-4 px-6 bg-white text-sm text-gray-600 border-b border-gray-300">Price</th>
                                <th class="py-4 px-6 bg-white text-sm text-gray-600 border-b border-gray-300" v-if="$page.props.user.role == 'admin'">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-gray-200" v-for="data in list.data">
                                <td class="py-4 px-6 border-gray-300">
                                    <div class="flex align-middle">
                                        <img :src="data.photo_url" class="rounded-full w-12 h-12"/>
                                        <div class="ml-3 mt-1">
                                            <div class="text-xs text-gray-400">#{{ data.id }}</div>
                                            <div>{{ data.name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 border-gray-300">
                                    {{ data.description }}
                                </td>
                                <td class="py-4 px-6 border-gray-300">
                                    <div>
                                        <span class="inline-block rounded-min text-green-600 bg-green-200 px-2 py-1 text-xs font-bold mr-3 rounded">Buy: Rp{{ data.buy_price }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <span class="inline-block rounded-min text-yellow-600 bg-yellow-200 px-2 py-1 text-xs font-bold mr-3 rounded">Sell: Rp{{ data.sell_price }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 border-gray-300 align-middle" v-if="$page.props.user.role == 'admin'">
                                    <div class="inline-flex">
                                        <Link :href="route('product.edit', data.id)" class="text-gray-600 font-bold py-1 px-3 rounded text-xs hover:text-blue-500"><PencilIcon class="w-5 h-5"/></Link>
                                        <button class="text-red-600 font-bold py-1 px-3 rounded text-xs hover:text-red-500" @click="destroy(data.id)"><TrashIcon class="w-5 h-5"/></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="p-5">
                    <pagination :links="list.links" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Pagination from '@/Jetstream/Pagination.vue'
    import { PlusCircleIcon,  PencilIcon, TrashIcon } from '@heroicons/vue/outline'

    export default {
        props: ['list'],
        components: {
            AppLayout,
            Pagination,

            // Icons
            PlusCircleIcon,  PencilIcon, TrashIcon
        },
        methods: {
            destroy(id) {
                if (confirm("Are you sure to delete this data?")) {
                    this.$inertia.delete(route('product.destroy', id), {
                        preserveScroll: true,
                        onStart: () => this.loading = true,
                        onSuccess: () => this.loading = false,
                    })
                }
            }
        }
    }
</script>
