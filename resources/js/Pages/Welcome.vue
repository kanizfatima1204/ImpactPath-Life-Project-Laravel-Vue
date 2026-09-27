<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { ArrowRight, Target, Users, Gauge, Sparkles } from 'lucide-vue-next';

const props = defineProps({ authenticated: Boolean });
const email = ref('demo@impactpath.test');
const password = ref('password');
const loading = ref(false);

const login = () => {
  loading.value = true;
  router.post('/login', { email: email.value, password: password.value }, { onFinish: () => { loading.value = false; } });
};

const openPrototype = () => {
  if (props.authenticated) {
    router.visit('/dashboard');
    return;
  }
  email.value = 'demo@impactpath.test';
  password.value = 'password';
  login();
};
</script>

<template>
  <div class="landing">
    <div class="landing-nav">
      <div class="brand"><div class="brand-mark">IP</div><div><b>ImpactPath</b><span>Life Project</span></div></div>
      <div class="nav-pill">Laravel 12 · Vue 3 · MySQL</div>
    </div>
    <div class="hero">
      <div class="hero-copy">
        <div class="kicker"><Sparkles :size="16"/> A career project designed for measurable impact</div>
        <h1>Turn career uncertainty into <em>evidence of progress.</em></h1>
        <p>ImpactPath helps early-career developers define goals, capture research, test a prototype with real people and measure whether the solution creates meaningful time and outcome gains.</p>
        <div class="hero-actions">
          <button class="primary-btn" type="button" :disabled="loading" @click="openPrototype">{{ loading ? 'Opening…' : 'Open prototype' }} <ArrowRight :size="17"/></button>
          <a href="#how" class="secondary-btn">See the method</a>
        </div>
        <div class="proof-row"><div><b>01</b><span>Problem</span></div><div><b>02</b><span>Research</span></div><div><b>03</b><span>Test</span></div><div><b>04</b><span>Measure</span></div></div>
      </div>
      <div class="login-card" id="login">
        <div class="login-orb"></div><span class="eyebrow">DEMO ACCESS</span><h2>Enter the workspace</h2>
        <p>Use the seeded account to review the complete prototype.</p>
        <label>Email<input v-model="email" type="email" autocomplete="username"></label>
        <label>Password<input v-model="password" type="password" autocomplete="current-password"></label>
        <button class="primary-btn full" type="button" :disabled="loading" @click="login">{{ loading ? 'Opening…' : 'Open ImpactPath' }} <ArrowRight :size="17"/></button>
        <small>demo@impactpath.test · password</small>
      </div>
    </div>
    <div class="feature-strip" id="how">
      <div><Target/><b>Goal → action</b><span>Make the next step visible.</span></div>
      <div><Users/><b>Human feedback</b><span>Capture what real users say.</span></div>
      <div><Gauge/><b>Measured impact</b><span>Compare time, success and errors.</span></div>
    </div>
  </div>
</template>
