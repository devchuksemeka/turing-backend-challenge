---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#DEPARTMENTS


<!-- START_fabf0ab0617d740fb9c88675f7c3ba0a -->
## GET ALL DEPARTMENTS
This endpoint retrieve the list of departments from the database and returns an array of department objects to the user

> Example request:

```bash
curl -X GET -G "http://localhost/departments" 
```

```javascript
const url = new URL("http://localhost/departments");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "department_id": 1,
        "name": "Regional",
        "description": "Proud of your country? Wear a T-shirt with a national symbol stamp!"
    },
    {
        "department_id": 2,
        "name": "Nature",
        "description": "Find beautiful T-shirts with animals and flowers in our Nature department!"
    },
    {
        "department_id": 3,
        "name": "Seasonal",
        "description": "Each time of the year has a special flavor. Our seasonal T-shirts express traditional symbols using unique postal stamp pictures."
    }
]
```

### HTTP Request
`GET departments`


<!-- END_fabf0ab0617d740fb9c88675f7c3ba0a -->

<!-- START_94d5d239b4a9aa2f5efa3b8453a2582d -->
## GET A SINGLE DEPARTMENT
This endpoint get a single department using the department Id in the request params.

> Example request:

```bash
curl -X GET -G "http://localhost/departments/1" 
```

```javascript
const url = new URL("http://localhost/departments/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "department_id": 1,
    "name": "Regional",
    "description": "Proud of your country? Wear a T-shirt with a national symbol stamp!"
}
```

### HTTP Request
`GET departments/{department_id}`


<!-- END_94d5d239b4a9aa2f5efa3b8453a2582d -->

#general


<!-- START_7c9e083cb92a9938bc93e22e6ee60244 -->
## Allow customers to view their profile info.

> Example request:

```bash
curl -X GET -G "http://localhost/customer" 
```

```javascript
const url = new URL("http://localhost/customer");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "error": {
        "status": 400,
        "code": "AUT_01",
        "message": "Authorization code is empty",
        "field": "application_error"
    }
}
```

### HTTP Request
`GET customer`


<!-- END_7c9e083cb92a9938bc93e22e6ee60244 -->

<!-- START_c2831f0d4f956e21772eea8cfbf4a3fd -->
## Allow customers to update their profile info like name, email, password, day_phone, eve_phone and mob_phone.

> Example request:

```bash
curl -X PUT "http://localhost/customer" 
```

```javascript
const url = new URL("http://localhost/customer");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT customer`


<!-- END_c2831f0d4f956e21772eea8cfbf4a3fd -->

<!-- START_a2a147502676b066dd6744caef24f1fb -->
## Allow customers to update their address info/

> Example request:

```bash
curl -X PUT "http://localhost/customer/address" 
```

```javascript
const url = new URL("http://localhost/customer/address");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT customer/address`


<!-- END_a2a147502676b066dd6744caef24f1fb -->

<!-- START_2ea8fd22047886961e60c47889e7e087 -->
## Allow customers to update their credit card number.

> Example request:

```bash
curl -X PUT "http://localhost/customer/creditCard" 
```

```javascript
const url = new URL("http://localhost/customer/creditCard");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT customer/creditCard`


<!-- END_2ea8fd22047886961e60c47889e7e087 -->

<!-- START_efc7d1e1f57f78b2c0ee4671ee0f1006 -->
## To generate a unique cart id.

> Example request:

```bash
curl -X GET -G "http://localhost/shoppingcart/generateUniqueId" 
```

```javascript
const url = new URL("http://localhost/shoppingcart/generateUniqueId");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "error": {
        "status": 400,
        "code": "AUT_01",
        "message": "Authorization code is empty",
        "field": "application_error"
    }
}
```

### HTTP Request
`GET shoppingcart/generateUniqueId`


<!-- END_efc7d1e1f57f78b2c0ee4671ee0f1006 -->

<!-- START_b62fab98db7348545f526cb20484c38c -->
## To add new product to the cart.

> Example request:

```bash
curl -X POST "http://localhost/shoppingcart/add" 
```

```javascript
const url = new URL("http://localhost/shoppingcart/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST shoppingcart/add`


<!-- END_b62fab98db7348545f526cb20484c38c -->

<!-- START_6b199df9293272979d8567795101a5a8 -->
## Method to get list of items in a cart.

> Example request:

```bash
curl -X GET -G "http://localhost/shoppingcart/1" 
```

```javascript
const url = new URL("http://localhost/shoppingcart/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "error": {
        "status": 400,
        "code": "AUT_01",
        "message": "Authorization code is empty",
        "field": "application_error"
    }
}
```

### HTTP Request
`GET shoppingcart/{cart_id}`


<!-- END_6b199df9293272979d8567795101a5a8 -->

<!-- START_71a18ec90386b74a879c3a2ceffe920d -->
## Update the quantity of a product in the shopping cart.

> Example request:

```bash
curl -X PUT "http://localhost/shoppingcart/update/1" 
```

```javascript
const url = new URL("http://localhost/shoppingcart/update/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT shoppingcart/update/{item_id}`


<!-- END_71a18ec90386b74a879c3a2ceffe920d -->

<!-- START_78eded2d945fdeb379265f1505c6f8ce -->
## Should be able to clear shopping cart.

> Example request:

```bash
curl -X DELETE "http://localhost/shoppingcart/empty/1" 
```

```javascript
const url = new URL("http://localhost/shoppingcart/empty/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE shoppingcart/empty/{cart_id}`


<!-- END_78eded2d945fdeb379265f1505c6f8ce -->

<!-- START_d96cf0f660034282f79da8b1a493dac3 -->
## Should delete a product from the shopping cart.

> Example request:

```bash
curl -X DELETE "http://localhost/shoppingcart/removeProduct/1" 
```

```javascript
const url = new URL("http://localhost/shoppingcart/removeProduct/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE shoppingcart/removeProduct/{item_id}`


<!-- END_d96cf0f660034282f79da8b1a493dac3 -->

<!-- START_ec29d74de87750d93ffc5c2316881ba2 -->
## Create an order.

> Example request:

```bash
curl -X POST "http://localhost/orders" 
```

```javascript
const url = new URL("http://localhost/orders");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST orders`


