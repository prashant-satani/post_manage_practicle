## About

1. Post Management
    - Allow user create new posts with the following fields: name, image, and tags.
    - Tags should be pre-uploaded into the database. When selecting tags for a new post, ensure that each tag can only be used once across all posts.

2. Home
    - Display a random set of 5 posts at a time.
    - Provide a "New Posts" button that, when clicked, displays a new set of random posts and hides the previous set.
    - Ensure no posts are repeated until all posts have been displayed. If all posts have been displayed, show a message indicating that there are no new posts.

## Setup Steps

install dependency using composer & npm

```bash
composer install
npm run dev
```

Create database and config in .env

Migrate tables into database

```bash
php artisan migrate
```

Seed default user Or register new from web

```bash
php artisan db:seed --class=UserSeeder
```

Seed other default data (Tags, ...)
```bash
php artisan db:seed
```

Create symbolic link for file upload to local drivers

```bash
php artisan storage:link
```

Start server 

```bash
php artisan serve
```
