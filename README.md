## About

1. Post Management
    - Allow user create new posts with the following fields: name, image, and tags.
    - Tags should be pre-uploaded into the database. When selecting tags for a new post, ensure that each tag can only be used once across all posts.

2. Home
    - Display a random set of 5 posts at a time.
    - Provide a "New Posts" button that, when clicked, displays a new set of random posts and hides the previous set.
    - Ensure no posts are repeated until all posts have been displayed. If all posts have been displayed, show a message indicating that there are no new posts.

## Technology Info
- PHP : 8.1
- MySql : 8.0
- Node : 16.*

## Setup Steps

install dependency using composer

```bash
composer install
```

Create .env from sample file .env.example

Key generate using command

```bash
php artisan key:generate
```

Migrate tables into database

```bash
php artisan migrate
```

Seed default user Or register new from web

```bash
php artisan db:seed --class=UserSeeder

#username : test@example.com
#password : password
```

Seed other default data (Tags, ...)
```bash
php artisan db:seed
```

Create symbolic link for file upload to local drivers

```bash
php artisan storage:link
```

Generate assets using vite

```bash
npm install
npm run build
```

Start server 

```bash
php artisan serve
```