<!-- END_ec29d74de87750d93ffc5c2316881ba2 -->

<!-- START_0c9c31ecc2dc649841912f5da3f3d5c7 -->
## Get all orders of a customer.

> Example request:

```bash
curl -X GET -G "http://localhost/orders/inCustomer" 
```

```javascript
const url = new URL("http://localhost/orders/inCustomer");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "error": {
        "status": 400,
        "code": "AUT_01",
        "message": "Authorization code is empty",
        "field": "application_error"
    }
}
```

### HTTP Request
`GET orders/inCustomer`


<!-- END_0c9c31ecc2dc649841912f5da3f3d5c7 -->

<!-- START_d88fb59485d3e8b4c908aeb62c536b2d -->
## Get the details of an order.

> Example request:

```bash
curl -X GET -G "http://localhost/orders/1" 
```

```javascript
const url = new URL("http://localhost/orders/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "error": {
        "status": 400,
        "code": "AUT_01",
        "message": "Authorization code is empty",
        "field": "application_error"
    }
}
```

### HTTP Request
`GET orders/{order_id}`


<!-- END_d88fb59485d3e8b4c908aeb62c536b2d -->

<!-- START_5c4503fe3d69c1d09f33dad9412909fe -->
## orders/shortDetail/{order_id}
> Example request:

```bash
curl -X GET -G "http://localhost/orders/shortDetail/1" 
```

```javascript
const url = new URL("http://localhost/orders/shortDetail/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "error": {
        "status": 400,
        "code": "AUT_01",
        "message": "Authorization code is empty",
        "field": "application_error"
    }
}
```

### HTTP Request
`GET orders/shortDetail/{order_id}`


<!-- END_5c4503fe3d69c1d09f33dad9412909fe -->

<!-- START_a1c9263ff0c1ec29cd835f949ca55497 -->
## Process stripe payment.

> Example request:

```bash
curl -X POST "http://localhost/stripe/charge" 
```

```javascript
const url = new URL("http://localhost/stripe/charge");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST stripe/charge`


<!-- END_a1c9263ff0c1ec29cd835f949ca55497 -->

<!-- START_6e85b87b0aee56657bdebc9c4f62696f -->
## This method should return an array of all attributes.

> Example request:

```bash
curl -X GET -G "http://localhost/attributes" 
```

```javascript
const url = new URL("http://localhost/attributes");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "attribute_id": 1,
        "name": "Size"
    },
    {
        "attribute_id": 2,
        "name": "Color"
    }
]
```

### HTTP Request
`GET attributes`


<!-- END_6e85b87b0aee56657bdebc9c4f62696f -->

<!-- START_0b00482771668af2a284ee0bb3beab18 -->
## This method should return a single attribute using the attribute_id in the request parameter.

> Example request:

```bash
curl -X GET -G "http://localhost/attributes/1" 
```

```javascript
const url = new URL("http://localhost/attributes/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "attribute_id": 1,
    "name": "Size"
}
```

### HTTP Request
`GET attributes/{attribute_id}`


<!-- END_0b00482771668af2a284ee0bb3beab18 -->

<!-- START_c9b9863aa3898a28de8f2b14dcfb6562 -->
## This method should return an array of all attribute values of a single attribute using the attribute id.

> Example request:

```bash
curl -X GET -G "http://localhost/attributes/values/1" 
```

```javascript
const url = new URL("http://localhost/attributes/values/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "attribute_value_id": 1,
        "value": "S"
    },
    {
        "attribute_value_id": 2,
        "value": "M"
    },
    {
        "attribute_value_id": 3,
        "value": "L"
    },
    {
        "attribute_value_id": 4,
        "value": "XL"
    },
    {
        "attribute_value_id": 5,
        "value": "XXL"
    }
]
```

### HTTP Request
`GET attributes/values/{attribute_id}`


<!-- END_c9b9863aa3898a28de8f2b14dcfb6562 -->

<!-- START_8e7edc29c8cd381b955e0256756688b1 -->
## This method should return an array of all the product attributes.

> Example request:

```bash
curl -X GET -G "http://localhost/attributes/inProduct/1" 
```

```javascript
const url = new URL("http://localhost/attributes/inProduct/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "attribute_name": "Size",
        "attribute_value_id": 1,
        "attribute_value": "S"
    },
    {
        "attribute_name": "Size",
        "attribute_value_id": 2,
        "attribute_value": "M"
    },
    {
        "attribute_name": "Size",
        "attribute_value_id": 3,
        "attribute_value": "L"
    },
    {
        "attribute_name": "Size",
        "attribute_value_id": 4,
        "attribute_value": "XL"
    },
    {
        "attribute_name": "Size",
        "attribute_value_id": 5,
        "attribute_value": "XXL"
    },
    {
        "attribute_name": "Color",
        "attribute_value_id": 6,
        "attribute_value": "White"
    },
    {
        "attribute_name": "Color",
        "attribute_value_id": 7,
        "attribute_value": "Black"
    },
    {
        "attribute_name": "Color",
        "attribute_value_id": 8,
        "attribute_value": "Red"
    },
    {
        "attribute_name": "Color",
        "attribute_value_id": 9,
        "attribute_value": "Orange"
    },
    {
        "attribute_name": "Color",
        "attribute_value_id": 10,
        "attribute_value": "Yellow"
    },
    {
        "attribute_name": "Color",
        "attribute_value_id": 11,
        "attribute_value": "Green"
    },
    {
        "attribute_name": "Color",
        "attribute_value_id": 12,
        "attribute_value": "Blue"
    },
    {
        "attribute_name": "Color",
        "attribute_value_id": 13,
        "attribute_value": "Indigo"
    },
    {
        "attribute_name": "Color",
        "attribute_value_id": 14,
        "attribute_value": "Purple"
    }
]
```

### HTTP Request
`GET attributes/inProduct/{product_id}`


<!-- END_8e7edc29c8cd381b955e0256756688b1 -->

<!-- START_fcdf2da1997bd4d8d126f782bc06524c -->
## Return a paginated list of products.

> Example request:

```bash
curl -X GET -G "http://localhost/products" 
```

