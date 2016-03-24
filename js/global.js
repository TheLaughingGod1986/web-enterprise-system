var myRe = /d(b+)d/g;
var myArray = myRe.exec("cdbbdbsbz");

function  reloadForm(){
    var e = document.getElementById("rForm");
    var selected = e.options[e.selectedIndex].value;

    var item1 = document.getElementsByClassName("adminField");
    var item2 = document.getElementsByClassName("staffField");
    var item3 = document.getElementsByClassName("staffItem");

    if(selected == 'Admin'){

        for(var i = 0; i < item1.length; i++) {
            item1[i].style.display = "block";
        }
        for(var x = 0; x < item2.length; x++) {
            item2[x].style.display = "none";
        }
        for(var z = 0; z < item3.length; z++) {
            item3[z].style.display = "none";
        }

    }else if(selected == 'Staff'){

        for(var i = 0; i < item1.length; i++) {
            item1[i].style.display = "none";
        }
        for(var x = 0; x < item2.length; x++) {
            item2[x].style.display = "block";
        }
        for(var z = 0; z < item3.length; z++) {
            item3[z].style.display = "none";
        }

    }else if(selected == 'EE'){

        for(var i = 0; i < item1.length; i++) {
            item1[i].style.display = "none";
        }
        for(var x = 0; x < item2.length; x++) {
            item2[x].style.display = "block";
        }
        for(var z = 0; z < item3.length; z++) {
            item3[z].style.display = "block";
        }

    }else{

        for(var i = 0; i < item1.length; i++) {
            item1[i].style.display = "none";
        }
        for(var x = 0; x < item2.length; x++) {
            item2[x].style.display = "none";
        }
        for(var z = 0; z < item3.length; z++) {
            item3[z].style.display = "none";
        }
    }
}

function updateList(){
    var xhttp;
    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function (){
        if (xhttp.readyState == 4 && xhttp.status == 200) {
           var x = document.getElementById("depDL");
            x.options.add(new Option(xhttp.DepartmentID, xhttp.Department_Name));
        }
    }
    console.log(location.host);
    xhttp.open('POST','/UManage_cntrl/ajaxTry',true);
    xhttp.send();
}
