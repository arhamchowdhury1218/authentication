<script setup>
import { reactive } from "vue";
import axios from "axios";

const form = reactive({
  type: "Full-Time",
  title: "",
  description: "",
  salary: "",
  location: "",
  company: {
    name: "",
    description: "",
    contactEmail: "",
    contactPhone: "",
  },
});

// Function to reset the form
const resetForm = () => {
  form.type = "Full-Time";
  form.title = "";
  form.description = "";
  form.salary = "";
  form.location = "";
  form.company.name = "";
  form.company.description = "";
  form.company.contactEmail = "";
  form.company.contactPhone = "";
};

// Handle form submission
const handleSubmit = async () => {
  try {
    const response = await axios.post("http://localhost:8000/api/jobs", {
      type: form.type,
      title: form.title,
      description: form.description,
      salary: form.salary,
      location: form.location,
      company_name: form.company.name,
      company_description: form.company.description,
      contact_email: form.company.contactEmail,
      contact_phone: form.company.contactPhone,
    });

    console.log("Job added successfully:", response.data);
    // Reset the form
    resetForm();
  } catch (error) {
    console.error("Error adding job:", error.response.data);
  }
};
</script>

<template>
  <section class="bg-gray-100">
    <div class="container m-auto max-w-2xl py-24">
      <div class="bg-white px-6 py-8 shadow-md rounded-md border">
        <form @submit.prevent="handleSubmit">
          <h2 class="text-3xl text-center font-semibold mb-6">Add Job</h2>

          <!-- Job Type Selection -->
          <div class="mb-4">
            <label for="type" class="block text-gray-700 font-bold mb-2"
              >Job Type</label
            >
            <select
              v-model="form.type"
              id="type"
              name="type"
              class="border rounded w-full py-2 px-3"
              required
            >
              <option value="Full-Time">Full-Time</option>
              <option value="Part-Time">Part-Time</option>
              <option value="Remote">Remote</option>
              <option value="Internship">Internship</option>
            </select>
          </div>

          <!-- Job Title Input -->
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2"
              >Job Listing Name</label
            >
            <input
              type="text"
              v-model="form.title"
              id="name"
              name="name"
              class="border rounded w-full py-2 px-3 mb-2"
              required
            />
          </div>

          <!-- Job Description Input -->
          <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2"
              >Description</label
            >
            <textarea
              id="description"
              v-model="form.description"
              name="description"
              class="border rounded w-full py-2 px-3"
              rows="4"
            ></textarea>
          </div>

          <!-- Salary Selection -->
          <div class="mb-4">
            <label for="salary" class="block text-gray-700 font-bold mb-2"
              >Salary</label
            >
            <select
              id="salary"
              v-model="form.salary"
              name="salary"
              class="border rounded w-full py-2 px-3"
              required
            >
              <option value="Under $50K">Under $50K</option>
              <option value="$50K - $60K">$50K - $60K</option>
              <option value="$60K - $70K">$60K - $70K</option>
              <option value="$70K - $80K">$70K - $80K</option>
              <option value="$80K - $90K">$80K - $90K</option>
              <option value="$90K - $100K">$90K - $100K</option>
              <option value="$100K - $125K">$100K - $125K</option>
              <option value="$125K - $150K">$125K - $150K</option>
              <option value="$150K - $175K">$150K - $175K</option>
              <option value="$175K - $200K">$175K - $200K</option>
              <option value="Over $200K">Over $200K</option>
            </select>
          </div>

          <!-- Location Input -->
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Location</label>
            <input
              type="text"
              v-model="form.location"
              id="location"
              name="location"
              class="border rounded w-full py-2 px-3 mb-2"
              placeholder="Company Location"
              required
            />
          </div>

          <h3 class="text-2xl mb-5">Company Info</h3>

          <!-- Company Name Input -->
          <div class="mb-4">
            <label for="company" class="block text-gray-700 font-bold mb-2"
              >Company Name</label
            >
            <input
              type="text"
              v-model="form.company.name"
              id="company"
              name="company"
              class="border rounded w-full py-2 px-3"
              placeholder="Company Name"
            />
          </div>

          <!-- Company Description Input -->
          <div class="mb-4">
            <label
              for="company_description"
              class="block text-gray-700 font-bold mb-2"
              >Company Description:totototo</label
            >
            <textarea
              id="company_description"
              v-model="form.company.description"
              name="company_description"
              class="border rounded w-full py-2 px-3"
              rows="4"
              placeholder="What does your company do?"
            ></textarea>
          </div>

          <!-- Contact Email Input -->
          <div class="mb-4">
            <label
              for="contact_email"
              class="block text-gray-700 font-bold mb-2"
              >Contact Email</label
            >
            <input
              type="email"
              v-model="form.company.contactEmail"
              id="contact_email"
              name="contact_email"
              class="border rounded w-full py-2 px-3"
              placeholder="Email address for applicants"
              required
            />
          </div>

          <!-- Contact Phone Input -->
          <div class="mb-4">
            <label
              for="contact_phone"
              class="block text-gray-700 font-bold mb-2"
              >Contact Phone</label
            >
            <input
              type="tel"
              id="contact_phone"
              v-model="form.company.contactPhone"
              name="contact_phone"
              class="border rounded w-full py-2 px-3"
              placeholder="Optional phone for applicants"
            />
          </div>

          <!-- Submit Button -->
          <div>
            <button
              class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full w-full focus:outline-none"
              type="submit"
            >
              Add Job
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* You can add your custom styles here if needed */
</style>
