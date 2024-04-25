// Text Reveal in Homepage

window.addEventListener('scroll', reveal);

function reveal (){
    var reveals = document.querySelectorAll('.reveal');
    
    for (var i = 0; i < reveals.length; i ++){

        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('active');
        }else{
            reveals[i].classList.remove('active');
        }
    }
}


window.addEventListener('scroll', reveal1);

function reveal1 (){
    var reveals = document.querySelectorAll('.reveal1');
    
    for (var i = 0; i < reveals.length; i ++){

        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('active');
        }else{
            reveals[i].classList.remove('active');
        }
    }
}

window.addEventListener('scroll', reveal2);

function reveal2 (){
    var reveals = document.querySelectorAll('.reveal2');
    
    for (var i = 0; i < reveals.length; i ++){

        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('active');
        }else{
            reveals[i].classList.remove('active');
        }
    }
}


// JAVASCRIPT FOR IMAGE CAROUSEL
const swiper = new Swiper('.swiper', { 
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    loop: true,
  
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });


//JAVASCRIPT FOR BACK TO TOP BUTTON
const toTop = document.querySelector('.to-top');

window.addEventListener('scroll', () => {
  if (window.pageYOffset > 700) {
    toTop.classList.add('active');
  }else{
    toTop.classList.remove('active');
  }
})

function Function() {
  alert("Thank you for requesting an appointment!");
}

//JAVASCRIPT FOR APPOINTMENT


// Define employee names for each job category
document.addEventListener("DOMContentLoaded", function() {
  var jobSelect = document.getElementById("jobSelect");
  var employeeSelect = document.getElementById("employeeSelect");
  var employeePhoto = document.getElementById("employeePhoto");

  // Event listener for job select box
  jobSelect.addEventListener("change", function() {
      var selectedJob = jobSelect.value;
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "get_employees.php");
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  var employees = JSON.parse(xhr.responseText);
                  employeeSelect.innerHTML = "<option selected disabled>Select Employee</option>";
                  employees.forEach(function(employee) {
                      var option = document.createElement("option");
                      option.value = employee.name;
                      option.textContent = employee.name;
                      employeeSelect.appendChild(option);
                  });
              } else {
                  console.error("Error fetching employees: " + xhr.status);
              }
          }
      };
      xhr.send("job=" + selectedJob);
  });

// Event listener for employee select box
employeeSelect.addEventListener("change", function() {
    var selectedEmployee = employeeSelect.value;
    if (selectedEmployee !== "") {
        // AJAX request to fetch the photo of the selected employee
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "get_employee_photo.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var photoUrl = response.photoUrl; 
                    employeePhoto.src = photoUrl;
                } else {
                    console.error("Error fetching employee photo: " + xhr.status);
                }
            }
        };
        xhr.send("employee=" + selectedEmployee);
    } else {
        // Set a default image when no employee is selected
        employeePhoto.src = "images/default_photo.png"; 
    }
});

});
