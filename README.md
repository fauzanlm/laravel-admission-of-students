
# Admission of students

Welcome to our groundbreaking Student Admission Web Application, a dynamic platform meticulously engineered to modernize and optimize the enrollment journey for educational institutions. With a harmonious fusion of cutting-edge features, our solution empowers institutions to effortlessly navigate every stage of the enrollment process, from the initial registration phase to the culminating enrollment payment step.


## Features

- **Efficient Registration :** Simplified steps guide applicants seamlessly.
- **Digital Document Submission :** Securely upload all required documents.
- **Virtual Interviews :** Conduct interviews remotely, enhancing accessibility.
- **Convenient Payment :** Streamline enrollment payments with multiple options.

## Screenshoots

![ppdb-img-1](https://github.com/fauzanlm/laravel-admission-of-students/assets/70043864/7e51eabc-3ce4-46cc-8605-891533545958)
![ppdb-img-2](https://github.com/fauzanlm/laravel-admission-of-students/assets/70043864/1ff85e58-f6b3-41b4-b12a-35d2cd67e585)
![ppdb-img-3](https://github.com/fauzanlm/laravel-admission-of-students/assets/70043864/14f691a4-549a-4046-bfaa-c1d1fddc7779)
![ppdb-img-4](https://github.com/fauzanlm/laravel-admission-of-students/assets/70043864/a443716f-a14e-4f7d-91d5-11287f719b03)


## Tech Stack

**Framework:** Laravel, Tailwindcss

**Database:** MySQL or sqlite


## Run Locally


[Download .zip file](https://github.com/fauzanlm/laravel-admission-of-students/archive/refs/heads/main.zip) and extract to your folder

OR

Clone the project


```bash
  cd your-folder
  git clone https://github.com/fauzanlm/laravel-admission-of-students.git
```

Go to the project directory

```bash
  cd laravel-admission-of-students
```

Install Packages

```bash
  composer install
```
Copy .env.example to .env

```bash
  cp .env.example .env
```
Generate AppKey

```bash
  php artisan key:generate
```

Create a new database your-database-name
Open .env on your code editor and set the .env database config

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=root
DB_PASSWORD=
```

Migrate project to generate table

```bash
  php artisan migrate
```
After creating a table, we'll seeding database, run seed command

```bash
  php artisan db:seed
```
Run project

```bash
  php artisan serve
```

open your project locally : http://localhost/8000 (port and host adjust)


## Authors

- [@fauzanlm](https://www.github.com/fauzanlm)


