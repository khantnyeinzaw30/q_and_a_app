const storeToken = (response) => {
  // console.log(response.data);
  if (response.data) {
    const user = JSON.stringify(response.data);
    localStorage.setItem("userData", user);
  }
};

export default storeToken;
