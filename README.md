# Shacho

Laravel 12 (PHP 8.4+) · Vue 3 + Inertia.js + Tailwind CSS · PostgreSQL · Redis + Horizon

## Stack

| Couche | Choix |
|---|---|
| Back-end | Laravel 12, PHP 8.4 |
| Front-end | Vue 3 + Inertia.js + Tailwind CSS |
| Base de données | PostgreSQL |
| Queues/cache | Redis + Laravel Horizon |
| IA | API Anthropic (Claude) |
| Emails | Resend |
| Paiement | Stripe (Cashier) |
| Monitoring | Sentry |

## Setup

```bash
cp .env.example .env   # already done for local dev, adjust secrets
docker compose up -d   # Postgres + Redis
composer install
npm install
php artisan key:generate
php artisan migrate
npm run dev
```

Fill in `.env` secrets before using the related service: `RESEND_KEY`, `STRIPE_KEY`/`STRIPE_SECRET`/`STRIPE_WEBHOOK_SECRET`, `ANTHROPIC_API_KEY`, `SENTRY_LARAVEL_DSN`.

## Queues (Horizon)

```bash
php artisan horizon
```

Dashboard at `/horizon` (add auth gate in `App\Providers\HorizonServiceProvider` before deploying).

## Nightly resolution

Scheduler entry point is `routes/console.php`. Register the nightly job there and ensure the server cron runs `php artisan schedule:run` every minute, with a healthcheck ping (e.g. Sentry Cron Monitor or a dead man's switch) wrapping the job.
