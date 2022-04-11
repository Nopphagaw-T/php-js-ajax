# php-js-ajax

<h1>welcome to my repo</h1>

<h3>Introduce Fetch API</h3>
Fetch API is an alternative way to provides JavaScript interface for accessing and manipulating parts of the HTTP pipeline, such as requests and responses by global fetch() method to fetch resources asynchronously across the network.

basic fetch request is really simple to set up like this:

fetch(url)
	.then(response => {
     // handle the response
    })
	.catch(error => {
    // handle the error
    });

In this tutorial will create examples that use JavaScript fetch() method to make Get/Post/Put/Delete request.
by:     
  - HTTP Client to interact and get data from Rest API in JavaScript.
  - fetch() returns a Promise that resolves with a Response object, which is fulfilled once the response is available.

    const responsePromise = fetch(resourceUrl [, options]);

    response.arrayBuffer(): 	
    	returns a promise that resolves with an ArrayBuffer.
    response.blob(): 			
    	returns a Promise that resolves with a Blob.
    response.error(): 			
    	returns a new Response object associated with a network error.
    response.formData():
    	returns a Promise that resolves with a FormData.
    response.json(): 			
    	returns a Promise that resolves with the result of parsing as JSON.
    response.text():
    	returns a Promise that resolves with a text.

<h3>Example Post method</h3>
async function getData() {
  try {
    const response = await fetch(UrlResource);
    if (!response.ok) {
      const message = 'Error with Status Code: ' + response.status;
      throw new Error(message);
    }
    const data = await response.json();
    console.log(data);
  } catch (error) {
    console.log('Error: ' + err);
  }
}
