<template>
    <div class="h-screen w-screen flex bg-gray-100">
        <!-- Sidebar -->
        <div class="flex flex-col w-64 bg-gray-900">
            <div class="h-16 flex items-center justify-center">
                <img src="/logo.png" alt="Logo" class="h-8 w-auto" />
            </div>
            <nav class="mt-10">
                <a href="#" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M3 7l9-4 9 4-9 4-9-4z"></path>
                        <path d="M3 17l9 4 9-4M3 12l9 4 9-4"></path>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
                <Link href="/admin/article/index" class="mt-2 flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M7 3h10M7 3v18M7 21h10M17 21V3M7 3v18M12 7h4M12 11h4M12 15h4"></path>
                    </svg>
                    <span class="ml-3">Article</span>
                </Link >
                <Link href="/admin/category" class="mt-2 flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1M9 9H5V5h4zm11 4h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1m-1 6h-4v-4h4zM17 3c-2.206 0-4 1.794-4 4s1.794 4 4 4s4-1.794 4-4s-1.794-4-4-4m0 6c-1.103 0-2-.897-2-2s.897-2 2-2s2 .897 2 2s-.897 2-2 2M7 13c-2.206 0-4 1.794-4 4s1.794 4 4 4s4-1.794 4-4s-1.794-4-4-4m0 6c-1.103 0-2-.897-2-2s.897-2 2-2s2 .897 2 2s-.897 2-2 2"/></svg>
                    <span class="ml-3">Categories</span>
                </Link>
                <Link href="/admin/sdg" class="mt-2 flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c.69 0 1.23-.56 1.23-1.23s-.56-1.23-1.23-1.23S10.77 6.08 10.77 6.77 11.31 8 12 8zm0 0v1.23a2.46 2.46 0 00-.77 1.23c0 .69.31 1.46.77 2.31.46-.85.77-1.62.77-2.31 0-.69-.31-1.46-.77-2.31zm0 2.77V18m0 0c-.7 0-1.23.56-1.23 1.23 0 .69.53 1.23 1.23 1.23.7 0 1.23-.54 1.23-1.23C13.23 18.56 12.7 18 12 18z"></path>
                    </svg>
                    <span class="ml-3">SDGs</span>
                </Link>
                <Link href="/admin/metric/" class="mt-2 flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c.69 0 1.23-.56 1.23-1.23s-.56-1.23-1.23-1.23S10.77 6.08 10.77 6.77 11.31 8 12 8zm0 0v1.23a2.46 2.46 0 00-.77 1.23c0 .69.31 1.46.77 2.31.46-.85.77-1.62.77-2.31 0-.69-.31-1.46-.77-2.31zm0 2.77V18m0 0c-.7 0-1.23.56-1.23 1.23 0 .69.53 1.23 1.23 1.23.7 0 1.23-.54 1.23-1.23C13.23 18.56 12.7 18 12 18z"></path>
                    </svg>
                    <span class="ml-3">Metrics</span>
                </Link>
                <Link href="/admin/indicator/" class="mt-2 flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M13 20.27L12.942 18H11.5q-3.127 0-5.313-2.186T4 10.5t2.187-5.313T11.5 3q1.564 0 2.928.586q1.364.585 2.383 1.604t1.604 2.382Q19 8.937 19 10.5q0 1.529-.449 2.937t-1.242 2.661t-1.9 2.31T13 20.269m-1.467-4.698q.31 0 .523-.213t.213-.524t-.213-.523t-.523-.213t-.523.213q-.214.214-.214.523t.213.524q.214.213.524.213m-.437-2.925h.885q.038-.615.236-.973t.94-1.1q.432-.43.684-.879q.251-.448.251-1.029q0-1.082-.747-1.7q-.747-.619-1.807-.619q-.927 0-1.57.507q-.645.506-.945 1.208l.823.32q.202-.445.59-.809q.389-.364 1.102-.364q.848 0 1.253.461q.405.462.405 1.008q0 .502-.26.849q-.259.347-.667.755q-.721.634-.947 1.14q-.226.504-.226 1.225"/></svg>  
                    <span class="ml-3">Indicators</span>
                </Link>
            </nav>
            <div class="mt-auto p-4">
                <a href="#" class="flex items-center text-gray-300 hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19.428 15.341A8 8 0 116.586 4.757"></path>
                        <path d="M10.875 9.25L16.125 4.5"></path>
                    </svg>
                    <span class="ml-3">Settings</span>
                </a>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center p-6 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <input type="text" placeholder="Search..." class="bg-gray-100 rounded-full text-gray-600 focus:outline-none px-4 py-2">
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <button @click="logout" class="flex items-center text-sm focus:outline-none">
<!--                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwzNjUyOXwwfDF8c2VhcmNofDF8fHVzZXIlMjBhdiVDMyVBQXRhcnxlbnwwfHx8fDE2MTg1ODUyNDc&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Avatar">-->
                            <span class="ml-2">Logout</span>
                        </button>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <div>
                    <slot/>
                </div>
            </main>
        </div>
    </div>


</template>

<script lang="ts" setup>
import { ref } from 'vue'
import { Menu as IconMenu, Message, Setting } from '@element-plus/icons-vue'
import Header from "./Header.vue";
import { Link } from "@inertiajs/vue3";
import { useForm } from '@inertiajs/vue3';

const logoutForm = useForm({})

function logout() {
    logoutForm.post('/logout')
}

const item = {
    date: '2016-05-02',
    name: 'Tom',
    address: 'No. 189, Grove St, Los Angeles',
}
const tableData = ref(Array.from({ length: 20 }).fill(item))
</script>

<style scoped>
.layout-container-demo .el-header {
    position: relative;
    background-color: var(--el-color-primary-light-7);
    color: var(--el-text-color-primary);
}
.layout-container-demo .el-aside {
    color: var(--el-text-color-primary);
    background: var(--el-color-primary-light-8);
}
.layout-container-demo .el-menu {
    border-right: none;
}
.layout-container-demo .el-main {
    padding: 0;
}
.layout-container-demo .toolbar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    right: 20px;
}
</style>
