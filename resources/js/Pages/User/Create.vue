<template>
	<master-layout title="User" subtitle="Create" :backurl="route('user.index')">
		<Form method="POST" :form="form"/>
	</master-layout>
</template>

<script>
    import MasterLayout from '../Master.vue'
    import Form from '@/Form/User.vue'
    export default {
        components: {
            MasterLayout,
            Form,
        },
        data() {
            return {  
                form: this.$inertia.form({
                    src: route('user.store'),
                    '_method': 'POST',
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                    birthday: null,
                    birthplace: null,
                    sex: null,
                })
            }
        }
    }
</script>