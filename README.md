## API EndPoints

### Avatar

#### Get Avatars

-   URL: `/api/avatar`
-   Method: GET
-   Description: Get all avatars
-   Require token: `No`
-   Response

```
{
    "code": 200,
    "data": [
        {
            "id": 1,
            "image_src": "https://res.cloudinary.com/dxirtmo5t/image/upload/v1699950113/Trivia/Avatar/2023-11-14_082152_tampandanberani.jpg",
            "price": 50000,
            "created_at": "2023-11-14T08:21:54.000000Z",
            "updated_at": "2023-11-14T08:21:54.000000Z"
        },
        {
            "id": 2,
            "image_src": "https://res.cloudinary.com/dxirtmo5t/image/upload/v1699950357/Trivia/Avatar/2023-11-14_082555_2090263599_bd7f79ae17_o.jpg",
            "price": 75000,
            "created_at": "2023-11-14T08:25:58.000000Z",
            "updated_at": "2023-11-14T08:25:58.000000Z"
        },
        {
            "id": 3,
            "image_src": "https://res.cloudinary.com/dxirtmo5t/image/upload/v1699954205/Trivia/Avatar/2023-11-14_093003_30244297cf3ee8fa9ee6ad63e3cdae3c.jpg",
            "price": 80000,
            "created_at": "2023-11-14T09:30:06.000000Z",
            "updated_at": "2023-11-14T09:30:06.000000Z"
        }
    ]
}
```

#### Get Avatar by ID

-   URL: `/api/avatar/:avatarId`
-   Method: GET
-   Description: Get avatar by ID
-   Require token: `No`
-   Response

```
{
    "code": 200,
    "data": {
        "id": 1,
        "image_src": "https://res.cloudinary.com/dxirtmo5t/image/upload/v1699950113/Trivia/Avatar/2023-11-14_082152_tampandanberani.jpg",
        "price": 50000,
        "created_at": "2023-11-14T08:21:54.000000Z",
        "updated_at": "2023-11-14T08:21:54.000000Z"
    }
}
```

### User

#### Get Users

-   URL: `/api/user`
-   Method: GET
-   Description: Get all users
-   Require token: `No`
-   Response

```
{
    "code": 200,
    "data": [
        {
            "id": 1,
            "avatar_id": 1,
            "email": "asepsurasep@gmail.com",
            "username": "asepsurasep",
            "diamonds": 10,
            "total_points": 20,
            "created_at": "2023-11-14T08:28:35.000000Z",
            "updated_at": "2023-11-14T08:28:35.000000Z"
        },
        {
            "id": 2,
            "avatar_id": 2,
            "email": "onosurono@gmail.com",
            "username": "onosurono",
            "diamonds": 15,
            "total_points": 30,
            "created_at": "2023-11-14T08:29:17.000000Z",
            "updated_at": "2023-11-14T08:29:17.000000Z"
        },
        {
            "id": 3,
            "avatar_id": 1,
            "email": "icejuice@gmail.com",
            "username": "icejuice",
            "diamonds": 10,
            "total_points": 30,
            "created_at": "2023-11-14T08:29:37.000000Z",
            "updated_at": "2023-11-14T08:29:37.000000Z"
        }
    ]
}
```

#### Get User by ID

-   URL: `/api/user/:userId`
-   Method: GET
-   Description: Get user by ID
-   Require token: `No`
-   Response

```
{
    "code": 200,
    "data": {
        "id": 1,
        "avatar_id": 1,
        "email": "asepsurasep@gmail.com",
        "username": "asepsurasep",
        "diamonds": 10,
        "total_points": 20,
        "created_at": "2023-11-14T08:28:35.000000Z",
        "updated_at": "2023-11-14T08:28:35.000000Z"
    }
}
```

### Question

#### Get Questions

-   URL: `/api/question`
-   Method: GET
-   Description: Get all questions
-   Require token: `No`
-   Response

```
{
    "code": 200,
    "data": [
        {
            "id": 1,
            "question": "Apa ibukota Thailand?",
            "answer": "Bangkok",
            "wrong_answer_1": "Hanoi",
            "wrong_answer_2": "Jakarta",
            "wrong_answer_3": "Ho Chi Minh City",
            "created_at": "2023-11-14T07:40:19.000000Z",
            "updated_at": "2023-11-14T07:40:19.000000Z"
        },
        {
            "id": 2,
            "question": "Apa warna Laut Merah?",
            "answer": "Biru",
            "wrong_answer_1": "Merah",
            "wrong_answer_2": "Hijau",
            "wrong_answer_3": "Kuning",
            "created_at": "2023-11-14T07:42:09.000000Z",
            "updated_at": "2023-11-14T07:42:09.000000Z"
        },
        {
            "id": 3,
            "question": "Apa ibu kota Prancis?",
            "answer": "Paris",
            "wrong_answer_1": "Madrid",
            "wrong_answer_2": "Roma",
            "wrong_answer_3": "Berlin",
            "created_at": "2023-11-14T07:50:13.000000Z",
            "updated_at": "2023-11-14T07:50:13.000000Z"
        }
    ]
```

#### Get Question by ID

-   URL: `/api/question/:questionId`
-   Method: GET
-   Description: Get question by ID
-   Require token: `No`
-   Response

```
{
    "code": 200,
    "data": {
        "id": 1,
        "question": "Apa ibukota Thailand?",
        "answer": "Bangkok",
        "wrong_answer_1": "Hanoi",
        "wrong_answer_2": "Jakarta",
        "wrong_answer_3": "Ho Chi Minh City",
        "created_at": "2023-11-14T07:40:19.000000Z",
        "updated_at": "2023-11-14T07:40:19.000000Z"
    }
}
```
