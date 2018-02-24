function D_FormData_Submit(formName,actionLink){
    var form = document.forms.namedItem(formName);

  var oOutput = document.querySelector("div"),
      oData = new FormData(form);

 // oData.append("CustomField", "This is some extra data");
 //courtesy MDN

  var oReq = new XMLHttpRequest();
  oReq.open("POST", actionLink, true);
  oReq.onload = function(oEvent) {
    if (oReq.status == 200) {
      oOutput.innerHTML = "Uploaded!";
    } else {
      oOutput.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
    }
  };
  oReq.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           // Typical action to be performed when the document is ready:
           document.getElementById("response").innerHTML = oReq.response;    
        }
        else {
            document.getElementById("response").innerHTML =  "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
            }
      };

  oReq.send(oData);
} 
