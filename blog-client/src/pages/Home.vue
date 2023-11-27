<template>
    <div class="space-y-16">
        <div v-for="post in posts" :key="post.uuid">
            <router-link :to="{ name: 'post', params: { slug: post.slug } }" class="block">
                <h1 class="text-3xl sm:text-4xl leading-10 font-extrabold tracking-tight text-gray-900">{{ post.title }}</h1>
                <p class="mt-6 text-gray-500">
                    {{ post.teaser }}
                </p>
            </router-link>
        </div>
    </div>
</template>

<script>
import { onMounted } from 'vue'
import usePosts from '../api/usePosts'

export default {
    setup() {
        const { posts, fetchPosts } = usePosts()

        onMounted(fetchPosts)

        return {
            posts
        }
    },
}
</script>
