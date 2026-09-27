# ImpactPath — The Life Project

A Laravel 12 + Vue 3 + Inertia.js + MySQL career-growth prototype for TASK 10.

**Project story:** Problem → Research → Idea → Execution → Real-world test → Result → Learning → Future plan.

## Submission files

- [Project report](docs/LIFE_PROJECT_REPORT.md)
- [Presentation script and slide content](docs/TASK10_PRESENTATION.md)
- [Real user-testing data template](docs/USER_TESTING_SHEET.csv)

## Requirements

- PHP 8.2+, Composer
- Node.js 20+, npm
- MySQL 8+

## Install (Windows / XAMPP)

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
```

Create a MySQL database named `impactpath`. Set `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env`, then:

```powershell
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

In a second terminal, run `npm run dev` while developing. Open `http://127.0.0.1:8000`.

### Demo login

- Email: `demo@impactpath.test`
- Password: `password`

This seeded credential is for local demonstration only. Change it before any public deployment.

## What is implemented

- Dashboard with real-evidence status and impact metrics
- Research evidence create, edit and delete
- Prototype feedback capture
- Timed usability-test capture and result calculations
- Future plan and agency/career benefit mapping
- Authenticated project routes and server-side validation
- Legacy demo fixtures are removed during seeding and excluded from real outcome metrics

## Important evidence status

Real-person testing has not been completed in this repository. No sample participant or test results are seeded; any legacy demo rows are removed by the seeder and excluded from calculations. Follow the protocol in the report, use anonymous participant codes, get consent, run at least five sessions, and replace the pending result fields in the report and presentation.

## Database changes

`php artisan migrate --seed` creates the database schema and demo workspace. On an existing database, run `php artisan migrate` to add the demo-evidence flags; the migration identifies the existing seeded demo participant rows.
