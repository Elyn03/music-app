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
                        <th class="px-6 py-4">
                            <Link :href="route('playlists.show', { playlist: playlist })" class="bg-air-blue hover:bg-sky-blue text-white font-bold rounded py-2 px-4">
                                Details
                            </Link>
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
import moment from 'moment';

export default {
    name: 'Index',
    components: {
        MusicLayout,
        Link,
        moment
    },
    props: {
        playlists: Array,
    },
}
</script>
