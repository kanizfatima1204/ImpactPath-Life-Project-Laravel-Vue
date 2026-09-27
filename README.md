# ImpactPath — The Life Project

A Laravel 12 + Vue 3 + Inertia.js + MySQL career-impact platform created for TASK 10.

## Core story
Problem → Research → Idea → Execution → Real-world Test → Result → Learning → Future Plan

## Requirements
- PHP 8.2+
- Composer
- Node.js 20+
- MySQL 8+

## Installation (XAMPP / Windows)
```bash
git clone <your-repository-url>
cd impactpath
composer install
copy .env.example .env
php artisan key:generate
```

Create a MySQL database named `impactpath`, then verify `.env`:
```env
DB_DATABASE=impactpath
DB_USERNAME=root
DB_PASSWORD=
```

Run:
```bash
php artisan migrate --seed
npm install
npm run dev
```
In another terminal:
```bash
php artisan serve
```

Open `http://127.0.0.1:8000`.

### Demo login
- Email: `demo@impactpath.test`
- Password: `password`

## Main modules
- Dashboard — project journey and impact metrics
- Research — evidence records and product impact
- Prototype — participant feedback capture
- Results — timed usability tests and automatic metrics
- Future Plan — post-internship continuation and agency/career benefit

## Important submission note
The seed database contains clearly labelled DEMO DATA so the UI is immediately usable. Before final submission, replace the demo participant rows with actual user-test evidence and include real screenshots/video.

## Validation
Run:
```bash
php artisan test
npm run build
```

## Report
See `docs/LIFE_PROJECT_REPORT.md`.
