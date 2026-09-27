# TASK 10 — THE LIFE PROJECT
## ImpactPath: a measurable career-growth workspace

**Student:** Kaniz Fatima  
**Stack:** Laravel 12, Vue 3, Inertia.js, MySQL  
**Project type:** Digital product / career project  
**Evidence status:** Prototype implemented; real participant testing and outcome measurement are pending.

> **Submission integrity:** No sample participant feedback or test results are seeded now. Older installations may have legacy demo rows; running the seeder removes rows marked as demo while preserving real sessions. No real-user result is claimed in this report. Replace the pending fields after running the sessions described below.

## 1. Problem

Early-career developers may keep learning goals, practice notes, portfolio evidence and feedback in separate places. The project hypothesis is that this fragmentation makes it harder to choose a next step and show progress. This is a hypothesis to validate with target users, not a proven finding about all developers.

**Target users:** students and early-career developers who are actively building job-ready skills.  
**Problem statement:** How might we help an early-career developer turn a career goal into a small action, retain evidence of progress, and learn from feedback in one focused workflow?

## 2. Research

### Secondary research

- Locke and Latham review goal-setting theory and the role of goals and feedback in task motivation. This supports testing a workflow that joins a clear goal to feedback; it does not prove that this specific app will improve career outcomes. [American Psychologist, 2002](https://doi.org/10.1037/0003-066X.57.9.705)
- Hattie and Timperley synthesize research on feedback and explain that feedback effects depend on its content and context. ImpactPath therefore captures a participant's task observation and suggested change rather than treating a rating alone as sufficient. [Review of Educational Research, 2007](https://doi.org/10.3102/003465430298487)
- Nielsen's five-user article is a practical usability-testing argument for small iterative rounds, not a statistically representative sample size or proof of product impact. This project will begin with five sessions, fix the highest-severity issues, and repeat with another round if feasible. [Nielsen Norman Group, 2000](https://www.nngroup.com/articles/why-you-only-need-to-test-with-5-users/)

### Primary research to complete

Conduct at least five short interviews/usability sessions with people in the target group. Record each participant with an anonymous code (P01–P05), date, role category, consent, current workflow, biggest friction, and a verbatim or accurately summarized observation. Do not identify participants in the presentation. Add each reviewed source and interview synthesis in Research; the initial seeded research cards explicitly mark planned work and hypotheses.

### Research questions

1. Where do participants currently keep career goals, learning notes and portfolio evidence?
2. Which step is hardest to repeat weekly, and what do they use as evidence of progress?
3. Can they find a useful next action in this prototype without help?
4. What information or workflow would make them return next week?

## 3. Idea

ImpactPath is a lightweight workspace that connects **goal → action → evidence → feedback → reflection**. The MVP prioritizes capturing research, recording feedback, timing a task, and calculating outcomes. Reminders, AI suggestions and portfolio integrations are deferred until user evidence supports them.

## 4. Execution

- Laravel handles routing, validation, authentication and persistence.
- MySQL stores users, research records, participant feedback and timed tests through Eloquent models and migrations.
- Vue 3 and Inertia.js provide the dashboard, research CRUD, prototype feedback form, test results and future plan.
- Authenticated routes protect project data. Legacy demo fixtures carry an explicit `is_demo` flag, are removed when seeding, and are filtered out of result calculations.
- Metrics include task success, aggregate time change, average feedback rating and stated intention to continue.

## 5. Real-world test protocol

Recruit five students or early-career developers. Get consent; use anonymous participant codes. Give each person the same tasks and avoid coaching unless they are stuck. Record the current/manual workflow first, then the prototype workflow. Ask short follow-up questions after the task.

**Tasks:**

1. Explain how you currently choose your next career-learning action.
2. Use the prototype to identify or create one next action for a seven-day goal.
3. Find where you would record a learning outcome or feedback.
4. Explain what you would do next after completing the action.

**For each timed task, capture:** participant code, date, task, baseline minutes, prototype minutes, completion (yes/no), errors or help needed, observed friction, and participant comment. Collect the 1–5 rating and “would you continue?” answer separately. A failed task is still a valid result; do not omit it.

## 6. Result — pending real-world sessions

The current database has **zero real participants and zero real timed tests**. The dashboard therefore reports zero for real-user impact. After five sessions, replace this section with:

| Measure | Result to enter after testing |
|---|---|
| Participants and sessions | Pending — target: 5 people |
| Task completion | Pending — successful tasks / attempted tasks |
| Median time change | Pending — report per task, including negative changes |
| Errors/help required | Pending — summarize recurring issues |
| Average feedback rating | Pending — n and mean out of 5 |
| Would continue | Pending — yes / total responses |
| Top 3 changes requested | Pending — based on observed sessions |

The app's time-change percentage uses `(total baseline minutes − total prototype minutes) / total baseline minutes × 100`. A negative value means the prototype took longer. Interpret a five-person usability round as formative feedback, not statistically representative proof or evidence of long-term career impact.

## 7. Learning and iteration

No user-derived learning can be claimed before sessions. The current implementation learning is that measurement needs explicit separation of demo and real evidence, and that usability observations need to be stored alongside task timings. After testing, rank issues by how many participants encountered them and their severity; fix the top two; then retest those tasks. Record each change and its reason in Research.

## 8. Future plan — YES, with a validation gate

I would continue after the internship because this product can become both a personal career tool and a reusable evidence workflow. I will invest in the next iteration if participants can complete the core workflow and the feedback shows a recurring need. If fewer than three of five participants understand the next action, or the prototype makes the workflow slower without a clear benefit, I will narrow or redesign it before adding features.

**30 days:** complete five sessions, fix the two most frequent usability issues, and rerun the affected tasks.  
**90 days:** only if validation supports it, add weekly plans and portfolio export; measure repeat use with an opt-in follow-up.  
**Later:** assess reminders, peer review or AI-assisted suggestions only after users request them and privacy implications are reviewed.

## 9. Measurable benefit

**Agency / The Growth Society BD:** the same evidence flow could be adapted to internal automation experiments. A pilot could track experiments run, baseline and new task time, completion rate, and documented decision. No agency productivity gain is claimed until a real pilot is measured. Proposed first measure: compare the time needed to document and review five experiments before and after using the workflow.

**Career:** the repository demonstrates a full-stack Laravel/Vue/MySQL product, relational data design, validation, authentication, research synthesis, user-test instrumentation and evidence-based iteration. Measurable portfolio outputs are the deployed/demoable MVP, five completed sessions, a documented iteration, and a presentation with transparent metrics.

## 10. Submission checklist

- [ ] Replace planned research with reviewed sources and five participant sessions.
- [ ] Keep participant identities anonymous and get consent before recording.
- [ ] Enter real feedback and timed tests; verify demo rows remain excluded.
- [ ] Update the result table and slides with real counts, outcomes and limitations.
- [ ] Capture screenshots from the actual prototype and a short demo recording.
- [ ] Share the repository and presentation with the internship reviewer.

See [TASK10_PRESENTATION.md](TASK10_PRESENTATION.md) for the slide-by-slide presentation and [USER_TESTING_SHEET.csv](USER_TESTING_SHEET.csv) for a session data template.
