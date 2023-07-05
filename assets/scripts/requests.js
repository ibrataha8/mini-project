async function getData(apiURL) {
    const response = await fetch(apiURL);
    const data = await response.json();
    return data;
  }

function goTo(url) {
  window.location.replace(url);  
}