```javascript
const url = new URL("http://localhost/products");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "row": [
        {
            "product_id": 1,
            "name": "Arc d'Triomphe",
            "description": "This beautiful and iconic T-shirt will no doubt lead you to your own triumph.",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "arc-d-triomphe-thumbnail.gif"
        },
        {
            "product_id": 2,
            "name": "Chartres Cathedral",
            "description": "\"The Fur Merchants\". Not all the beautiful stained glass in the great cathedrals depicts saints and angels! Lay aside your furs for the summer and wear this beautiful T-shirt!",
            "price": "16.95",
            "discounted_price": "15.95",
            "thumbnail": "chartres-cathedral-thumbnail.gif"
        },
        {
            "product_id": 3,
            "name": "Coat of Arms",
            "description": "There's good reason why the ship plays a prominent part on this shield!",
            "price": "14.50",
            "discounted_price": "0.00",
            "thumbnail": "coat-of-arms-thumbnail.gif"
        },
        {
            "product_id": 4,
            "name": "Gallic Cock",
            "description": "This fancy chicken is perhaps the most beloved of all French symbols. Unfortunately, there are only a few hundred left, so you'd better get your T-shirt now!",
            "price": "18.99",
            "discounted_price": "16.99",
            "thumbnail": "gallic-cock-thumbnail.gif"
        },
        {
            "product_id": 5,
            "name": "Marianne",
            "description": "She symbolizes the \"Triumph of the Republic\" and has been depicted many different ways in the history of France, as you will see below!",
            "price": "15.95",
            "discounted_price": "14.95",
            "thumbnail": "marianne-thumbnail.gif"
        },
        {
            "product_id": 6,
            "name": "Alsace",
            "description": "It was in this region of France that Gutenberg perfected his movable type. If he could only see what he started!",
            "price": "16.50",
            "discounted_price": "0.00",
            "thumbnail": "alsace-thumbnail.gif"
        },
        {
            "product_id": 7,
            "name": "Apocalypse Tapestry",
            "description": "One of the most famous tapestries of the Loire Valley, it dates from the 14th century. The T-shirt is of more recent vintage, however.",
            "price": "20.00",
            "discounted_price": "18.95",
            "thumbnail": "apocalypse-tapestry-thumbnail.gif"
        },
        {
            "product_id": 8,
            "name": "Centaur",
            "description": "There were never any lady centaurs, so these guys had to mate with nymphs and mares. No wonder they were often in such bad moods!",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "centaur-thumbnail.gif"
        },
        {
            "product_id": 9,
            "name": "Corsica",
            "description": "Borrowed from Spain, the \"Moor's head\" may have celebrated the Christians' victory over the Moslems in that country.",
            "price": "22.00",
            "discounted_price": "0.00",
            "thumbnail": "corsica-thumbnail.gif"
        },
        {
            "product_id": 10,
            "name": "Haute Couture",
            "description": "This stamp publicized the dress making industry. Use it to celebrate the T-shirt industry!",
            "price": "15.99",
            "discounted_price": "14.95",
            "thumbnail": "haute-couture-thumbnail.gif"
        },
        {
            "product_id": 11,
            "name": "Iris",
            "description": "Iris was the Goddess of the Rainbow, daughter of the Titans Thaumas and Electra. Are you up to this T-shirt?!",
            "price": "17.50",
            "discounted_price": "0.00",
            "thumbnail": "iris-thumbnail.gif"
        },
        {
            "product_id": 12,
            "name": "Lorraine",
            "description": "The largest American cemetery in France is located in Lorraine and most of the folks there still appreciate that fact.",
            "price": "16.95",
            "discounted_price": "0.00",
            "thumbnail": "lorraine-thumbnail.gif"
        },
        {
            "product_id": 13,
            "name": "Mercury",
            "description": "Besides being the messenger of the gods, did you know that Mercury was also the god of profit and commerce? This T-shirt is for business owners!",
            "price": "21.99",
            "discounted_price": "18.95",
            "thumbnail": "mercury-thumbnail.gif"
        },
        {
            "product_id": 14,
            "name": "County of Nice",
            "description": "Nice is so nice that it has been fought over for millennia, but now it all belongs to France.",
            "price": "12.95",
            "discounted_price": "0.00",
            "thumbnail": "county-of-nice-thumbnail.gif"
        },
        {
            "product_id": 15,
            "name": "Notre Dame",
            "description": "Commemorating the 800th anniversary of the famed cathedral.",
            "price": "18.50",
            "discounted_price": "16.99",
            "thumbnail": "notre-dame-thumbnail.gif"
        },
        {
            "product_id": 16,
            "name": "Paris Peace Conference",
            "description": "The resulting treaties allowed Italy, Romania, Hungary, Bulgaria, and Finland to reassume their responsibilities as sovereign states in international affairs and thus qualify for membership in the UN.",
            "price": "16.95",
            "discounted_price": "15.99",
            "thumbnail": "paris-peace-conference-thumbnail.gif"
        },
        {
            "product_id": 17,
            "name": "Sarah Bernhardt",
            "description": "The \"Divine Sarah\" said this about Americans: \"You are younger than we as a race, you are perhaps barbaric, but what of it? You are still in the molding. Your spirit is superb. It is what helped us wi",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "sarah-bernhardt-thumbnail.gif"
        },
        {
            "product_id": 18,
            "name": "Hunt",
            "description": "A scene from \"Les Tres Riches Heures,\" a medieval \"book of hours\" containing the text for each liturgical hour of the day. This scene is from a 14th century painting.",
            "price": "16.99",
            "discounted_price": "15.95",
            "thumbnail": "hunt-thumbnail.gif"
        },
        {
            "product_id": 19,
            "name": "Italia",
            "description": "The War had just ended when this stamp was designed, and even so, there was enough optimism to show the destroyed oak tree sprouting again from its stump! What a beautiful T-shirt!",
            "price": "22.00",
            "discounted_price": "18.99",
            "thumbnail": "italia-thumbnail.gif"
        },
        {
            "product_id": 20,
            "name": "Torch",
            "description": "The light goes on! Carry the torch with this T-shirt and be a beacon of hope for the world!",
            "price": "19.99",
            "discounted_price": "17.95",
            "thumbnail": "torch-thumbnail.gif"
        }
    ],
    "paginationMeta": {
        "currentPageSize": 20,
        "currentPage": 1,
        "totalPages": 6,
        "totalRecords": 101
    }
}
```

