function init() {
  init_head();
  getData('controller/rest.php?page=1&perpage=5');
}
function init_head() {
  header = "";
  htable = ['id','name', 'age','address', 'telno.','operator'];
  htable.forEach((item, index) => {
    header += "<th>"+item+"</th>";
  });
  document.getElementById('header').innerHTML = "<tr>"+header+"</tr>";
}

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

async function postData(UrlResource) {
  const postData = { title: title, description: description, };
  try { const response = await fetch(Urlresource, {
     method: "post",
     headers: { "Content-Type": "application/json" },
     body: JSON.stringify(postData) });
     if (!response.ok) {
        const message = 'Error with Status Code:'+response.status;
        throw new Error(message);
     }
     const data = await response.json();
     console.log(data);
  }
  catch (error) {
     console.log('Error: ' + err);
  }
}

async function putData(UrlResource) {
  const putData = { title: title, description: description, };
  try { const response = await fetch(Urlresource, {
     method: "put",
     headers: { "Content-Type": "application/json" },
     body: JSON.stringify(postData) });
     if (!response.ok) {
        const message = 'Error with Status Code:'+response.status;
        throw new Error(message);
     }
     const data = await response.json();
     console.log(data);
  }
  catch (error) {
     console.log('Error: ' + err);
  }
}

async function deleteDataById(baseURL,id) {
  let resultElement = document.getElementById("deleteResult");
  resultElement.innerHTML = "";
  try{
    const res  = await fetch(`${baseURL}?id={id}`,{method:"delete"});
    const data = await res.json();
    const result = {
       status: res.status + "-" + res.statusText,
       headers: { "Content-Type": res.headers.get("Content-Type")},
       data: data,
     };
     resultElement.innerHTML = result;
   }
   catch(err) {
     resultElement.innerHTML = err.message;
   }
}
