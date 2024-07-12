<template>

    <MusicLayout>
        <template #title>
            Modify a music
        </template>

        <template #action>
            <Link :href="route('tracks.index')" class="bg-air-blue hover:bg-sky-blue text-white font-bold rounded py-2 px-4">
                Return
            </Link>
        </template>

        <template #content>
            <form @submit.prevent="submit">
                <div class="mb-3 sm:col-span-4">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input v-model="form.title" type="text" id="title" placeholder="Title"
                                   class="block flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <p class="text-red-400 text-xs italic">{{ form.errors.title }}</p>
                </div>

                <div class="mb-3 sm:col-span-4">
                    <label for="artist" class="block text-sm font-medium leading-6 text-gray-900">Artist</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input v-model="form.artist" type="text" name="artist" id="artist" placeholder="Artist"
                                   class="block flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <p class="text-red-400 text-xs italic">{{ form.errors.artist }}</p>
                </div>

                <div class="sm:col-span-3 mb-3">
                    <label for="display" class="block text-sm font-medium leading-6 text-gray-900">Display</label>
                    <div class="mt-2">
                        <select v-model="form.display" type="text" id="display" name="display"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option :value="true">YES</option>
                            <option :value="false">NON</option>
                        </select>
                    </div>
                    <p class="text-red-400 text-xs italic">{{ form.errors.display }}</p>
                </div>

                <input type="submit" value="Modify a music" class="bg-air-blue hover:bg-sky-blue rounded py-2 px-4" :disabled="form.processing">

            </form>
        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Edit',
    components: {
        MusicLayout,
        Link
    },
    props: {
        track: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: this.track.title,
                artist: this.track.artist,
                display: !!this.track.display,
            })
        }
    },
    methods: {
        submit() {
            this.form.put(route('tracks.update', { track: this.track }))
        }
    }
}
</script>
