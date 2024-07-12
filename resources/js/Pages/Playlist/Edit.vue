<template>

    <MusicLayout>

        <template #title>
            Update playlist : {{ playlist.title}}
        </template>

        <template #action>
            <Link :href="route('playlists.index')" class="bg-air-blue hover:bg-sky-blue text-white font-bold rounded py-2 px-4">
                Return
            </Link>
        </template>

        <template #content>

            <form @submit.prevent="submit">
                <!-- Playlist title -->
                <div class="mb-3">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-3">Title</label>
                    <input v-model="form.title" type="text" id="title" placeholder="Title" class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5">
                    <p class="text-red-400 text-xs italic">{{ form.errors.title }}</p>
                </div>

                <!-- Tracks -->
                <div v-for="track in tracks" :key="track.uuid">
                    <input :id="track.uuid" :value="track.uuid" v-model="form.tracks" type="checkbox" name="tracks" class="mr-5">
                    <label :for="track.uuid">{{ track.title }}</label>
                </div>

                <input type="submit" value="Modify playlist" class="bg-air-blue hover:bg-sky-blue text-white rounded py-2 px-4"
                       :class="[form.processing ? 'bg-gray-500' : 'bg-blue-300 hover:bg-blue-600']" :disabled="form.processing">
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
    props: {
        playlist: Object,
        tracks: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: this.playlist.title,
                tracks: this.playlist.tracks.map(track => track.uuid),
            })
        }
    },
    methods: {
        submit() {
            this.form.put(route('playlists.update', { playlist: this.playlist }))
        }
    }
}
</script>
