
# API Documentation

## Authentication

### Login
- **Route:** `POST /api/login`
- **Middleware:** `guest`
- **Description:** Authenticate a user and generate a token for further requests.

---

## Authenticated Routes

### Get Current User
- **Route:** `GET /api/user`
- **Middleware:** `auth:sanctum`
- **Description:** Retrieve information about the authenticated user.

### Show User
- **Route:** `GET /api/users/{id}/{with}`
- **Middleware:** `auth:sanctum`
- **Parameters:**
  - `{id}`: User ID (integer)
  - `{with}`: Additional related data to include ('completed_devices','devices','permissions','orders')
- **Description:** Retrieve details about a specific user.

### Show Client
- **Route:** `GET /api/clients/{id}/{with}`
- **Middleware:** `auth:sanctum`
- **Parameters:**
  - `{id}`: Client ID (integer)
  - `{with}`: Additional related data to include ('completed_devices','devices','permissions','orders')
- **Description:** Retrieve details about a specific client, including related information.

### CRUD Operations

#### List Resources
- **Route:** `GET /api/{resource}`
- **Middleware:** `auth:sanctum`
- **Parameters:** Query parameters for filtering data.
- **Description:** Retrieve a list of resources.

  ```php
  public function get_data($model, Request $request): JsonResponse
  ```

  The `get_data` function in the `CRUDTrait` retrieves data from a model based on the provided request parameters. It checks the user's authorization to view any data of the specified model and filters the data based on the request parameters. The function supports filtering by column values and provides a response with the filtered data.

#### Show Resource
- **Route:** `GET /api/{resource}/{id}/{with}`
- **Middleware:** `auth:sanctum`
- **Parameters:**
  - `{id}`: Resource ID (integer)
  - `{with}`: Additional data to include (e.g., 'permissions', 'relations')
- **Description:** Retrieve details about a specific resource.

  ```php
  public function show_data($model, $id, $with = []): JsonResponse
  ```

  The `show_data` function in the `CRUDTrait` retrieves and displays details of a specific item from the model. It checks the user's authorization to view the model, fetches the item by ID, and supports eager loading of specified relations. The function provides a response with the retrieved data.

#### Create Resource
- **Route:** `POST /api/{resource}`
- **Middleware:** `auth:sanctum`
- **Parameters:** Resource data in the request body.
- **Description:** Create a new resource.

  ```php
  public function store_data($request, $model): JsonResponse
  ```

  The `store_data` function in the `CRUDTrait` creates a new item in the model. It checks the user's authorization to create an item, creates the item with the provided request data, and returns a response with the created item.

#### Update Resource
- **Route:** `PUT /api/{resource}/{id}`
- **Middleware:** `auth:sanctum`
- **Parameters:**
  - `{id}`: Resource ID (integer)
- **Description:** Update information for a specific resource.

  ```php
  public function update_data($request, $id, $model): JsonResponse
  ```

  The `update_data` function in the `CRUDTrait` updates an existing item in the model. It checks the user's authorization to update the model, fetches the item by ID, updates the item with the provided request data, and returns a response with the updated item.

#### Delete Resource
- **Route:** `DELETE /api/{resource}/{id}`
- **Middleware:** `auth:sanctum`
- **Parameters:**
  - `{id}`: Resource ID (integer)
- **Description:** Delete a specific resource.

  ```php
  public function delete_data($id, $model): JsonResponse
  ```

  The `delete_data` function in the `CRUDTrait` deletes a specific item from the model. It checks the user's authorization to delete the model, fetches the item by ID, deletes the item, and returns a response indicating the success of the deletion.
