<template>

    <MusicLayout>

        <template #title>
            List of playlists
        </template>

        <template #action>
            <Link :href="route('playlists.create')" class="bg-air-blue hover:bg-sky-blue text-white font-bold rounded py-2 px-4">
                Create a playlist
            </Link>
        </template>

        <template #content>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Musics number</th>
                        <th scope="col" class="px-6 py-3">Created at</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(playlist, i) in playlists" :key="playlist.uuid">
                        <th class="px-6 py-4">{{ i + 1 }}</th>
                        <th class="px-6 py-4">{{ playlist.title }}</th>
                        <th class="px-6 py-4">{{ playlist.tracks_count }} musics</th>
                        <th class="px-6 py-4">{{ playlist.created_at }}</th>
                        <th class="px-6 py-4 flex justify-start items-center gap-2">
                            <Link :href="route('playlists.show', { playlist: playlist })"
                                  class="bg-sky-blue hover:bg-air-blue font-bold rounded py-2 px-4">
                                Details
                            </Link>
                            <Link :href="route('playlists.edit', { playlist: playlist })"
                                  class="bg-ash-gray hover:bg-platinium font-bold rounded py-2 px-4">
                                Edit
                            </Link>
                            <button @click="deletePlaylist(playlist)"
                                    class="bg-misty-rose hover:bg-tea-rose font-bold rounded py-2 px-4">
                                Delete
                            </button>
                        </th>
                    </tr>
                </tbody>
            </table>
        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    components: {
        MusicLayout,
        Link,
    },
    props: {
        playlists: Array,
    },
    methods: {
        deletePlaylist(playlist) {
            this.$inertia.delete(route('playlists.destroy', { playlist: playlist}))
        }
    }
}
</script>
