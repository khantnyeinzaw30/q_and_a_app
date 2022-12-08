const formatDate = (response) => {
  response.data.questions.forEach((element) => {
    let dbDate = new Date(element.created_at);
    let months = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];
    let day = dbDate.getDate();
    if (day < 10) {
      day = "0" + day;
    }
    const formattedDate =
      day + " " + months[dbDate.getMonth()] + " " + dbDate.getFullYear();
    element.created_at = formattedDate;
  });
};
export default formatDate;
