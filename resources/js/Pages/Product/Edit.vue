<template>
	<master-layout title="Product" subtitle="Update" :backurl="route('product.index')">
		<Form method="POST" :form="form"/>
	</master-layout>
</template>

<script>
    import MasterLayout from '../Master.vue'
    import Form from '@/Form/Product.vue'
    export default {
    	props: ['data'],
        components: {
            MasterLayout,
            Form,
        },
        data() {
            return {  
                form: this.$inertia.form({
                    src: route('product.update', this.data.id),
                    '_method': 'PUT',
                    name: this.data.name,
                    description: this.data.description,
                    buy_price: this.data.buy_price,
                    sell_price: this.data.sell_price,
                    photo: null
                })
            }
        }
    }
</script>