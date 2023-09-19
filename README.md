### Weather Lampung API

## Configuration

    * cp .env.example .env
    * composer install
    * php artisan key:generate
    * php artisan serve
---

## Weather API Documentation

### Base URL
Semua URL yang disebutkan di bawah ini harus ditambahkan ke base URL API:

```
http://http://127.0.0.1:8000/api/v1/
```

### Get Weather Data

- **Endpoint**: `/weather`
- **Method**: `GET`
- **Description**: Mendapatkan seluruh data cuaca.

**Example Request**

```
GET http://http://127.0.0.1:8000/api/v1/weather
```

---

### Get High Temperature Weather Data (Di atas 30 derajat Celsius)

- **Endpoint**: `/weather-high`
- **Method**: `GET`
- **Description**: Mendapatkan data cuaca dengan suhu di atas 30 derajat Celsius.

**Example Request**

```
GET http://http://127.0.0.1:8000/api/v1/weather-high
```

---

### Get Low Temperature Weather Data (Di bawah 30 derajat Celsius)

- **Endpoint**: `/weather-low`
- **Method**: `GET`
- **Description**: Mendapatkan data cuaca dengan suhu di bawah 30 derajat Celsius.

**Example Request**

```
GET http://http://127.0.0.1:8000/api/v1/weather-low
```

---

### Get Standard Temperature Weather Data (Tepat 30 derajat Celsius)

- **Endpoint**: `/weather-standard`
- **Method**: `GET`
- **Description**: Mendapatkan data cuaca dengan suhu tepat 30 derajat Celsius.

**Example Request**

```
GET http://http://127.0.0.1:8000/api/v1/weather-standard
```

---