### HTTP Request
`GET products`


<!-- END_fcdf2da1997bd4d8d126f782bc06524c -->

<!-- START_05c2fe19eb36f1a6675c2342eb77edee -->
## Returns a list of product that matches the search query string.

> Example request:

```bash
curl -X GET -G "http://localhost/products/search" 
```

```javascript
const url = new URL("http://localhost/products/search");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "row": [
        {
            "product_id": 1,
            "name": "Arc d'Triomphe",
            "description": "This beautiful and iconic T-shirt will no doubt lead you to your own triumph.",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "arc-d-triomphe-thumbnail.gif"
        },
        {
            "product_id": 2,
            "name": "Chartres Cathedral",
            "description": "\"The Fur Merchants\". Not all the beautiful stained glass in the great cathedrals depicts saints and angels! Lay aside your furs for the summer and wear this beautiful T-shirt!",
            "price": "16.95",
            "discounted_price": "15.95",
            "thumbnail": "chartres-cathedral-thumbnail.gif"
        },
        {
            "product_id": 3,
            "name": "Coat of Arms",
            "description": "There's good reason why the ship plays a prominent part on this shield!",
            "price": "14.50",
            "discounted_price": "0.00",
            "thumbnail": "coat-of-arms-thumbnail.gif"
        },
        {
            "product_id": 4,
            "name": "Gallic Cock",
            "description": "This fancy chicken is perhaps the most beloved of all French symbols. Unfortunately, there are only a few hundred left, so you'd better get your T-shirt now!",
            "price": "18.99",
            "discounted_price": "16.99",
            "thumbnail": "gallic-cock-thumbnail.gif"
        },
        {
            "product_id": 5,
            "name": "Marianne",
            "description": "She symbolizes the \"Triumph of the Republic\" and has been depicted many different ways in the history of France, as you will see below!",
            "price": "15.95",
            "discounted_price": "14.95",
            "thumbnail": "marianne-thumbnail.gif"
        },
        {
            "product_id": 6,
            "name": "Alsace",
            "description": "It was in this region of France that Gutenberg perfected his movable type. If he could only see what he started!",
            "price": "16.50",
            "discounted_price": "0.00",
            "thumbnail": "alsace-thumbnail.gif"
        },
        {
            "product_id": 7,
            "name": "Apocalypse Tapestry",
            "description": "One of the most famous tapestries of the Loire Valley, it dates from the 14th century. The T-shirt is of more recent vintage, however.",
            "price": "20.00",
            "discounted_price": "18.95",
            "thumbnail": "apocalypse-tapestry-thumbnail.gif"
        },
        {
            "product_id": 8,
            "name": "Centaur",
            "description": "There were never any lady centaurs, so these guys had to mate with nymphs and mares. No wonder they were often in such bad moods!",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "centaur-thumbnail.gif"
        },
        {
            "product_id": 9,
            "name": "Corsica",
            "description": "Borrowed from Spain, the \"Moor's head\" may have celebrated the Christians' victory over the Moslems in that country.",
            "price": "22.00",
            "discounted_price": "0.00",
            "thumbnail": "corsica-thumbnail.gif"
        },
        {
            "product_id": 10,
            "name": "Haute Couture",
            "description": "This stamp publicized the dress making industry. Use it to celebrate the T-shirt industry!",
            "price": "15.99",
            "discounted_price": "14.95",
            "thumbnail": "haute-couture-thumbnail.gif"
        },
        {
            "product_id": 11,
            "name": "Iris",
            "description": "Iris was the Goddess of the Rainbow, daughter of the Titans Thaumas and Electra. Are you up to this T-shirt?!",
            "price": "17.50",
            "discounted_price": "0.00",
            "thumbnail": "iris-thumbnail.gif"
        },
        {
            "product_id": 12,
            "name": "Lorraine",
            "description": "The largest American cemetery in France is located in Lorraine and most of the folks there still appreciate that fact.",
            "price": "16.95",
            "discounted_price": "0.00",
            "thumbnail": "lorraine-thumbnail.gif"
        },
        {
            "product_id": 13,
            "name": "Mercury",
            "description": "Besides being the messenger of the gods, did you know that Mercury was also the god of profit and commerce? This T-shirt is for business owners!",
            "price": "21.99",
            "discounted_price": "18.95",
            "thumbnail": "mercury-thumbnail.gif"
        },
        {
            "product_id": 14,
            "name": "County of Nice",
            "description": "Nice is so nice that it has been fought over for millennia, but now it all belongs to France.",
            "price": "12.95",
            "discounted_price": "0.00",
            "thumbnail": "county-of-nice-thumbnail.gif"
        },
        {
            "product_id": 15,
            "name": "Notre Dame",
            "description": "Commemorating the 800th anniversary of the famed cathedral.",
            "price": "18.50",
            "discounted_price": "16.99",
            "thumbnail": "notre-dame-thumbnail.gif"
        },
        {
            "product_id": 16,
            "name": "Paris Peace Conference",
            "description": "The resulting treaties allowed Italy, Romania, Hungary, Bulgaria, and Finland to reassume their responsibilities as sovereign states in international affairs and thus qualify for membership in the UN.",
            "price": "16.95",
            "discounted_price": "15.99",
            "thumbnail": "paris-peace-conference-thumbnail.gif"
        },
        {
            "product_id": 17,
            "name": "Sarah Bernhardt",
            "description": "The \"Divine Sarah\" said this about Americans: \"You are younger than we as a race, you are perhaps barbaric, but what of it? You are still in the molding. Your spirit is superb. It is what helped us wi",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "sarah-bernhardt-thumbnail.gif"
        },
        {
            "product_id": 18,
            "name": "Hunt",
            "description": "A scene from \"Les Tres Riches Heures,\" a medieval \"book of hours\" containing the text for each liturgical hour of the day. This scene is from a 14th century painting.",
            "price": "16.99",
            "discounted_price": "15.95",
            "thumbnail": "hunt-thumbnail.gif"
        },
        {
            "product_id": 19,
            "name": "Italia",
            "description": "The War had just ended when this stamp was designed, and even so, there was enough optimism to show the destroyed oak tree sprouting again from its stump! What a beautiful T-shirt!",
            "price": "22.00",
            "discounted_price": "18.99",
            "thumbnail": "italia-thumbnail.gif"
        },
        {
            "product_id": 20,
            "name": "Torch",
            "description": "The light goes on! Carry the torch with this T-shirt and be a beacon of hope for the world!",
            "price": "19.99",
            "discounted_price": "17.95",
            "thumbnail": "torch-thumbnail.gif"
        }
    ],
    "paginationMeta": {
        "currentPageSize": 20,
        "currentPage": 1,
        "totalPages": 6,
        "totalRecords": 101
    }
}
```

