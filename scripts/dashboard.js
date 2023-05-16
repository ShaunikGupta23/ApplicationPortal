const dropArea = document.querySelector(".drag-area"),
    button = dropArea.querySelector("button"),
    input = dropArea.querySelector("input");

let file;

button.onclick = () => {
    input.click();             //if user click on the button then the input also clicked
}

input.addEventListener("change", function () {

    file = this.files[0];
    dropArea.classList.add("active");
    showFile(); //calling function
});


//If user Drag File Over DropArea
dropArea.addEventListener("dragover", (event) => {
    event.preventDefault(); //preventing from default behaviour
    dropArea.classList.add("active");
    dragText.textContent = "Release to Upload File";
});

//If user leave dragged File from DropArea
dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("active");
});

//If user drop File on DropArea
dropArea.addEventListener("drop", (event) => {
    event.preventDefault(); //preventing from default behaviour

    file = event.dataTransfer.files[0];
    showFile(); //calling function
});

function showFile() {
    let fileType = file.type;
    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    if (validExtensions.includes(fileType)) {
        let fileReader = new FileReader();
        fileReader.onload = () => {
            let fileURL = fileReader.result;
            let imgTag = `<img src="${fileURL}" alt="">`;
            dropArea.innerHTML = imgTag;
        }
        fileReader.readAsDataURL(file);
    } else {
        alert("This is not an Image File!");
        dropArea.classList.remove("active");
    }
}

function populate(s1, s2) {
    var org = document.getElementById(s1);
    var job = document.getElementById(s2);
    job.innerHTML = "";
    if (org.value == "ABC") {
        var optionArray = ["|", "SDE|SDE", "HR|HR", "Technical Lead|Technical Lead"];
    } else if (org.value == "DEF") {
        var optionArray = ["|", "Manager|Manager", "SDE|SDE", "Consultant|Consultant"];
    } else if (org.value == "GHI") {
        var optionArray = ["|", "Data Analyst|Data Analyst", "AI Engineer| AI Engineer"];
    }
    for (var option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}


