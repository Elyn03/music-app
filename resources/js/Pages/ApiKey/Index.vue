<template>

    <MusicLayout>

        <template #title>
        List of Api Key
        </template>

        <template #action>
            <Link :href="route('apiKeys.create')" class="bg-air-blue hover:bg-sky-blue text-white font-bold rounded py-2 px-4">
                Create a api key
            </Link>
        </template>

        <template #content>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">User id</th>
                        <th scope="col" class="px-6 py-3">Created at</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(key, i) in api_keys" :key="key.uuid">
                        <th class="px-6 py-4">{{ i + 1 }}</th>
                        <th class="px-6 py-4">{{ key.name }}</th>
                        <th class="px-6 py-4">{{ key.user_id }}</th>
                        <th class="px-6 py-4">{{ key.created_at }}</th>
                        <th class="px-6 py-4 flex justify-start items-center gap-2">
                            <Link :href="route('playlists.index')"
                                  class="bg-sky-blue hover:bg-air-blue font-bold rounded py-2 px-4">
                                Details
                            </Link>
                            <Link :href="route('playlists.index')"
                                  class="bg-ash-gray hover:bg-platinium font-bold rounded py-2 px-4">
                                Edit
                            </Link>
                            <button :href="route('playlists.index')"
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
        api_keys: Array,
    },
}
</script>
