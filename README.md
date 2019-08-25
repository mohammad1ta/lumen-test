# lumen-test
Monolithic RESTful api for producing random hash

# Api
## Hash Generator
    
ًRequest:

    GET: /hash
    
Output:

    {
        "hash":"TXlxQXg3b2NvWU03NVFJSDYwNmVBa1I5OXBlRU9ZQThsUFpWbWVkcDE0N3lSZXYxNlQ2SGMyZW01RFNJRzhWQQ=="
    }
    
## Register new user
        
ًRequest:

    POST: /register
    
Params:
 
| Field | Details |
|-------|---------|
| username | Required |
| password | Required, Min(6) |
| email | Required |
    
Output:

    {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsdW1lbiIsInN1YiI6MTAsImlhdCI6MTU2NjcwOTQyMiwiZXhwIjoxNTY2NzEzMDIyfQ.auyr1OOpCrAXT-eMqaZxaYPYv4tFpG30LuTU8p2XGoc"
    }
    
## Login User
        
ًRequest:

    POST: /login
    
Params:
 
| Field | Details |
|-------|---------|
| username | Required |
| password | Required |
    
        
Output:

    {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsdW1lbiIsInN1YiI6MTAsImlhdCI6MTU2NjcwOTQyMiwiZXhwIjoxNTY2NzEzMDIyfQ.auyr1OOpCrAXT-eMqaZxaYPYv4tFpG30LuTU8p2XGoc"
    }
    
