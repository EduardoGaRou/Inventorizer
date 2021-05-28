function toggleErrorAndBtn(usr,pass) {
    var xhttp;
    if (usr.length == 0 && pass.length == 0) {
        document.getElementById("invalidation").hidden = true;
        document.getElementById("loginbtn").disabled = true;
        console.log("Empty");
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && (this.status == 200)) {
            var obj = JSON.parse(this.responseText);
            console.log(obj);
            obj.forEach((data) => {
                if(data.password === pass) {
                    document.getElementById("invalidation").hidden = true;
                    document.getElementById("loginbtn").disabled = false;
                    console.log("Can login");
                } else {
                    document.getElementById("invalidation").hidden = false;
                    document.getElementById("loginbtn").disabled = true;
                    document.getElementById('InputUser').classList.add("is-invalid");
                    console.log("Bad password");
                }
            });
        } else {
            document.getElementById("invalidation").hidden = false;
            document.getElementById("loginbtn").disabled = true;
            console.log("Bad user");
        }
    };
    xhttp.open("GET", "./../Controllers/readUser.php?username="+usr, true);
    xhttp.send();
}

function cipher(str){
    //Duplicate string
    var auxstr = str.repeat(2);
    //Diffuse string
    var adder = true;
    for(let i=0; i<auxstr.length ; i+=1){
        auxstr.charAt(i) = (adder) ? (auxstr.charAt(i) + i) : (auxstr.charAt(i) - i);
        adder = !adder;
    }
    //Reverse string
    var splitString = auxstr.split("");
    var reverseArray = splitString.reverse();
    var revPass = reverseArray.join("");

    return revPass;
}
