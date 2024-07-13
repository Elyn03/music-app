<template>

    <MusicLayout>

        <template #title>
            Create a api key
        </template>

        <template #action>
            <Link :href="route('apiKeys.index')" class="bg-air-blue hover:bg-sky-blue text-white font-bold rounded py-2 px-4">
                Return
            </Link>
        </template>

        <template #content>

            <form @submit.prevent="submit">
                <!-- Apikey name -->
                <div class="mb-3">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-3">Name</label>
                    <input v-model="form.name" type="text" id="name" placeholder="Name"
                           class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5">
                    <p class="text-red-400 text-xs italic">{{ form.errors.name }}</p>
                </div>

                <input type="submit" value="Create api key" class="text-white rounded py-2 px-4"
                       :class="[form.processing ? 'bg-gray-500' : 'bg-air-blue hover:bg-sky-blue']" :disabled="form.processing">
            </form>

        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Create',
    components: {
        MusicLayout,
        Link
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('apiKeys.store'))
        }
    }
}
</script>
