<script setup>
import { ref } from "vue";
import axios from "axios";
import router from "@/router";
const email = ref("");
const password = ref("");
const errorMessage = ref("");

const handleSubmit = async () => {
  try {
    const response = await axios.post("http://localhost:8000/api/login", {
      email: email.value,
      password: password.value,
    });

    // Store the Bearer token in local storage
    localStorage.setItem("token", response.data.token);

    // // Set the Authorization header for future requests
    // axios.defaults.headers.common[
    //   "Authorization"
    // ] = `Bearer ${response.data.token}`;

    // Redirect to Dashboard after successful login
    router.push("/dashboard");
  } catch (error) {
    if (error.response) {
      errorMessage.value = error.response.data.message || "Login failed.";
    } else {
      errorMessage.value = "Server error. Please try again later.";
    }
  }
};
</script>

<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold text-center text-gray-700">Sign In</h2>
      <form @submit.prevent="handleSubmit">
        <div class="mt-6">
          <label
            for="email"
            class="block mb-2 text-sm font-medium text-gray-600"
            >Email:</label
          >
          <input
            type="email"
            id="email"
            v-model="email"
            required
            placeholder="Enter your email"
            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-green-200"
          />
        </div>

        <div class="mt-4">
          <label
            for="password"
            class="block mb-2 text-sm font-medium text-gray-600"
            >Password:</label
          >
          <input
            type="password"
            id="password"
            v-model="password"
            required
            placeholder="Enter your password"
            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-green-200"
          />
        </div>

        <button
          type="submit"
          class="w-full mt-6 p-2 text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-200"
        >
          Sign In
        </button>
      </form>

      <p v-if="errorMessage" class="mt-4 text-red-600 text-sm text-center">
        {{ errorMessage }}
      </p>
    </div>
  </div>
</template>
  

  
  <style scoped>
</style>
  