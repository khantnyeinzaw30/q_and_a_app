const storeToken = (response) => {
  console.log(response.data);
  if (response.data.status == "ok") {
    localStorage.setItem("userToken", response.data.token);
  }
};

export default storeToken;
