<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
import SectionTitle from '../Components/SectionTitle.vue';
import StatCard from '../Components/StatCard.vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Clock3, CheckCircle2, Users, Plus, Timer } from 'lucide-vue-next';

defineProps({ tests: Array, feedback: Array, metrics: Object, demo_records: Number });
const show = ref(false);
const form = ref({ participant_name: '', task: '', manual_minutes: 15, prototype_minutes: 8, success: true, error_count: 0, comments: '' });
const submit = () => router.post('/results/test', form.value, { onSuccess: () => { show.value = false; } });
</script>
<template>
  <AppLayout>
    <SectionTitle eyebrow="06 · RESULT" title="Measure what changed" description="Compare manual and prototype workflows, then use the evidence to decide what to improve next."><button class="primary-btn" @click="show = !show"><Plus :size="17"/> Add timed test</button></SectionTitle>
    <p class="session-note">Use participant codes (P01, P02), obtain consent, and record every attempt—including failed tasks.</p>
    <div class="stats-grid"><StatCard label="Success rate" :value="metrics.success_rate+'%'" hint="Real task completion" :icon="CheckCircle2"/><StatCard label="Time saved" :value="metrics.time_saved_pct+'%'" hint="Manual → prototype" :icon="Clock3"/><StatCard label="Avg. rating" :value="metrics.avg_rating+'/5'" hint="Real feedback" :icon="Users"/><StatCard label="Continue rate" :value="metrics.continue_rate+'%'" hint="Would use again" :icon="Timer"/></div>
    <div v-if="show" class="panel form-panel"><div class="form-grid"><label>Participant code<input v-model="form.participant_name" placeholder="P01"></label><label>Task<input v-model="form.task" maxlength="255"></label><label>Manual minutes<input v-model="form.manual_minutes" type="number" min="1" max="1440"></label><label>Prototype minutes<input v-model="form.prototype_minutes" type="number" min="1" max="1440"></label><label>Errors<input v-model="form.error_count" type="number" min="0"></label><label>Success<select v-model="form.success"><option :value="true">Yes</option><option :value="false">No</option></select></label><label class="full-field">Comments<textarea v-model="form.comments" maxlength="5000"></textarea></label></div><button class="primary-btn" @click="submit">Save timed test</button></div>
    <div class="results-grid"><div class="panel table-panel"><div class="panel-head"><div><span class="eyebrow">TIMED TESTS · {{ metrics.tests }} REAL SESSIONS</span><h3>Manual vs prototype</h3></div></div><div v-if="!tests.length" class="empty-state">No real timed tests yet. Run a session and add it here.</div><div v-else class="table-wrap"><table><thead><tr><th>Participant</th><th>Task</th><th>Manual</th><th>Prototype</th><th>Saved</th><th>Result</th></tr></thead><tbody><tr v-for="t in tests" :key="t.id"><td>{{t.participant_name}}</td><td>{{t.task}}</td><td>{{t.manual_minutes}}m</td><td>{{t.prototype_minutes}}m</td><td><b>{{t.manual_minutes-t.prototype_minutes}}m</b></td><td><span :class="['table-status',t.success?'ok':'bad']">{{t.success?'Success':'Needs work'}}</span></td></tr></tbody></table></div></div>
      <div class="panel feedback-list"><span class="eyebrow">QUALITATIVE SIGNAL</span><h3>What users said</h3><div v-if="!feedback.length" class="empty-state">No real feedback yet. Capture it in the Prototype section.</div><div v-for="f in feedback" :key="f.id" class="quote"><div class="quote-top"><b>{{f.participant_name}}</b><span>{{f.rating}}/5</span></div><p>“{{f.pain_point || 'No pain point recorded.'}}”</p><small>Suggestion: {{f.suggestion || 'Not recorded'}}</small></div></div>
    </div>
  </AppLayout>
</template>
