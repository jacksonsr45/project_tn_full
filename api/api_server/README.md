# routes

- http://url/api/v1/login/
  - Route Default from login
  ```json
    {
        "username": "username", // <- This field can be null!
        "email": "email@email.com",
        "password": "pass"
    }
  ```
  If the field is valid returns 
  ```json
  {
    "key": "value_thoken"
  }
  ```
- http://url/api/v1/logout/
  - Route Default from logout