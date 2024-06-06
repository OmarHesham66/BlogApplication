<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Blog Application API

This documentation provides a comprehensive guide to the Blog Application API built with Laravel. The API includes endpoints for user authentication, CRUD operations for posts and categories, logging of post operations, and comprehensive unit tests.


## Key Features

- Supplier and customer management.
- Product categorization and unit tracking.
- Creation of sales invoices and purchase operations.
- Daily reports for operations and inventory status.
- Intuitive and user-friendly interface.

## Getting Started

1. Install project dependencies using Composer:

   ```bash
   composer install
   ```

2. Copy the .env.example file and rename it to .env:
   ```bash
   cp .env.example .env
   ```
3. Generate the application key:
   ```bash
   php artisan key:generate
   ```
4. Configure the .env file with your database connection details
5. Run the database migrations to create tables:
   ```bash
   php artisan migrate
   ```
6. Start the local server:
   ```bash
   php artisan serve
   ```
7. Open the project in the browser at http://localhost:8000.
8. run the seeder for append dumy data in tables, use the command:
   ```bash
   php artisan db:seed
   ```
9. run the seeder for features , use the command:
  ```bash
   php artisan test
   ```
10. Enjoy your experience!!

**************Apis***********


1- Url For Documentation => https://documenter.getpostman.com/view/29073571/2sA3XJjjJK

2 - Preview For Apis 

--- Login --- 
  ```bash
   http://127.0.0.1:8000/api/login
   ```

--- Example Request as php ---
```bash
<?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$options = [
  'multipart' => [
    [
      'name' => 'email',
      'contents' => 'o@o.com'
    ],
    [
      'name' => 'password',
      'contents' => '123456'
    ]
]];
$request = new Request('POST', 'http://127.0.0.1:8000/api/login', $headers);
$res = $client->sendAsync($request, $options)->wait();
echo $res->getBody();
```

--- Example Response --- 
   ```bash
   {
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzE3NjgxNjg1LCJleHAiOjE3MTc2ODUyODUsIm5iZiI6MTcxNzY4MTY4NSwianRpIjoiMWN0a1c4Vmo3eENlWUtrbyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.iZjWCdkePhMXf5-Y8xjsX0g47ZgdXQOr_-MwPdgkT0A",
  "user": {
    "id": 1,
    "name": "Omar Hesham",
    "email": "o@o.com",
    "created_at": "2024-06-04T14:57:52.000000Z",
    "updated_at": "2024-06-04T14:57:52.000000Z"
  },
  "code": 200,
  "message": "Login successful"
}
   ```



--- Register --- 
   ```bash
  http://127.0.0.1:8000/api/register
   ```

--- Example Request as php ---
   ```bash
   <?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$options = [
  'multipart' => [
    [
      'name' => 'email',
      'contents' => 'ahmed@ahmed.com'
    ],
    [
      'name' => 'name',
      'contents' => 'ahmed'
    ],
    [
      'name' => 'password',
      'contents' => '123456789'
    ],
    [
      'name' => 'password_confirmation',
      'contents' => '123456789'
    ]
]];
$request = new Request('POST', 'http://127.0.0.1:8000/api/register', $headers);
$res = $client->sendAsync($request, $options)->wait();
echo $res->getBody();

   ```

--- Example Response ---

   ```bash
   {
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNzE3NjkwMjMwLCJleHAiOjE3MTc2OTM4MzAsIm5iZiI6MTcxNzY5MDIzMCwianRpIjoiUzlwWjhPbkk2S2l2TjB3eiIsInN1YiI6IjciLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.-pNyINvyVK0PXgOVQmtAR4j82uH4UCnKpDNrXLMkvCE",
  "user": {
    "name": "ahmed",
    "email": "ahmed@ahmed.com",
    "updated_at": "2024-06-06T16:10:30.000000Z",
    "created_at": "2024-06-06T16:10:30.000000Z",
    "id": 7
  },
  "code": 200,
  "message": "Register successful"
}
   ```



--- Refresh Token --- 
   ```bash
   http://127.0.0.1:8000/api/refresh
   ```

--- Example Request as php ---
   ```bash
   <?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$request = new Request('GET', 'http://127.0.0.1:8000/api/refresh', $headers);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();

   ```