### HTTP Request
`GET products/search`


<!-- END_05c2fe19eb36f1a6675c2342eb77edee -->

<!-- START_0ca1ff1633857121cf1a1501666232aa -->
## Returns a single product with a matched id in the request params.

> Example request:

```bash
curl -X GET -G "http://localhost/products/1" 
```

```javascript
const url = new URL("http://localhost/products/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "product_id": 1,
    "name": "Arc d'Triomphe",
    "description": "This beautiful and iconic T-shirt will no doubt lead you to your own triumph.",
    "price": "14.99",
    "discounted_price": "0.00",
    "thumbnail": "arc-d-triomphe-thumbnail.gif",
    "image": "arc-d-triomphe.gif",
    "image_2": "arc-d-triomphe-2.gif",
    "displayl": 0
}
```

### HTTP Request
`GET products/{product_id}`


<!-- END_0ca1ff1633857121cf1a1501666232aa -->

<!-- START_7f0d95d6ac1e74e48fd46c62b46a65b5 -->
## Returns all products in a product category.

> Example request:

```bash
curl -X GET -G "http://localhost/products/inCategory/1" 
```

```javascript
const url = new URL("http://localhost/products/inCategory/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "row": [
        {
            "product_id": 1,
            "name": "Arc d'Triomphe",
            "description": "This beautiful and iconic T-shirt will no doubt lead you to your own triumph.",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "arc-d-triomphe-thumbnail.gif"
        },
        {
            "product_id": 2,
            "name": "Chartres Cathedral",
            "description": "\"The Fur Merchants\". Not all the beautiful stained glass in the great cathedrals depicts saints and angels! Lay aside your furs for the summer and wear this beautiful T-shirt!",
            "price": "16.95",
            "discounted_price": "15.95",
            "thumbnail": "chartres-cathedral-thumbnail.gif"
        },
        {
            "product_id": 3,
            "name": "Coat of Arms",
            "description": "There's good reason why the ship plays a prominent part on this shield!",
            "price": "14.50",
            "discounted_price": "0.00",
            "thumbnail": "coat-of-arms-thumbnail.gif"
        },
        {
            "product_id": 4,
            "name": "Gallic Cock",
            "description": "This fancy chicken is perhaps the most beloved of all French symbols. Unfortunately, there are only a few hundred left, so you'd better get your T-shirt now!",
            "price": "18.99",
            "discounted_price": "16.99",
            "thumbnail": "gallic-cock-thumbnail.gif"
        },
        {
            "product_id": 5,
            "name": "Marianne",
            "description": "She symbolizes the \"Triumph of the Republic\" and has been depicted many different ways in the history of France, as you will see below!",
            "price": "15.95",
            "discounted_price": "14.95",
            "thumbnail": "marianne-thumbnail.gif"
        },
        {
            "product_id": 6,
            "name": "Alsace",
            "description": "It was in this region of France that Gutenberg perfected his movable type. If he could only see what he started!",
            "price": "16.50",
            "discounted_price": "0.00",
            "thumbnail": "alsace-thumbnail.gif"
        },
        {
            "product_id": 7,
            "name": "Apocalypse Tapestry",
            "description": "One of the most famous tapestries of the Loire Valley, it dates from the 14th century. The T-shirt is of more recent vintage, however.",
            "price": "20.00",
            "discounted_price": "18.95",
            "thumbnail": "apocalypse-tapestry-thumbnail.gif"
        },
        {
            "product_id": 8,
            "name": "Centaur",
            "description": "There were never any lady centaurs, so these guys had to mate with nymphs and mares. No wonder they were often in such bad moods!",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "centaur-thumbnail.gif"
        },
        {
            "product_id": 9,
            "name": "Corsica",
            "description": "Borrowed from Spain, the \"Moor's head\" may have celebrated the Christians' victory over the Moslems in that country.",
            "price": "22.00",
            "discounted_price": "0.00",
            "thumbnail": "corsica-thumbnail.gif"
        },
        {
            "product_id": 10,
            "name": "Haute Couture",
            "description": "This stamp publicized the dress making industry. Use it to celebrate the T-shirt industry!",
            "price": "15.99",
            "discounted_price": "14.95",
            "thumbnail": "haute-couture-thumbnail.gif"
        },
        {
            "product_id": 11,
            "name": "Iris",
            "description": "Iris was the Goddess of the Rainbow, daughter of the Titans Thaumas and Electra. Are you up to this T-shirt?!",
            "price": "17.50",
            "discounted_price": "0.00",
            "thumbnail": "iris-thumbnail.gif"
        },
        {
            "product_id": 12,
            "name": "Lorraine",
            "description": "The largest American cemetery in France is located in Lorraine and most of the folks there still appreciate that fact.",
            "price": "16.95",
            "discounted_price": "0.00",
            "thumbnail": "lorraine-thumbnail.gif"
        },
        {
            "product_id": 13,
            "name": "Mercury",
            "description": "Besides being the messenger of the gods, did you know that Mercury was also the god of profit and commerce? This T-shirt is for business owners!",
            "price": "21.99",
            "discounted_price": "18.95",
            "thumbnail": "mercury-thumbnail.gif"
        },
        {
            "product_id": 14,
            "name": "County of Nice",
            "description": "Nice is so nice that it has been fought over for millennia, but now it all belongs to France.",
            "price": "12.95",
            "discounted_price": "0.00",
            "thumbnail": "county-of-nice-thumbnail.gif"
        },
        {
            "product_id": 15,
            "name": "Notre Dame",
            "description": "Commemorating the 800th anniversary of the famed cathedral.",
            "price": "18.50",
            "discounted_price": "16.99",
            "thumbnail": "notre-dame-thumbnail.gif"
        },
        {
            "product_id": 16,
            "name": "Paris Peace Conference",
            "description": "The resulting treaties allowed Italy, Romania, Hungary, Bulgaria, and Finland to reassume their responsibilities as sovereign states in international affairs and thus qualify for membership in the UN.",
            "price": "16.95",
            "discounted_price": "15.99",
            "thumbnail": "paris-peace-conference-thumbnail.gif"
        },
        {
            "product_id": 17,
            "name": "Sarah Bernhardt",
            "description": "The \"Divine Sarah\" said this about Americans: \"You are younger than we as a race, you are perhaps barbaric, but what of it? You are still in the molding. Your spirit is superb. It is what helped us wi",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "sarah-bernhardt-thumbnail.gif"
        },
        {
            "product_id": 18,
            "name": "Hunt",
            "description": "A scene from \"Les Tres Riches Heures,\" a medieval \"book of hours\" containing the text for each liturgical hour of the day. This scene is from a 14th century painting.",
            "price": "16.99",
            "discounted_price": "15.95",
            "thumbnail": "hunt-thumbnail.gif"
        }
    ],
    "paginationMeta": {
        "currentPageSize": 20,
        "currentPage": 1,
        "totalPages": 1,
        "totalRecords": 18
    }
}
```

