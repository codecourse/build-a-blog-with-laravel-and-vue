import { ref } from 'vue'
import axios from 'axios'

export default function useAdminPosts() {
    const posts = ref([])
    const post = ref([])

    const fetchPosts = async () => {
        let response = await axios.get('/api/admin/posts')
        posts.value = response.data.data
    }

    const destroyPost = async (uuid) => {
        await axios.delete(`/api/admin/posts/${uuid}`)
    }

    const fetchPost = async (uuid) => {
        let response = await axios.get(`/api/admin/posts/${uuid}/edit`)
        post.value = response.data.data
    }

    const createPost = async () => {
        let response = await axios.post('/api/admin/posts')

        return response.data.data
    }

    const patchPost = async (uuid) => {
        await axios.patch(`/api/admin/posts/${uuid}`, post.value)
    }

    return {
        posts,
        post,
        fetchPosts,
        fetchPost,
        createPost,
        patchPost,
        destroyPost
    }
}
