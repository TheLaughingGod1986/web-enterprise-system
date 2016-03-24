var myRe = /d(b+)d/g;
var myArray = myRe.exec("cdbbdbsbz");

function  reloadForm(){
    var e = document.getElementById("rForm");
    var selected = e.options[e.selectedIndex].value;

    var item1 = document.getElementsByClassName("adminField");
    var item2 = document.getElementsByClassName("staffField");
    var item3 = document.getElementsByClassName("staffItem");

    if(selected == 'Admin'){

        item1.style.display="block";
        item2.style.display="none";
        item3.style.display="none";

    }else if(selected == 'Staff'){

        item1.style.display="none";
        item2.style.display="block";
        item3.style.display="none";

    }else if(selected == 'EE'){
        item1.style.display="none";
        item2.style.display="block";
        item3.style.display="block";
    }else{
        item1.style.display="none";
        item2.style.display="none";
        item3.style.display="none";
    }
}