### HTTP Request
`GET products/inCategory/{category_id}`


<!-- END_7f0d95d6ac1e74e48fd46c62b46a65b5 -->

<!-- START_549c97718d83adeea01deaa8d84ed53d -->
## Returns a list of products in a particular department.

> Example request:

```bash
curl -X GET -G "http://localhost/products/inDepartment/1" 
```

```javascript
const url = new URL("http://localhost/products/inDepartment/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "row": [
        {
            "product_id": 1,
            "name": "Arc d'Triomphe",
            "description": "This beautiful and iconic T-shirt will no doubt lead you to your own triumph.",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "arc-d-triomphe-thumbnail.gif"
        },
        {
            "product_id": 2,
            "name": "Chartres Cathedral",
            "description": "\"The Fur Merchants\". Not all the beautiful stained glass in the great cathedrals depicts saints and angels! Lay aside your furs for the summer and wear this beautiful T-shirt!",
            "price": "16.95",
            "discounted_price": "15.95",
            "thumbnail": "chartres-cathedral-thumbnail.gif"
        },
        {
            "product_id": 3,
            "name": "Coat of Arms",
            "description": "There's good reason why the ship plays a prominent part on this shield!",
            "price": "14.50",
            "discounted_price": "0.00",
            "thumbnail": "coat-of-arms-thumbnail.gif"
        },
        {
            "product_id": 4,
            "name": "Gallic Cock",
            "description": "This fancy chicken is perhaps the most beloved of all French symbols. Unfortunately, there are only a few hundred left, so you'd better get your T-shirt now!",
            "price": "18.99",
            "discounted_price": "16.99",
            "thumbnail": "gallic-cock-thumbnail.gif"
        },
        {
            "product_id": 5,
            "name": "Marianne",
            "description": "She symbolizes the \"Triumph of the Republic\" and has been depicted many different ways in the history of France, as you will see below!",
            "price": "15.95",
            "discounted_price": "14.95",
            "thumbnail": "marianne-thumbnail.gif"
        },
        {
            "product_id": 6,
            "name": "Alsace",
            "description": "It was in this region of France that Gutenberg perfected his movable type. If he could only see what he started!",
            "price": "16.50",
            "discounted_price": "0.00",
            "thumbnail": "alsace-thumbnail.gif"
        },
        {
            "product_id": 7,
            "name": "Apocalypse Tapestry",
            "description": "One of the most famous tapestries of the Loire Valley, it dates from the 14th century. The T-shirt is of more recent vintage, however.",
            "price": "20.00",
            "discounted_price": "18.95",
            "thumbnail": "apocalypse-tapestry-thumbnail.gif"
        },
        {
            "product_id": 8,
            "name": "Centaur",
            "description": "There were never any lady centaurs, so these guys had to mate with nymphs and mares. No wonder they were often in such bad moods!",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "centaur-thumbnail.gif"
        },
        {
            "product_id": 9,
            "name": "Corsica",
            "description": "Borrowed from Spain, the \"Moor's head\" may have celebrated the Christians' victory over the Moslems in that country.",
            "price": "22.00",
            "discounted_price": "0.00",
            "thumbnail": "corsica-thumbnail.gif"
        },
        {
            "product_id": 10,
            "name": "Haute Couture",
            "description": "This stamp publicized the dress making industry. Use it to celebrate the T-shirt industry!",
            "price": "15.99",
            "discounted_price": "14.95",
            "thumbnail": "haute-couture-thumbnail.gif"
        },
        {
            "product_id": 11,
            "name": "Iris",
            "description": "Iris was the Goddess of the Rainbow, daughter of the Titans Thaumas and Electra. Are you up to this T-shirt?!",
            "price": "17.50",
            "discounted_price": "0.00",
            "thumbnail": "iris-thumbnail.gif"
        },
        {
            "product_id": 12,
            "name": "Lorraine",
            "description": "The largest American cemetery in France is located in Lorraine and most of the folks there still appreciate that fact.",
            "price": "16.95",
            "discounted_price": "0.00",
            "thumbnail": "lorraine-thumbnail.gif"
        },
        {
            "product_id": 13,
            "name": "Mercury",
            "description": "Besides being the messenger of the gods, did you know that Mercury was also the god of profit and commerce? This T-shirt is for business owners!",
            "price": "21.99",
            "discounted_price": "18.95",
            "thumbnail": "mercury-thumbnail.gif"
        },
        {
            "product_id": 14,
            "name": "County of Nice",
            "description": "Nice is so nice that it has been fought over for millennia, but now it all belongs to France.",
            "price": "12.95",
            "discounted_price": "0.00",
            "thumbnail": "county-of-nice-thumbnail.gif"
        },
        {
            "product_id": 15,
            "name": "Notre Dame",
            "description": "Commemorating the 800th anniversary of the famed cathedral.",
            "price": "18.50",
            "discounted_price": "16.99",
            "thumbnail": "notre-dame-thumbnail.gif"
        },
        {
            "product_id": 16,
            "name": "Paris Peace Conference",
            "description": "The resulting treaties allowed Italy, Romania, Hungary, Bulgaria, and Finland to reassume their responsibilities as sovereign states in international affairs and thus qualify for membership in the UN.",
            "price": "16.95",
            "discounted_price": "15.99",
            "thumbnail": "paris-peace-conference-thumbnail.gif"
        },
        {
            "product_id": 17,
            "name": "Sarah Bernhardt",
            "description": "The \"Divine Sarah\" said this about Americans: \"You are younger than we as a race, you are perhaps barbaric, but what of it? You are still in the molding. Your spirit is superb. It is what helped us wi",
            "price": "14.99",
            "discounted_price": "0.00",
            "thumbnail": "sarah-bernhardt-thumbnail.gif"
        },
        {
            "product_id": 18,
            "name": "Hunt",
            "description": "A scene from \"Les Tres Riches Heures,\" a medieval \"book of hours\" containing the text for each liturgical hour of the day. This scene is from a 14th century painting.",
            "price": "16.99",
            "discounted_price": "15.95",
            "thumbnail": "hunt-thumbnail.gif"
        },
        {
            "product_id": 19,
            "name": "Italia",
            "description": "The War had just ended when this stamp was designed, and even so, there was enough optimism to show the destroyed oak tree sprouting again from its stump! What a beautiful T-shirt!",
            "price": "22.00",
            "discounted_price": "18.99",
            "thumbnail": "italia-thumbnail.gif"
        },
        {
            "product_id": 20,
            "name": "Torch",
            "description": "The light goes on! Carry the torch with this T-shirt and be a beacon of hope for the world!",
            "price": "19.99",
            "discounted_price": "17.95",
            "thumbnail": "torch-thumbnail.gif"
        }
    ],
    "paginationMeta": {
        "currentPageSize": 20,
        "currentPage": 1,
        "totalPages": 2,
        "totalRecords": 35
    }
}
```

