<template>
  <div class="login-container">
    <div class="login-card">
      <h2 class="login-title text-white">Admin Login</h2>
      
      <div v-if="Object.keys(form.errors).length > 0" class="error-messages">
        <ul>
          <li v-for="(error, key) in form.errors" :key="key">{{ error }}</li>
        </ul>
      </div>

      <form @submit.prevent="submit" class="login-form">
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" v-model="form.email" type="email" required autofocus />
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" v-model="form.password" type="password" required />
        </div>
        
        <div class="form-actions">
          <button type="submit" :disabled="form.processing">
            {{ form.processing ? 'Signing in...' : 'Sign In' }}
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  email: '',
  password: '',
});

const submit = () => {
  form.post('/login');
};
</script>

<style scoped>
.login-container {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.login-card {
  padding: 2.5rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  width: 100%;
  max-width: 400px;
}

.login-title {
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 1.5rem;
  text-align: center;
}

.error-messages {
  margin-bottom: 1rem;
  color: #ef4444;
  font-size: 0.875rem;
}

.error-messages ul {
  padding-left: 1.5rem;
  margin: 0;
}

.login-form {
  display: flex;
  flex-direction: column;
}

.form-group {
  margin-bottom: 1rem;
}

.form-group label {
  display: block;
  font-weight: 600;
  margin-bottom: 0.5rem;
  font-size: 0.875rem;
  color: white; 
}

.form-group input {
  width: 100%;
  padding: 0.5rem 0.75rem;
  border: 1px solid #d1d5db;
  border-radius: 4px;
  font-size: 1rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  box-sizing: border-box;
}

.form-group input:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
}

.form-actions {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 1rem;
}

.form-actions button {
  width: 100%;
  background-color: #3b82f6;
  color: #ffffff;
  font-weight: 700;
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 1rem;
  transition: background-color 0.15s ease-in-out;
}

.form-actions button:hover {
  background-color: #2563eb;
}

.form-actions button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}
</style>
