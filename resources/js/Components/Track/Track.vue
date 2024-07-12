<template>
    <div class="flex justify-between gap-x-6 px-5 py-3 rounded hover:bg-gray-200" :class="{ 'border border-blue-500 bg-blue-100': active }">

        <div class="flex min-w-0 gap-x-4">
            <img class="h-full w-20 flex-none rounded bg-gray-50" :src="`/storage/${track.image}`" alt="">
            <div class="min-w-0 flex-auto">
                <p class="font-bold text-xl mb-2">{{ track.title }}</p>
                <p class="font-gray-500 text-base">{{ track.artist }}</p>
            </div>
        </div>

        <div class="flex justify-center items-center gap-3">
            <button @click="handleClick"
                    class="bg-sky-blue hover:bg-air-blue text-white font-bold p-1 rounded">
                <img v-if="!active || isPlaying" width="30" height="30" src="https://img.icons8.com/pulsar-line/48/play.png" alt="play"/>
                <img v-if="!isPlaying && active" width="30" height="30" src="https://img.icons8.com/pulsar-line/48/pause.png" alt="pause"/>
            </button>
            <Link v-if="$page.props.isAdmin" :href="route('tracks.edit', { track: track })"
                  class="bg-ash-gray hover:bg-platinium text-white font-bold p-1 rounded">
                <img width="30" height="30" src="https://img.icons8.com/pulsar-line/48/edit.png" alt="edit"/>
            </Link>
            <Link v-if="$page.props.isAdmin" as="button" method="delete" :href="route('tracks.destroy', { track: track })"
                  class="bg-misty-rose hover:bg-tea-rose text-white font-bold p-1 rounded">
                <img width="30" height="30" src="https://img.icons8.com/pulsar-line/48/filled-trash.png" alt="filled-trash"/>
            </Link>
        </div>

    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Track',
    components: {
        Link
    },
    emits: ['played'],
    props: {
        track: Array,
        active: {
            type: Boolean,
        },
        isPlaying: Boolean
    },
    methods: {
        handleClick() {
            this.$emit('played', this.track);
            // const url = "storage/" + this.track.music
            // let audio = new Audio(url)
            // audio.play()
        }
    }
}
</script>
