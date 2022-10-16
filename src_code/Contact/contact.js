const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e)=>{
  e.preventDefault();
  statusTxt.style.color = "#0D6EFD";
  statusTxt.style.display = "block";
  statusTxt.innerText = "Sending your message...";
  form.classList.add("disabled");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "message.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState == 4 && xhr.status == 200){
      let response = xhr.response;
      if(response.indexOf("Email and message field is required!") != -1 || response.indexOf("Enter a valid email address!") != -1 || response.indexOf("Sorry, failed to send your message!") != -1){
        statusTxt.style.color = "red";
      }else{
        form.reset();
        setTimeout(()=>{
          statusTxt.style.display = "none";
        }, 3000);
      }
      statusTxt.innerText = response;
      form.classList.remove("disabled");
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}



// sendEmail();

// function sendEmail() {
//   Email.send({
//     Host: "smtp.elasticemail.com",
//     Username: "sahprashant267@gmail.com",
//     Password: "9D66869A2067F291957F2E3D46F8C71EA702",
//     To: "sahprashant267@gmail.com",
//     From: "sahprashant267@gmail.com",
//     Subject: "New Inquiry from Alpha",
//     Body: "Name: " + document.getElementById("name").value
//       + "<br> Email: " + document.getElementById("email").value
//       + "<br> Phone No: " + document.getElementById("phone").value
//       + "<br> Subject: " + document.getElementById("subject").value
//       + "<br> Message: " + document.getElementById("message").value
//   }).then("send success");
// }