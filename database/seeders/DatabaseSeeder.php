<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\ResearchItem;
use App\Models\User;
use App\Models\UserTest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'demo@impactpath.test'], ['name' => 'Kaniz Fatima', 'password' => 'password']);

        ResearchItem::firstOrCreate(['title' => 'Early-career developer pain points'], ['source_type' => 'Interview synthesis (planned)', 'summary' => 'Working problem hypothesis: unclear learning priorities, scattered portfolio evidence and weak feedback loops.', 'finding' => 'Validate whether people want one place to turn goals into small actions and measure progress.', 'impact' => 'Defines the MVP hypothesis; this record is not a completed interview.']);
        ResearchItem::firstOrCreate(['title' => 'Career development workflow'], ['source_type' => 'Desk research (to complete)', 'summary' => 'Research task: review credible career-development and goal-setting sources, recording URLs and publication dates.', 'finding' => 'No external finding is claimed until sources have been reviewed and cited.', 'impact' => 'Research evidence must be added before final presentation.']);
        ResearchItem::firstOrCreate(['title' => 'Prototype usability hypothesis'], ['source_type' => 'Hypothesis', 'summary' => 'Users should understand their next action in under one minute.', 'finding' => 'Test this with timed, observed sessions and record task success and errors.', 'impact' => 'Shapes the dashboard hierarchy and usability test plan.']);

        Feedback::where('is_demo', true)->delete();
        UserTest::where('is_demo', true)->delete();
    }
}
