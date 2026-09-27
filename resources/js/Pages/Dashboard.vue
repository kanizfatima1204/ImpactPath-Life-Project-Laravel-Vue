<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
import StatCard from '../Components/StatCard.vue';
import SectionTitle from '../Components/SectionTitle.vue';
import { Target, FlaskConical, Users, Clock3, ArrowUpRight, CheckCircle2 } from 'lucide-vue-next';
defineProps({ metrics: Object, demo_records: Number });
</script>
<template>
  <AppLayout>
    <SectionTitle eyebrow="01 · IMPACT DASHBOARD" title="Evidence at a glance" description="A single workspace connecting the assignment journey from problem discovery to measurable outcome.">
      <span :class="['badge', metrics.evidence_status === 'real' ? 'purple' : '']">{{ metrics.evidence_status === 'real' ? 'REAL EVIDENCE RECORDED' : 'REAL TESTING PENDING' }}</span>
    </SectionTitle>
    <div class="stats-grid">
      <StatCard label="Research items" :value="metrics.research" hint="Evidence captured" :icon="FlaskConical"/>
      <StatCard label="Participants" :value="metrics.participants" hint="Real feedback/test participants" :icon="Users"/>
      <StatCard label="Time saved" :value="metrics.time_saved+' min'" hint="Across real recorded tests" :icon="Clock3"/>
      <StatCard label="Avg. rating" :value="metrics.avg_rating+'/5'" hint="Real prototype feedback" :icon="Target"/>
    </div>
    <div class="dashboard-grid">
      <div class="panel journey"><div class="panel-head"><div><span class="eyebrow">PROJECT JOURNEY</span><h3>From idea to evidence</h3></div><ArrowUpRight :size="20"/></div>
        <div class="journey-list">
          <div class="journey-item done"><i>01</i><div><b>Problem identified</b><span>Career growth feels fragmented and difficult to measure.</span></div><CheckCircle2/></div>
          <div class="journey-item"><i>02</i><div><b>Research in progress</b><span>Replace hypotheses with dated, cited interview and desk-research evidence.</span></div><ArrowUpRight/></div>
          <div class="journey-item active"><i>03</i><div><b>Prototype ready to test</b><span>Feedback and timed task tests can be captured in this app.</span></div><span class="live">READY</span></div>
          <div class="journey-item"><i>04</i><div><b>Improve + repeat</b><span>Use real evidence to prioritize the next product iteration.</span></div></div>
        </div>
      </div>
      <div class="panel impact-card"><span class="eyebrow">MEASURED IMPACT · REAL DATA</span><div class="big-number">{{metrics.time_saved_pct}}%</div><h3>prototype time reduction</h3><p>{{ metrics.tests ? 'Calculated from real manual vs prototype task durations.' : 'Real usability test results will appear here after you record sessions.' }}</p><div class="meter"><span :style="{width:Math.max(0,Math.min(100,metrics.time_saved_pct))+'%'}"></span></div><small>Validation target: at least 20% time reduction, with task success reported alongside it.</small></div>
    </div>
  </AppLayout>
</template>
