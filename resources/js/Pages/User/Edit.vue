<template>
	<master-layout title="User" subtitle="Update" :backurl="route('user.index')">
		<Form method="POST" :form="form"/>
	</master-layout>
</template>

<script>
    import MasterLayout from '../Master.vue'
    import Form from '@/Form/User.vue'
    export default {
    	props: ['data'],
        components: {
            MasterLayout,
            Form,
        },
        data() {
            return {  
                form: this.$inertia.form({
                    src: route('user.update', this.data.id),
                    '_method': 'PUT',
                    name: this.data.name,
                    email: this.data.email,
                    role: this.data.role,
                    password: this.data.password,
                    password_confirmation: this.data.password_confirmation,
                    birthday: this.data.birthday,
                    birthplace: this.data.birthplace,
                    sex: this.data.sex
                })
            }
        }
    }
</script>