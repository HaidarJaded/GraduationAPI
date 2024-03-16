# API Documentation

## Authentication


### 2. Login

- **Description:** Allows users to log in by providing their email and password.
- **Request:**
  - **Method:** POST
      - **URL:** `url/api/login`
  - **Body:**
    - `email`: [user_email]
    - `password`: [user_password]
  - **Authorization:** No Auth
- **Response:**
  - **Status:** 200 OK
  - **Body:**
    ```json
    {
        "message": "Successful",
        "body": {
            "auth": {
                "id": [user_id],
                "email": [user_email],
                "name": [user_name],
                "last_name": [user_last_name],
                "email_verified_at": [time_stamp],
                "rule_id": 1,
                "phone": [user_phone],
                "address": [user_address],
                "created_at": [time_stamp],
                "updated_at": [time_stamp]
            },
            "token": [user_token]
        }
    }
    ```
    ---

## Authenticated Routes

### Show User
- **Request:**
  - **Method:** GET
  - **URL:** `url//api/users/{id}/{with}`
- **Middleware:** `auth:sanctum`
- **Parameters:**
  - `{id}`: User ID (integer)
  - `{with}`: Additional related data to include ('completed_devices','devices','permissions','orders')
- **Description:** Retrieve details about a specific user with his related data.

### Get all users

- **Description:** Retrieves a list of all users from the server and the columns name send as  parameters to filtering data.
- **Request:**
  - **Method:** GET
  - **URL:** `url/api/users?{column_name}={column_value}&{column_name}={column_value}`
  - **Example URL:** `url/api/users?name=hhh&email=@example`
  - **Query Parameters:**
    - `[column1_name]`: value
    - `[column2_name]`: value
  - **Authorization:** Bearer Token
- **Response:**
  - **Status:** 200 OK
  - **Body:**
    ```json
    {
        "message": "Successful",
        "body": [
            {
                "id": 2,
                "email": "nkautzer@example.net",
                "name": "hhh",
                "last_name": "Muller",
                "email_verified_at": "2024-03-14T19:36:35.000000Z",
                "rule_id": null,
                "phone": null,
                "address": null,
                "created_at": "2024-03-14T19:36:35.000000Z",
                "updated_at": "2024-03-15T11:28:46.000000Z"
            }
        ]
    }
    ```


### 3. Registering user

- **Description:** Creates a new user.
- **Request:**
  - **Method:** POST
      - **URL:** `url/api/users`
  - **Body:**
    - `email`: [user_email]
    - `name`: [user_name]
    - `last_name`: [user_last_name]
    - `password`: #123456789H
    - `password_confirmation`: #123456789H
    - `rule_id`: 1
  - **Authorization:** Bearer Token
- **Response:**
  - **Status:** 200 OK
  - **Body:**
    ```json
    {
        "message": "Successful",
        "body": {
            "user": {
                "email": [user_email],
                "name": [user_name],
                "last_name": [user_last_name],
                "rule_id": 1,
                "updated_at": [timestamp],
                "created_at": [timestamp],
                "id": [user_id]
            },
            "token": [user_token]
        }
    }
    ```

### 4. Refresh Token

- **Description:** Refreshes the access token.
- **Request:**
  - **Method:** POST
    - **URL:** `url/api/refresh_token`
  - **Authorization:** Bearer Token
- **Response:**
  - **Status:** 200 OK
  - **Body:**
    ```json
    {
        "message": "Successful",
        "body": {
            "token": [new_token]
        }
    }
    ```

### 5. Reset Password Request

- **Description:** Initiates a password reset process.
- **Request:**
  - **Method:** POST
    - **URL:** `url/api/password/reset/request`
  - **Body:**
    - `email`: [user_email]
    - `front_url`: [front_end_url]
- **Response:**
  - **Status:** 200 OK
  - **Body:**
    ```json
    {
        "message": "Successful",
        "body": "Reset link sent to your email"
    }
    ```

### 6. Reset Password Confirm

- **Description:** Confirms the reset of a user's password.
- **Request:**
  - **Method:** POST
    - **URL:** `url/api/password/reset/confirm`
  - **Body:**
    - `token`: [reset_token]
    - `email`: [user_email]
    - `password`: [new_password]
    - `password_confirmation`: [new_password_confirmation]
- **Response:**
  - **Status:** 200 OK
  - **Body:**
    ```json
    {
    "message": "Password reset successfully",
    "body": {
        "user": {
            "id": [user_id],
            "email": [user_email],
            "name": [user_name],
            "last_name": [user_last_name],
            "email_verified_at": [time_stamp],
            "rule_id": 1,
            "phone": [user_phone],
            "address": [user_address],
            "created_at": [time_stamp],
            "updated_at": [time_stamp]
        },
        "token": [user_token]
    }
  }
    ```

### 7. Email Verification Request

- **Description:** Requests email verification.
- **Request:**
  - **Method:** GET
    - **URL:** `url/api/email/verify/request`
  - **Authorization:** Bearer Token
- **Response:** 
- **Status:** 200 OK
  - **Body:**
    ```json
    {
    "message": "Successful",
    "body": "Send email verification success"
  }
    ```

### 8. Email Verification Confirm

- **Description:** Confirms email verification.
- **Request:**
  - **Method:** POST
    - **URL:** `url/api/email/verify/confirm`
  - **Body:**
    - `code`: [verification_code]
- **Response:** 
 **Status:** 200 OK
  - **Body:**
    ```json
    {
    "message": "Verification successful",
    "body": {
        "id": [user_id],
        "email": [user_email],
        "name": [user_name],
        "last_name": [user_last_name],
        "email_verified_at": [time_stamp],
        "rule_id": 1,
        "phone": [user_phone],
        "address": [user_address],
        "created_at": [time_stamp],
        "updated_at": [time_stamp]
    }
  }
    ```

### 9. Get Authenticated User

- **Description:** Retrieves information about the authenticated user.
- **Request:**
  - **Method:** GET
  - **URL:** `url/api/user`
  - **Authorization:** Bearer Token
- **Response:**
  - **Status:** 200 OK
  - **Body:**
    ```json
    {
        "id": [user_id],
        "email": [user_email],
        "name": [user_name],
        "last_name": [user_last_name],
        "email_verified_at": [time_stamp],
        "rule_id": 1,
        "phone": [user_phone],
        "address": [user_address],
        "created_at": [time_stamp],
        "updated_at": [time_stamp]
    }
    ```

### 10. Delete User

- **Description:**

 Deletes a user account.
- **Request:**
  - **Method:** DELETE
  - **URL:** `url/api/users/[user_id]`
  - **Authorization:** Bearer Token
- **Response:**
  - **Status:** 200 OK
  - **Body:**
    ```json
    {
        "message": "User deleted successfully"
    }
    ```

###All models apply the same previous operations.
