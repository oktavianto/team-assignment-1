<template>
	<form @submit.prevent="submit" enctype="multipart/form-data">
		<div class="md:flex flex-row md:space-x-4 w-full text-xs">
			<div class="w-full">
				<Label for="name" value="Name" />
				<Input id="name" type="text" class="mt-1 block w-full" v-model="form.name" ref="name" autocomplete="name" placeholder="Name" />
				<input-error :message="form.errors.name" class="mt-2" />
			</div>
			<div class="w-full">
				<Label for="email" value="Email" />
				<Input id="email" type="text" class="mt-1 block w-full" v-model="form.email" ref="email" autocomplete="email" placeholder="Email" />
				<input-error :message="form.errors.email" class="mt-2" />
			</div>
		</div>
		<div class="md:flex flex-row md:space-x-4 w-full text-xs mt-4">
			<div class="w-full">
				<Label for="birtday" value="Birthday" />
				<input id="birtday" type="date" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" ref="birtday" autocomplete="birtday" placeholder="Birthday"  v-model="form.birthday"/>
				<input-error :message="form.errors.birtday" class="mt-2" />
			</div>
			<div class="w-full">
				<Label for="birthplace" value="Birthplace" />
				<Input id="birthplace" type="text" class="mt-1 block w-full" v-model="form.birthplace" ref="birthplace" autocomplete="birthplace" placeholder="Birthplace" />
				<input-error :message="form.errors.birthplace" class="mt-2" />
			</div>
		</div>
		<div class="md:flex flex-row md:space-x-4 w-full text-xs mt-4">
			<div class="w-full">
				<Label for="password" value="Password" />
				<Input id="password" type="password" class="mt-1 block w-full" v-model="form.password" ref="password" autocomplete="password" placeholder="Password" />
				<input-error :message="form.errors.password" class="mt-2" />
			</div>
			<div class="w-full">
				<Label for="password_confirmation" value="Re-type Password" />
				<Input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" ref="password_confirmation" autocomplete="password_confirmation" placeholder="Re-type Password" />
				<input-error :message="form.errors.password_confirmation" class="mt-2" />
			</div>
		</div>
		<div class="md:flex flex-row md:space-x-4 w-full text-xs mt-4">
			<div class="w-full">
				<Label for="sex" value="Sex" />
				<select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.sex">
					<option :value="null" />
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
				<input-error :message="form.errors.sex" class="mt-2" />
			</div>
		</div>
		<div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
			<Button type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="submit">Save</Button>
		</div>
	</form>
</template>

<script>
	import Input from '@/Jetstream/Input.vue'
	import Textarea from '@/Jetstream/Textarea.vue'
	import InputError from '@/Jetstream/InputError.vue'
	import Label from '@/Jetstream/Label.vue'
	import Button from '@/Jetstream/Button.vue'


	export default {
		props: ['form'],

		components: {
			Button,
			Input,
			Textarea,
			InputError,
			Label,
		},
		data() {
			return {
				loading: false
			}
		},

		methods: {
			submit() {
				this.form.post(this.form.src, {
					preserveScroll: true,
					onStart: () => this.loading = true,
					onSuccess: () => this.loading = false,
				})
			},
		}
	}
</script>
