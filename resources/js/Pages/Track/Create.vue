<template>

    <MusicLayout>
        <template #title>
            Liste de mes tracks
        </template>

        <template #action>
            <Link :href="route('tracks.index')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Retour
            </Link>
        </template>

        <template #content>
            FOrmulaire de création

            <ul>
                <li>Titre</li>
                <li>Artist</li>
                <li>Display:select</li>
                <li>Miniature</li>
                <li>Audio</li>
                <li></li>
                <li>Submit</li>
                <li>form.XXX (https://inertiajs.com/forms)</li>
                <li>Fonction submit lorsque le formulaire est validé</li>
            </ul>
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
}
</script>