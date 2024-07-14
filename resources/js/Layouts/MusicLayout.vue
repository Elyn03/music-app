<template>
  <div class="flex relative">
    <nav class="bg-gray-700 fixed top-0 left-0 h-[100vh] w-[20%]">
      <div class="h-[100vh] py-10 mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex flex-col h-full items-center justify-between">

          <div class="flex items-center justify-center sm:items-stretch sm:justify-start w-full">
              <div class="flex flex-col gap-3 w-full">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                  <div class="flex flex-col justify-center items-center min-w-0 gap-4">
                      <img v-if="$page.props.auth.user" class="w-20 h-20 flex-none rounded-full bg-gray-50" :src="`/storage/tracks/images/loml.jpg`" alt="">
                      <div class="min-w-0 flex-auto">
                          <p class="font-bold text-white text-center text-xl mb-2">Welcome {{ $page.props.auth.user?.name }}</p>
                      </div>
                  </div>

                  <Link :href="route('tracks.index')"
                        class="rounded-md px-3 py-2 text-lg font-medium flex justify-center items-center"
                        :class="[route().current().includes('tracks') ?  'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']">
                      Musics
                  </Link>

                  <Link :href="route('playlists.index')"
                        v-if="$page.props.auth.user"
                        class="rounded-md px-3 py-2 text-lg font-medium flex justify-center items-center"
                        :class="[route().current().includes('playlists') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']">
                      Playlists
                  </Link>

                  <Link :href="route('apiKeys.index')"
                        v-if="$page.props.auth.user"
                        class="rounded-md px-3 py-2 text-lg font-medium flex justify-center items-center"
                        :class="[route().current().includes('apiKeys') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']">
                      Api Keys
                  </Link>
              </div>
          </div>
          <div class="absolute w-full inset-y-0 right-0 flex items-center sm:static sm:inset-auto sm:pr-0">
              <div class="relative flex flex-col gap-3 w-full">
                  <Link :href="route('login')"
                        v-if="!$page.props.auth.user"
                        class="bg-air-blue hover:bg-sky-blue rounded-md px-3 py-2 text-lg text-white font-medium flex justify-center items-center">
                      Log in
                  </Link>

                  <Link :href="route('register')"
                        v-if="!$page.props.auth.user"
                        class="bg-air-blue hover:bg-sky-blue rounded-md px-3 py-2 text-lg text-white font-medium flex justify-center items-center">
                      Sign up
                  </Link>

                  <Link :href="route('logout')" as="button" method="POST"
                        v-if="$page.props.auth.user"
                        class="bg-air-blue hover:bg-sky-blue rounded-md px-3 py-2 text-lg text-white font-medium flex justify-center items-center">
                      Log out
                  </Link>
              </div>
          </div>
        </div>
      </div>

    </nav>

    <div class="py-5 px-10 sm:mt-0 sm:ml-[20%] w-full sm:w-[80%]">

      <div class="pb-5 flex justify-between items-center">
        <h4 class="text-3xl font-bold my-6">
          <slot name="title" />
        </h4>
        <div>
          <slot name="action" />
        </div>
      </div>

      <div>
          <slot name="content" />
      </div>

    </div>

  </div>
</template>


<script>
import { Link } from '@inertiajs/vue3';

    export default {
        name: 'MusicLayout',
        components: {
            Link
        },
    }
</script>
