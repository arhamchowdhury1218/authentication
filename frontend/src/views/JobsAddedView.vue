<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const jobs = ref([]);

const fetchJobs = async () => {
  try {
    const response = await axios.get("http://localhost:8000/api/jobs/user");
    jobs.value = response.data;
  } catch (error) {
    console.error("Error fetching jobs:", error);
  }
};

onMounted(() => {
  fetchJobs();
});
</script>


<template>
  <section class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold mb-4">My Job Postings</h2>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
      <div
        v-for="job in jobs"
        :key="job.id"
        class="bg-white p-4 rounded-lg shadow"
      >
        <h3 class="text-xl font-bold">{{ job.title }}</h3>
        <p class="text-gray-700">{{ job.description }}</p>
        <p class="font-semibold">Type: {{ job.type }}</p>
        <p class="font-semibold">Salary: {{ job.salary }}</p>
        <p class="font-semibold">Location: {{ job.location }}</p>
        <p class="font-semibold">Company: {{ job.company_name }}</p>
      </div>
      <div
        v-if="jobs.length === 0"
        class="col-span-full text-center text-gray-500"
      >
        No job postings found.
      </div>
    </div>
  </section>
</template>
  

  
  <style scoped>
/* Add your custom styles here if needed */
</style>
  