### HTTP Request
`GET products/inDepartment/{department_id}`


<!-- END_549c97718d83adeea01deaa8d84ed53d -->

<!-- START_041ac36d0123463a3efde5ce92c272bf -->
## Returns a single product reviews with a matched id in the request params.

> Example request:

```bash
curl -X GET -G "http://localhost/products/1/reviews" 
```

```javascript
const url = new URL("http://localhost/products/1/reviews");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[]
```

### HTTP Request
`GET products/{product_id}/reviews`


<!-- END_041ac36d0123463a3efde5ce92c272bf -->

<!-- START_ae6f7c6c70f8b69867cceafc34802c7d -->
## Returns a single product reviews with a matched id in the request params.

> Example request:

```bash
curl -X POST "http://localhost/products/1/reviews" 
```

```javascript
const url = new URL("http://localhost/products/1/reviews");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST products/{product_id}/reviews`


<!-- END_ae6f7c6c70f8b69867cceafc34802c7d -->

<!-- START_6a107a131f853e92450ac742beba0e7f -->
## Returns all categories.

> Example request:

```bash
curl -X GET -G "http://localhost/categories" 
```

```javascript
const url = new URL("http://localhost/categories");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "row": [
        {
            "category_id": 1,
            "department_id": 1,
            "name": "French",
            "description": "The French have always had an eye for beauty. One look at the T-shirts below and you'll see that same appreciation has been applied abundantly to their postage stamps. Below are some of our most beautiful and colorful T-shirts, so browse away! And don't forget to go all the way to the bottom - you don't want to miss any of them!"
        },
        {
            "category_id": 2,
            "department_id": 1,
            "name": "Italian",
            "description": "The full and resplendent treasure chest of art, literature, music, and science that Italy has given the world is reflected splendidly in its postal stamps. If we could, we would dedicate hundreds of T-shirts to this amazing treasure of beautiful images, but for now we will have to live with what you see here. You don't have to be Italian to love these gorgeous T-shirts, just someone who appreciates the finer things in life!"
        },
        {
            "category_id": 3,
            "department_id": 1,
            "name": "Irish",
            "description": "It was Churchill who remarked that he thought the Irish most curious because they didn't want to be English. How right he was! But then, he was half-American, wasn't he? If you have an Irish genealogy you will want these T-shirts! If you suddenly turn Irish on St. Patrick's Day, you too will want these T-shirts! Take a look at some of the coolest T-shirts we have!"
        },
        {
            "category_id": 4,
            "department_id": 2,
            "name": "Animal",
            "description": " Our ever-growing selection of beautiful animal T-shirts represents critters from everywhere, both wild and domestic. If you don't see the T-shirt with the animal you're looking for, tell us and we'll find it!"
        },
        {
            "category_id": 5,
            "department_id": 2,
            "name": "Flower",
            "description": "These unique and beautiful flower T-shirts are just the item for the gardener, flower arranger, florist, or general lover of things beautiful. Surprise the flower in your life with one of the beautiful botanical T-shirts or just get a few for yourself!"
        },
        {
            "category_id": 6,
            "department_id": 3,
            "name": "Christmas",
            "description": " Because this is a unique Christmas T-shirt that you'll only wear a few times a year, it will probably last for decades (unless some grinch nabs it from you, of course). Far into the future, after you're gone, your grandkids will pull it out and argue over who gets to wear it. What great snapshots they'll make dressed in Grandpa or Grandma's incredibly tasteful and unique Christmas T-shirt! Yes, everyone will remember you forever and what a silly goof you were when you would wear only your Santa beard and cap so you wouldn't cover up your nifty T-shirt."
        },
        {
            "category_id": 7,
            "department_id": 3,
            "name": "Valentine's",
            "description": "For the more timid, all you have to do is wear your heartfelt message to get it across. Buy one for you and your sweetie(s) today!"
        }
    ]
}
```

### HTTP Request
`GET categories`


<!-- END_6a107a131f853e92450ac742beba0e7f -->

