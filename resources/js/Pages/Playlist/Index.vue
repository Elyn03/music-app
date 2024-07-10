<template>

    <MusicLayout>

        <template #title>
            List of playlists
        </template>

        <template #action>
            <Link :href="route('playlists.create')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Create a playlist
            </Link>
            <Link :href="route('tracks.index')" class="bg-lime-300 hover:bg-lime-600 text-white font-bold rounded py-2 px-4">
                Musics
            </Link>
        </template>

        <template #content>
            <div>
                <input v-model='filter' type="search" class="shadow border rounded py-2 px-3 text-gray-600">

                {{playlists}}
                <div class="grid grid-cols-4 gap-4">
                </div>
            </div>
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
        Link
    },
    props: {
        playlists: Array,
    },
}
</script>
