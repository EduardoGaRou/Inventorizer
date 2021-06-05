function printStashes(req) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && (this.status == 200)) {
            var obj = JSON.parse(this.responseText);
            var result = "";
            obj.forEach((data) => {
                result += '<tr><td class="align-middle">'+data.name+'</td><td class="align-middle">'+data.location+'</td><td class="align-middle"></td><td class="align-middle"></td><td class="align-middle"><form action="" method="POST"><button type="submit" class="btn btn-primary text-nowrap" style="min-width: 120px;"><span class="material-icons float-right ml-1">category</span>Categories</button></form></td><td class="align-middle"><form action="" method="POST"><button type="submit" class="btn btn-primary text-nowrap" style="min-width: 120px;"><span class="material-icons float-right ml-1">view_in_ar</span>Items</button></form></td><td class="align-middle"><form action="" method="POST"><button type="button" data-toggle="modal" data-target="#modifyStash"class="btn btn-primary text-nowrap" style="min-width: 120px;"><span class="material-icons float-right ml-1">edit</span>Modificar</button></form></td></tr>';
            });
            document.getElementById('tableResult').innerHTML = result;
        } else {
            document.getElementById('tableResult').innerHTML = "No matches with your search were found.";
        }
    };
    xhttp.open("GET", "./Controllers/searchStash.php?name="+req, true);
    xhttp.send();
}
