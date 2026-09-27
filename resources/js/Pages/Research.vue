<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
import SectionTitle from '../Components/SectionTitle.vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Plus, BookOpen, Lightbulb, ArrowRight, Pencil, Trash2, X } from 'lucide-vue-next';

const props = defineProps({ items: Array });
const show = ref(false);
const editingId = ref(null);
const emptyForm = () => ({ title: '', source_type: 'Interview', summary: '', finding: '', impact: '' });
const form = ref(emptyForm());
const edit = (item) => { editingId.value = item.id; form.value = { title: item.title, source_type: item.source_type, summary: item.summary, finding: item.finding, impact: item.impact ?? '' }; show.value = true; };
const reset = () => { show.value = false; editingId.value = null; form.value = emptyForm(); };
const submit = () => router.visit(editingId.value ? `/research/${editingId.value}` : '/research', { method: editingId.value ? 'put' : 'post', data: form.value, onSuccess: reset });
const remove = (item) => { if (window.confirm(`Delete “${item.title}”?`)) router.delete(`/research/${item.id}`); };
</script>

<template>
  <AppLayout>
    <SectionTitle eyebrow="02 · RESEARCH" title="Research that changes the product" description="Document what was learned, where it came from, and how it changed the solution.">
      <button class="primary-btn" @click="show = !show"><Plus :size="17"/> Add research</button>
    </SectionTitle>
    <div v-if="show" class="panel form-panel">
      <div class="panel-head"><h3>{{ editingId ? 'Edit research evidence' : 'Add research evidence' }}</h3><button class="icon-btn" aria-label="Close form" @click="reset"><X :size="18"/></button></div>
      <div class="form-grid">
        <label>Title<input v-model="form.title" maxlength="180" placeholder="e.g. Interview synthesis"></label>
        <label>Source type<input v-model="form.source_type" maxlength="100" placeholder="Interview / Survey / Desk research"></label>
        <label class="full-field">Summary<textarea v-model="form.summary" maxlength="5000"></textarea></label>
        <label class="full-field">Key finding<textarea v-model="form.finding" maxlength="3000"></textarea></label>
        <label class="full-field">Product impact<textarea v-model="form.impact" maxlength="3000"></textarea></label>
      </div>
      <button class="primary-btn" @click="submit">{{ editingId ? 'Update evidence' : 'Save evidence' }} <ArrowRight :size="16"/></button>
    </div>
    <div v-if="!items.length" class="panel"><h3>No research recorded yet</h3><p>Add a dated source, what it says, and the decision it informed.</p></div>
    <div class="research-grid">
      <article v-for="item in items" :key="item.id" class="research-card">
        <div class="panel-head"><div class="research-icon"><BookOpen :size="19"/></div><div class="card-actions"><button class="icon-btn" :aria-label="`Edit ${item.title}`" @click="edit(item)"><Pencil :size="16"/></button><button class="icon-btn" :aria-label="`Delete ${item.title}`" @click="remove(item)"><Trash2 :size="16"/></button></div></div>
        <div class="card-meta"><span>{{ item.source_type }}</span><span>Evidence #{{ String(item.id).padStart(2, '0') }}</span></div>
        <h3>{{ item.title }}</h3><p>{{ item.summary }}</p>
        <div class="finding"><Lightbulb :size="17"/><div><b>Finding</b><span>{{ item.finding }}</span></div></div>
        <div class="impact-line"><b>→ Product impact</b> {{ item.impact }}</div>
      </article>
    </div>
  </AppLayout>
</template>