--- Example Response ---
   ```bash
   {
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3JlZnJlc2giLCJpYXQiOjE3MTc2OTAyNTMsImV4cCI6MTcxNzY5Mzg2NSwibmJmIjoxNzE3NjkwMjY1LCJqdGkiOiI1TloyNE9LU0h2aEQ0ZzNVIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.xWKhUDrvz1wVZqyl0qNGY6qNmfGbp8imy7hbSTAbhic",
  "code": 200,
  "message": "Refresh token successful"
}
   ```


--- Logout --- 
   ```bash
   http://127.0.0.1:8000/api/logout
   ```

--- Example Request as php ---
   ```bash
   <?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$request = new Request('POST', 'http://127.0.0.1:8000/api/logout', $headers);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();

   ```

--- Example Response ---

   ```bash
   {
  "code": 200,
  "message": "Logout successful"
}
   ```



--- Get All Posts --- 
   ```bash
   http://127.0.0.1:8000/api/posts
   ```

--- Example Request as php ---
   ```bash
   <?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$request = new Request('GET', 'http://127.0.0.1:8000/api/posts', $headers);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();

   ```

--- Example Response ---
   ```bash
   {
  "code": 200,
  "message": "Fetch Posts Successfully",
  "data": [
    {
      "id": 1,
      "title": "Prof.",
      "content": "Then came a little now and then, if I must, I must,' the King put on his flappers, '--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an immense length of neck.",
      "media": "https://via.placeholder.com/640x480.png/00ffee?text=sed",
      "created_at": "2024-06-04",
      "author": {
        "id": 1,
        "name": "Omar Hesham",
        "email": "o@o.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 2,
      "title": "Prof.",
      "content": "However, I've got to the Queen, stamping on the breeze that followed them, the melancholy words:-- 'Soo--oop of the trees had a consultation about this, and Alice was thoroughly puzzled. 'Does the.",
      "media": "https://via.placeholder.com/640x480.png/00aa44?text=quos",
      "created_at": "2024-06-04",
      "author": {
        "id": 1,
        "name": "Omar Hesham",
        "email": "o@o.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 3,
      "title": "Dr.",
      "content": "They all made a rush at the frontispiece if you please! \"William the Conqueror, whose cause was favoured by the whole pack of cards!' At this moment the door of the Queen's ears--' the Rabbit.",
      "media": "https://via.placeholder.com/640x480.png/0088cc?text=et",
      "created_at": "2024-06-04",
      "author": {
        "id": 1,
        "name": "Omar Hesham",
        "email": "o@o.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 4,
      "title": "Mr.",
      "content": "This sounded promising, certainly: Alice turned and came back again. 'Keep your temper,' said the Duchess. An invitation for the White Rabbit put on her spectacles, and began bowing to the Cheshire.",
      "media": "https://via.placeholder.com/640x480.png/0077bb?text=dolorum",
      "created_at": "2024-06-04",
      "author": {
        "id": 2,
        "name": "Tillman Carroll",
        "email": "neoma.wolff@example.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 5,
      "title": "Mr.",
      "content": "Majesty,' he began. 'You're a very good height indeed!' said the Dormouse, without considering at all like the name: however, it only grinned a little faster?\" said a sleepy voice behind her.",
      "media": "https://via.placeholder.com/640x480.png/00cccc?text=explicabo",
      "created_at": "2024-06-04",
      "author": {
        "id": 2,
        "name": "Tillman Carroll",
        "email": "neoma.wolff@example.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 6,
      "title": "Dr.",
      "content": "Poor Alice! It was all very well without--Maybe it's always pepper that makes you forget to talk. I can't see you?' She was looking about for it, she found to be afraid of them!' 'And who are.",
      "media": "https://via.placeholder.com/640x480.png/00ee66?text=sed",
      "created_at": "2024-06-04",
      "author": {
        "id": 2,
        "name": "Tillman Carroll",
        "email": "neoma.wolff@example.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 7,
      "title": "Dr.",
      "content": "And so it was all very well without--Maybe it's always pepper that had a little house in it about four inches deep and reaching half down the chimney, and said to herself, and shouted out, 'You'd.",
      "media": "https://via.placeholder.com/640x480.png/003333?text=beatae",
      "created_at": "2024-06-04",
      "author": {
        "id": 3,
        "name": "Ted Terry PhD",
        "email": "mraz.wilfred@example.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 8,
      "title": "Dr.",
      "content": "And welcome little fishes in With gently smiling jaws!' 'I'm sure I'm not the right house, because the chimneys were shaped like the tone of delight, and rushed at the moment, 'My dear! I shall have.",
      "media": "https://via.placeholder.com/640x480.png/001155?text=ut",
      "created_at": "2024-06-04",
      "author": {
        "id": 3,
        "name": "Ted Terry PhD",
        "email": "mraz.wilfred@example.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 9,
      "title": "Prof.",
      "content": "Down, down, down. Would the fall was over. However, when they passed too close, and waving their forepaws to mark the time, while the Mock Turtle, 'Drive on, old fellow! Don't be all day about it!'.",
      "media": "https://via.placeholder.com/640x480.png/000044?text=modi",
      "created_at": "2024-06-04",
      "author": {
        "id": 3,
        "name": "Ted Terry PhD",
        "email": "mraz.wilfred@example.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 10,
      "title": "Prof.",
      "content": "Alice, a good deal frightened by this very sudden change, but she felt a violent shake at the thought that she was now about a foot high: then she looked at Two. Two began in a low voice. 'Not at.",
      "media": "https://via.placeholder.com/640x480.png/00bb44?text=non",
      "created_at": "2024-06-04",
      "author": {
        "id": 4,
        "name": "Keaton Jaskolski",
        "email": "pink.gorczany@example.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 11,
      "title": "Mrs.",
      "content": "Wonderland, though she knew that it was over at last, and managed to put it right; 'not that it was only too glad to do THAT in a wondering tone. 'Why, what a Mock Turtle angrily: 'really you are.",
      "media": "https://via.placeholder.com/640x480.png/00eeff?text=sunt",
      "created_at": "2024-06-04",
      "author": {
        "id": 4,
        "name": "Keaton Jaskolski",
        "email": "pink.gorczany@example.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 12,
      "title": "Prof.",
      "content": "Everything is so out-of-the-way down here, that I should like to drop the jar for fear of killing somebody, so managed to put down yet, before the officer could get to the Queen, 'and take this.",
      "media": "https://via.placeholder.com/640x480.png/007733?text=accusantium",
      "created_at": "2024-06-04",
      "author": {
        "id": 4,
        "name": "Keaton Jaskolski",
        "email": "pink.gorczany@example.com"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 13,
      "title": "Mrs.",
      "content": "Wonderland, though she felt sure she would feel very queer to ME.' 'You!' said the March Hare will be When they take us up and beg for its dinner, and all the things being alive; for instance.",
      "media": "https://via.placeholder.com/640x480.png/002200?text=sit",
      "created_at": "2024-06-04",
      "author": {
        "id": 5,
        "name": "Dallas Graham",
        "email": "raynor.octavia@example.org"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 14,
      "title": "Prof.",
      "content": "I believe.' 'Boots and shoes under the door; so either way I'll get into her eyes; and once she remembered trying to fix on one, the cook took the hookah out of the room again, no wonder she felt.",
      "media": "https://via.placeholder.com/640x480.png/0022bb?text=fugiat",
      "created_at": "2024-06-04",
      "author": {
        "id": 5,
        "name": "Dallas Graham",
        "email": "raynor.octavia@example.org"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 15,
      "title": "Prof.",
      "content": "Hatter asked triumphantly. Alice did not dare to laugh; and, as they would die. 'The trial cannot proceed,' said the Pigeon; 'but I haven't had a VERY turn-up nose, much more like a telescope! I.",
      "media": "https://via.placeholder.com/640x480.png/007755?text=perferendis",
      "created_at": "2024-06-04",
      "author": {
        "id": 5,
        "name": "Dallas Graham",
        "email": "raynor.octavia@example.org"
      },
      "category": {
        "name": "Important Category",
        "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
      }
    },
    {
      "id": 17,
      "title": "post 19",
      "content": "this is post",
      "media": "http://127.0.0.1:8000/PostsMedia/php4B54.tmp(2024-06-04 15:44:10)png",
      "created_at": "2024-06-04",
      "author": {
        "id": 1,
        "name": "Omar Hesham",
        "email": "o@o.com"
      },
      "category": null
    },
    {
      "id": 18,
      "title": "post 2",
      "content": "this is post 2",
      "media": "http://127.0.0.1:8000/PostsMedia/2024-06-04 15:47:36_php6E42.tmp",
      "created_at": "2024-06-04",
      "author": {
        "id": 1,
        "name": "Omar Hesham",
        "email": "o@o.com"
      },
      "category": null
    },
    {
      "id": 19,
      "title": "post 3",
      "content": "this is post 3",
      "media": "http://127.0.0.1:8000/PostsMedia/2024-06-04 15:48:19_Screenshot_11.png",
      "created_at": "2024-06-04",
      "author": {
        "id": 1,
        "name": "Omar Hesham",
        "email": "o@o.com"
      },
      "category": null
    },
    {
      "id": 22,
      "title": "post 6",
      "content": "this is post 6",
      "media": "http://127.0.0.1:8000/PostsMedia/130648_Screenshot_25.png",
      "created_at": "2024-06-06",
      "author": {
        "id": 1,
        "name": "Omar Hesham",
        "email": "o@o.com"
      },
      "category": null
    },
    {
      "id": 23,
      "title": "post 7",
      "content": "this is post 7",
      "media": "http://127.0.0.1:8000/PostsMedia/130651_Screenshot_25.png",
      "created_at": "2024-06-06",
      "author": {
        "id": 1,
        "name": "Omar Hesham",
        "email": "o@o.com"
      },
      "category": null
    }
  ]
}
   ```



