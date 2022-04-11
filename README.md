# php-js-ajax

<h1>welcome to my repo</h1>

<h3>How to Implement FatchAPI</h3>

Fetch is onces of build-in API of mozilla WEB API.
Fetch API is an alternative way to provides JavaScript interface for accessing and manipulating parts of the HTTP pipeline, such as requests and responses by global fetch() method to fetch resources asynchronously across the network.
for lastest update example please visit to A repository of Fetch examples.

See https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API

basic fetch request is really simple to set up like this:
<pre>
fetch(url)
	.then(response => {
     // handle the response
    })
	.catch(error => {
    // handle the error
    });
</pre>

In this tutorial will create examples that use JavaScript fetch() method to make Get/Post/Put/Delete request.
by:     
  - HTTP Client to interact and get data from Rest API in JavaScript.
  - fetch() returns a Promise that resolves with a Response object, which is fulfilled once the response is available.

<pre>
    const responsePromise = fetch(resourceUrl [, options]);
</pre>

|Return Promise|
|:--|
| response.arrayBuffer() |
| response.blob() |
| response.error() |
| response.formData() |
| response.json() |
| response.text() |

<h3>Example Post method</h3>
<pre>
async function getData(UrlResource) {
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
</pre>
