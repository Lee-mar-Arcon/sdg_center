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
                <a href="#" class="mt-2 flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M7 3h10M7 3v18M7 21h10M17 21V3M7 3v18M12 7h4M12 11h4M12 15h4"></path>
                    </svg>
                    <span class="ml-3">Article</span>
                </a>
                <a href="#" class="mt-2 flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c.69 0 1.23-.56 1.23-1.23s-.56-1.23-1.23-1.23S10.77 6.08 10.77 6.77 11.31 8 12 8zm0 0v1.23a2.46 2.46 0 00-.77 1.23c0 .69.31 1.46.77 2.31.46-.85.77-1.62.77-2.31 0-.69-.31-1.46-.77-2.31zm0 2.77V18m0 0c-.7 0-1.23.56-1.23 1.23 0 .69.53 1.23 1.23 1.23.7 0 1.23-.54 1.23-1.23C13.23 18.56 12.7 18 12 18z"></path>
                    </svg>
                    <span class="ml-3">SDGs</span>
                </a>
                <!-- Add more menu items -->
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
                        <button class="flex items-center text-sm focus:outline-none">
<!--                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwzNjUyOXwwfDF8c2VhcmNofDF8fHVzZXIlMjBhdiVDMyVBQXRhcnxlbnwwfHx8fDE2MTg1ODUyNDc&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Avatar">-->
                            <span class="ml-2">Administrator</span>
                        </button>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <div class="border-4 border-dashed border-gray-300 rounded-lg h-96"></div>
            </main>
        </div>
    </div>


</template>

<script lang="ts" setup>
import { ref } from 'vue'
import { Menu as IconMenu, Message, Setting } from '@element-plus/icons-vue'
import Header from "./Header.vue";
import Footer from "./Footer.vue";

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
