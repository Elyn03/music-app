<template>

    <MusicLayout>

        <template #title>
            List of my music
        </template>

        <template #action>
            <Link v-if="$page.props.isAdmin" :href="route('tracks.create')" class="bg-air-blue hover:bg-sky-blue text-white font-bold rounded py-2 px-4">
                Add a music
            </Link>
        </template>

        <template #content>
            <TrackList :tracks="tracks" />
        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';
import TrackList from "@/Components/Track/TrackList.vue";

export default {
    name: 'Index',
    components: {
        TrackList,
        MusicLayout,
        Link
    },
    props: {
        tracks: Array,
    }
}
</script>
