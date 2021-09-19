<template>
	<form @submit.prevent="submit" enctype="multipart/form-data">
		<div class="md:flex flex-row md:space-x-4 w-full text-xs">
			<div class="w-full">
				<Label for="name" value="Name" />
				<Input id="name" type="text" class="mt-1 block w-full" v-model="form.name" ref="name" autocomplete="name" placeholder="Name" />
				<input-error :message="form.errors.name" class="mt-2" />
			</div>
			<div class="w-full">
				<Label for="image" value="Image" />
				<input id="image" type="file" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" ref="image" autocomplete="image" placeholder="Image" @input="form.photo = $event.target.files[0]"/>
				<input-error :message="form.errors.photo" class="mt-2" />
			</div>
		</div>
		<div class="md:flex flex-row md:space-x-4 w-full text-xs mt-4">
			<div class="w-full">
				<Label for="buy_price" value="Buy Price" />
				<Input id="buy_price" type="number" class="mt-1 block w-full" v-model="form.buy_price" ref="buy_price" autocomplete="buy_price" placeholder="Buy Price" />
				<input-error :message="form.errors.buy_price" class="mt-2" />
			</div>
			<div class="w-full">
				<Label for="sell_price" value="Sell Price" />
				<Input id="sell_price" type="number" class="mt-1 block w-full" v-model="form.sell_price" ref="sell_price" autocomplete="sell_price" placeholder="Sell Price" />
				<input-error :message="form.errors.sell_price" class="mt-2" />
			</div>
		</div>
		<div class="md:flex flex-row md:space-x-4 w-full text-xs mt-4">
			<div class="w-full">
				<Label for="description" value="Description" />
				<Textarea id="description" type="text" class="mt-1 block w-full" v-model="form.description" ref="description" autocomplete="description" placeholder="Description"/>
				<input-error :message="form.errors.description" class="mt-2" />
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
