# Coffee Website
A full-fledged Café website that handles orders, customer registration, product management, and transactions.

## Built With
Framework: Laravel
## Installation
To run this project locally, you will need to have [Composer](https://getcomposer.org/) installed.

Steps:
### 1.Clone the Repository
Clone the project to your local machine:
```bash
   git clone https://github.com/FahmiKamarul/Coffee.git
```

### 2.Install Dependencies
Navigate to the project directory and install the required dependencies via Composer:
```bash
   composer install
```

### 3.Copy .env File
Copy the .env.example file to create your own .env file:
```bash
    cp .env.example .env
```

### 4.Generate Application Key
Create a new application key for the project:
```bash
   php artisan key:generate
```

### 5.Run Migrations
Migrate the database tables:
```bash
   php artisan migrate
```

### 6.Serve the Application
Start the local development server:
```bash
   php artisan serve
```


## Default Admin Login

email   :admin@example.com <br>
password:password123