<!-- START_6543fb10dfa42991ee3f78caafbc5315 -->
## Returns all categories in a department.

> Example request:

```bash
curl -X GET -G "http://localhost/categories/1" 
```

```javascript
const url = new URL("http://localhost/categories/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "category_id": 1,
    "department_id": 1,
    "name": "French",
    "description": "The French have always had an eye for beauty. One look at the T-shirts below and you'll see that same appreciation has been applied abundantly to their postage stamps. Below are some of our most beautiful and colorful T-shirts, so browse away! And don't forget to go all the way to the bottom - you don't want to miss any of them!"
}
```

### HTTP Request
`GET categories/{category_id}`


<!-- END_6543fb10dfa42991ee3f78caafbc5315 -->

<!-- START_3d88a1d3ee028714e544c7b8f56dfc39 -->
## Returns all categories in a department.

> Example request:

```bash
curl -X GET -G "http://localhost/categories/inProduct/1" 
```

```javascript
const url = new URL("http://localhost/categories/inProduct/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "category_id": 1,
    "department_id": 1,
    "name": "French"
}
```

### HTTP Request
`GET categories/inProduct/{product_id}`


<!-- END_3d88a1d3ee028714e544c7b8f56dfc39 -->

<!-- START_2482263ad1c034c74a655aff391efea3 -->
## Returns all categories in a department.

> Example request:

```bash
curl -X GET -G "http://localhost/categories/inDepartment/1" 
```

```javascript
const url = new URL("http://localhost/categories/inDepartment/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "row": [
        {
            "category_id": 1,
            "department_id": 1,
            "name": "French",
            "description": "The French have always had an eye for beauty. One look at the T-shirts below and you'll see that same appreciation has been applied abundantly to their postage stamps. Below are some of our most beautiful and colorful T-shirts, so browse away! And don't forget to go all the way to the bottom - you don't want to miss any of them!"
        },
        {
            "category_id": 2,
            "department_id": 1,
            "name": "Italian",
            "description": "The full and resplendent treasure chest of art, literature, music, and science that Italy has given the world is reflected splendidly in its postal stamps. If we could, we would dedicate hundreds of T-shirts to this amazing treasure of beautiful images, but for now we will have to live with what you see here. You don't have to be Italian to love these gorgeous T-shirts, just someone who appreciates the finer things in life!"
        },
        {
            "category_id": 3,
            "department_id": 1,
            "name": "Irish",
            "description": "It was Churchill who remarked that he thought the Irish most curious because they didn't want to be English. How right he was! But then, he was half-American, wasn't he? If you have an Irish genealogy you will want these T-shirts! If you suddenly turn Irish on St. Patrick's Day, you too will want these T-shirts! Take a look at some of the coolest T-shirts we have!"
        }
    ]
}
```

### HTTP Request
`GET categories/inDepartment/{department_id}`


<!-- END_2482263ad1c034c74a655aff391efea3 -->

<!-- START_d4533983ac4fa22041eab1e31ded3205 -->
## Returns a list of all shipping region.

> Example request:

```bash
curl -X GET -G "http://localhost/shipping/regions" 
```

```javascript
const url = new URL("http://localhost/shipping/regions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "shipping_region_id": 1,
        "shipping_region": "Please Select"
    },
    {
        "shipping_region_id": 2,
        "shipping_region": "US \/ Canada"
    },
    {
        "shipping_region_id": 3,
        "shipping_region": "Europe"
    },
    {
        "shipping_region_id": 4,
        "shipping_region": "Rest of World"
    }
]
```

### HTTP Request
`GET shipping/regions`


<!-- END_d4533983ac4fa22041eab1e31ded3205 -->

<!-- START_4defd83e94e02d5c35207ae378fcfd3c -->
## Returns a list of shipping type in a specific shipping region.

> Example request:

```bash
curl -X GET -G "http://localhost/shipping/regions/1" 
```

```javascript
const url = new URL("http://localhost/shipping/regions/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[]
```

### HTTP Request
`GET shipping/regions/{shipping_region_id}`


<!-- END_4defd83e94e02d5c35207ae378fcfd3c -->

<!-- START_6454180792b18151c8d59433ef907f9c -->
## Allow customers to create a new account.

> Example request:

```bash
curl -X POST "http://localhost/customers" 
```

```javascript
const url = new URL("http://localhost/customers");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST customers`


<!-- END_6454180792b18151c8d59433ef907f9c -->

<!-- START_081225f9fc2410374ad3f7330bc01d22 -->
## Allow customers to login to their account.

> Example request:

```bash
curl -X POST "http://localhost/customers/login" 
```

```javascript
const url = new URL("http://localhost/customers/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST customers/login`


<!-- END_081225f9fc2410374ad3f7330bc01d22 -->

<!-- START_32d481daedb8bf2ac254285ae54c33aa -->
## Allow customers to login to their account.

> Example request:

```bash
curl -X POST "http://localhost/customers/facebook" 
```

```javascript
const url = new URL("http://localhost/customers/facebook");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST customers/facebook`


<!-- END_32d481daedb8bf2ac254285ae54c33aa -->

<!-- START_62069ef0c1347733e31b12c261877f45 -->
## This method get all taxes.

> Example request:

```bash
curl -X GET -G "http://localhost/tax" 
```

```javascript
const url = new URL("http://localhost/tax");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "tax_id": 1,
        "tax_type": "Sales Tax at 8.5%",
        "tax_percentage": "8.50"
    },
    {
        "tax_id": 2,
        "tax_type": "No Tax",
        "tax_percentage": "0.00"
    }
]
```

### HTTP Request
`GET tax`


<!-- END_62069ef0c1347733e31b12c261877f45 -->

<!-- START_1b52bc41a17ba2d3b6a1b2f83b46e8cf -->
## This method gets a single tax using the tax id.

> Example request:

```bash
curl -X GET -G "http://localhost/tax/1" 
```

```javascript
const url = new URL("http://localhost/tax/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "tax_id": 1,
    "tax_type": "Sales Tax at 8.5%",
    "tax_percentage": "8.50"
}
```

### HTTP Request
`GET tax/{tax_id}`


<!-- END_1b52bc41a17ba2d3b6a1b2f83b46e8cf -->


