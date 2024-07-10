<template>

    <MusicLayout>

        <template #title>
            Liste de mes tracks
        </template>

        <template #action>
            <Link :href="route('tracks.create')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Ajouter une musique
            </Link>
        </template>

        <template #content>
            <div>
                <input v-model='filter' type="search" class="shadow border rounded py-2 px-3 text-gray-600">

                <div class="grid grid-cols-4 gap-4">
                    <Track v-for="track in filteredTracks" :key="track.id" :track="track" @played="play(track)" class=""/>
                </div>
            </div>
        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import Track from '@/Components/Track/Track.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    components: {
        MusicLayout,
        Track,
        Link
    },
    props: {
        tracks: Array,
    },
    data() {
        return {
            audio: null,
            currentTrack: null,
            filter: ''
        }
    },
    computed: {
        filteredTracks() {
            return this.tracks.filter(track =>
                track.title.toLowerCase().includes(this.filter.toLowerCase())
                || track.artist.toLowerCase().includes(this.filter.toLowerCase()))
        }
    },
    methods: {
        play(track) {
            const url = "storage/" + track.music

            if (!this.currentTrack) {
                this.audio = new Audio(url)
                this.audio.play()
            } else if (this.currentTrack !== track.uuid) {
                this.audio.pause();
                this.audio.src = url
                this.audio.play()
            } else {
                this.audio.paused ? this.audio.play() : this.audio.pause()
            }

            this.currentTrack = track.uuid;
            this.audio.addEventListener('ended', () => this.currentTrack = null);
        }
    }
}
</script>