--- Find Post By ID --- 
   ```bash
   http://127.0.0.1:8000/api/posts/70
   ```

--- Example Request as php ---
   ```bash
   <?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$request = new Request('GET', 'http://127.0.0.1:8000/api/posts/1', $headers);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();

   ```

--- Example Response ---
```bash
{
  "code": 200,
  "message": "Fetch Post Successfully",
  "data": {
    "id": 1,
    "title": "Prof.",
    "content": "Then came a little now and then, if I must, I must,' the King put on his flappers, '--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an immense length of neck.",
    "media": "https://via.placeholder.com/640x480.png/00ffee?text=sed",
    "created_at": "2024-06-04",
    "author": {
      "id": 1,
      "name": "Omar Hesham",
      "email": "o@o.com"
    },
    "category": {
      "name": "Important Category",
      "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
    }
  }
}
```


--- Create Post --- 
   ```bash
   http://127.0.0.1:8000/api/posts
   ```

--- Example Request as php ---
   ```bash
<?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$options = [
  'multipart' => [
    [
      'name' => 'title',
      'contents' => 'post 50'
    ],
    [
      'name' => 'content',
      'contents' => 'this is post 50'
    ],
    [
      'name' => 'media',
      'contents' => Utils::tryFopen('/F:/Downloads/Screenshot_2.png', 'r'),
      'filename' => '/F:/Downloads/Screenshot_2.png',
      'headers'  => [
        'Content-Type' => '<Content-type header>'
      ]
    ]
]];
$request = new Request('POST', 'http://127.0.0.1:8000/api/posts', $headers);
$res = $client->sendAsync($request, $options)->wait();
echo $res->getBody();


   ```

