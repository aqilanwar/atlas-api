window.onload = unselectCourses;

function unselectCourses() {
    var list = document.querySelectorAll('input[type=checkbox]');
    for (var item of list) {
        item.checked = false;
    }
}
function getSelectedCourses(e) {
    var selectedCourses = [];
    var courseCheckboxes = document.getElementsByName("subjects");
    for (var i = 0; i < courseCheckboxes.length; i++) {
      if (courseCheckboxes[i].checked) {
        var courseId = courseCheckboxes[i].value;
        // var courseName = document.getElementById("subject-" + courseId).innerHTML;
        var course = { 
            id: courseId 
        };
        selectedCourses.push(course);
      }
    }
    console.log(JSON.stringify(selectedCourses));

    document.getElementById("submit-subject").submit();

}

var totalPrice = 0;

function updatePrice(courseId, coursePrice, isChecked) {
    console.log(courseId, isChecked , coursePrice);
  if(isChecked){
    totalPrice += coursePrice;
  }else{
    totalPrice -= coursePrice;
  }
  console.log(totalPrice);
  document.getElementById("totalPrice").innerHTML = "Total : RM " + totalPrice;
}

