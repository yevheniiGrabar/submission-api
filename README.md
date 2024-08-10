# Submit API

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yevheniiGrabar/submission-api.git
   ```
2.  **Install dependencies:**
    ```bash
    composer install
    ```
3. **Configure environment:**
    ```bash
   cp .env.example .env
    ```
4. **Run migrations:**
    ```bash
   php artisan migrate
    ```
5. **Start the queue worker:**
    ```bash
   php artisan queue:work
    ```
## Testing

**To run the tests for the API, execute:**

```bash
php artisan test
```

## API Endpoint

```bash
URL: POST /api/submit
```

**Payload Example:**
```bash 
{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}
```

**Description:**

The endpoint validates the input data (name, email, and message).
Upon successful validation, the data is dispatched to a job queue for processing.
The job will save the data to the submissions table and trigger an event upon successful completion.

## Example cURL Request

To test the API endpoint with cURL, use the following command:

```bash 
curl -X POST http://your-domain.com/api/submit \
-H "Content-Type: application/json" \
-d '{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}'
```
