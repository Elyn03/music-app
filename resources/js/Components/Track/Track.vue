<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg cursos-pointer">
        <div class="w-full">
            <!-- <img :src="'storage/tracks/images/test.svg'" alt=""> -->
            <img :src="`storage/${track.image}`" alt="">
        </div>
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ track.title }}</div>
            <small class="font-gray-500 text-base">{{ track.artist }}</small>
        </div>
        <button @click="handleClick" class="bg-blue-300 hover:bg-blue-500 text-white font-bold py-2 px-6 rounded w-full m-1">Lire</button>
    </div>
</template>

<script>

export default {
    name: 'Track',
    emits: ['played'],
    props: {
        track: Array,
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