--- Example Response ---

   ```bash
{
  "code": 201,
  "message": "Created successfully",
  "data": {
    "id": 24,
    "title": "post 50",
    "content": "this is post 50",
    "media": "http://127.0.0.1:8000/PostsMedia/160613_Screenshot_2.png",
    "created_at": "2024-06-06",
    "author": {
      "id": 1,
      "name": "Omar Hesham",
      "email": "o@o.com"
    },
    "category": null
  }
}
   ```

--- Update Post --- 
   ```bash
  http://127.0.0.1:8000/api/posts/1
   ```

--- Example Request as php ---
   ```bash
<?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$options = [
'form_params' => [
  'title' => 'Funny Post'
]];
$request = new Request('PUT', 'http://127.0.0.1:8000/api/posts/1', $headers);
$res = $client->sendAsync($request, $options)->wait();
echo $res->getBody();


   ```

--- Example Response ---

   ```bash
{
  "code": 201,
  "message": "Updated successfully",
  "data": {
    "id": 1,
    "title": "Funny Post",
    "content": "Then came a little now and then, if I must, I must,' the King put on his flappers, '--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an immense length of neck.",
    "media": "https://via.placeholder.com/640x480.png/00ffee?text=sed",
    "created_at": "2024-06-04",
    "author": {
      "id": 1,
      "name": "Omar Hesham",
      "email": "o@o.com"
    },
    "category": {
      "name": "Important Category",
      "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
    }
  }
}
   ```


