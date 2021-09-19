<template>
	<master-layout title="Product" subtitle="Create" :backurl="route('product.index')">
		<Form method="POST" :form="form"/>
	</master-layout>
</template>

<script>
    import MasterLayout from '../Master.vue'
    import Form from '@/Form/Product.vue'
    export default {
        components: {
            MasterLayout,
            Form,
        },
        data() {
            return {  
                form: this.$inertia.form({
                    src: route('product.store'),
                    '_method': 'POST',
                    name: '',
                    description: '',
                    buy_price: '',
                    sell_price: '',
                    photo: null
                })
            }
        }
    }
</script>