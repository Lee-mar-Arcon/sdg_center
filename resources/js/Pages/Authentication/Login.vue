<template>
    <div class="flex items-center justify-center min-h-screen w-screen bg-gray-100">
      <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>
        
        <form @submit.prevent="submit">
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
              v-model="form.email"
              type="email"
              id="email"
              required
              class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
            <p class="text-red-400" v-if="form.errors.email">{{ form.errors.email }}</p>
          </div>
  
          <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input
              v-model="form.password"
              type="password"
              id="password"
              required
              class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
            <p class="text-red-400" v-if="form.errors.password">{{ form.errors.password }}</p>
          </div>
  
          <button
            type="submit"
            class="w-full py-2 mt-6 font-semibold text-white bg-indigo-600 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
          >
            Log In
          </button>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import {useForm} from '@inertiajs/vue3'


  const form = useForm({
    email: null,
    password: null,
  })

  function submit(){
    console.log(form);
    form.post(route('login.store'), {
        onError: (e) => console.log(e),
        preserveState: true,
    })
  }
  </script>
  