--- Delete Post --- 
   ```bash
   http://127.0.0.1:8000/api/posts/1
   ```

--- Example Request as php ---
   ```bash
<?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$request = new Request('DELETE', 'http://127.0.0.1:8000/api/posts/16', $headers);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();


   ```

--- Example Response ---

   ```bash
{
  "code": 404,
  "message": "Post not found",
  "data": []
}
   ```


--- Get All Categories --- 
   ```bash
   http://127.0.0.1:8000/api/categories
   ```

--- Example Request as php ---
   ```bash
<?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$request = new Request('GET', 'http://127.0.0.1:8000/api/categories', $headers);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();


   ```

--- Example Response ---

   ```bash
{
  "message": "Fetch Categories Successfully",
  "code": 200,
  "data": [
    {
      "name": "Important Category",
      "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
    }
  ]
}
   ```


--- Find Category By ID --- 
   ```bash
   http://127.0.0.1:8000/api/categories/1
   ```

--- Example Request as php ---
   ```bash
<?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$request = new Request('GET', 'http://127.0.0.1:8000/api/categories/1', $headers);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();

   ```

--- Example Response ---

   ```bash
{
  "message": "Fetch Category Successfully",
  "code": 200,
  "data": {
    "name": "Important Category",
    "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
  }
}
   ```


--- Create Category --- 
   ```bash
   http://127.0.0.1:8000/api/categories
   ```

--- Example Request as php ---
   ```bash
<?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$options = [
  'multipart' => [
    [
      'name' => 'name',
      'contents' => 'Category One'
    ],
    [
      'name' => 'description',
      'contents' => 'This Is Category One'
    ]
]];
$request = new Request('POST', 'http://127.0.0.1:8000/api/categories', $headers);
$res = $client->sendAsync($request, $options)->wait();
echo $res->getBody();


   ```

--- Example Response ---

   ```bash
{
  "code": 201,
  "message": "Created successfully",
  "data": {
    "name": "Category One",
    "description": "This Is Category One"
  }
}
   ```


--- Update Category --- 
   ```bash
   http://127.0.0.1:8000/api/categories
   ```

--- Example Request as php ---
   ```bash
<?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$options = [
'form_params' => [
  'name' => 'UpdatedCategory One'
]];
$request = new Request('PUT', 'http://127.0.0.1:8000/api/categories/1', $headers);
$res = $client->sendAsync($request, $options)->wait();
echo $res->getBody();

   ```

--- Example Response ---

   ```bash
{
  "code": 201,
  "message": "Updated successfully",
  "data": {
    "name": "UpdatedCategory One",
    "description": "Error doloribus eaque in assumenda commodi beatae velit rerum. In itaque consectetur velit voluptatem. Earum magnam odit aut minima ut ut."
  }
}
   ```


--- Delete Category --- 
   ```bash
   http://127.0.0.1:8000/api/categories
   ```

--- Example Request as php ---
   ```bash
<?php
$client = new Client();
$headers = [
  'Accept' => 'application/json'
];
$request = new Request('DELETE', 'http://127.0.0.1:8000/api/categories/1', $headers);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();

   ```

--- Example Response ---

   ```bash
{
  "code": 200,
  "message": "Deleted successfully",
  "data": []
}
   ```
# Test Cases

## Authentication Tests

### Test User Registration:

- Test valid registration
- Test registration with missing fields

### Test User Login:

- Test valid login
- Test login with incorrect password
- Test login with non-existent email

## Post Tests

### Test Post Creation:

- Test valid post creation and save log for this post
- Test post creation with missing fields

### Test Post Retrieval:

- Test retrieval of all posts
- Test retrieval of single post by ID

### Test Post Update:

- Test valid post update and save log for this post
- Test post update with missing fields

### Test Post Deletion:

- Test valid post deletion
- Test deletion of non-existent post

## Category Tests

### Test Category Creation:

- Test valid category creation
- Test category creation with missing fields

### Test Category Retrieval:

- Test retrieval of all categories
- Test retrieval of single category by ID

### Test Category Update:

- Test valid category update
- Test category update with missing fields

### Test Category Deletion:

- Test valid category deletion
- Test deletion of non-existent category
