import { createApp } from 'vue';
import App from './App.vue';
import router from './router'; // Adjust the path as needed
import './index.css'
import axios from 'axios';



// Assuming you store your token in localStorage after login
const token = localStorage.getItem('token'); 
if (token) {
  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}
const app = createApp(App);
app.use(router);
app.mount('#app');
