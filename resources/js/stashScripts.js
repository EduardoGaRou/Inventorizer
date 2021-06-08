var auxid = 0;

function printStashes(req) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && (this.status == 200)) {
            var obj = JSON.parse(this.responseText);
            var result = '';
            obj.forEach((data) => {
                var auxname = data.name.toString();
                var auxloc = data.location.toString();
                result += `<tr><td class="align-middle">${data.name}</td><td class="align-middle">${data.location}</td><td class="align-middle"></td><td class="align-middle"></td><td class="align-middle"><form><button type="submit" class="btn btn-primary text-nowrap" style="min-width: 120px;" onclick="toStashFilteredCategories(${data.id})"><span class="material-icons float-right ml-1">category</span>Categories</button></form></td><td class="align-middle"><form><button type="submit" class="btn btn-primary text-nowrap" style="min-width: 120px;" onclick="toStashFilteredItems(${data.id})"><span class="material-icons float-right ml-1">view_in_ar</span>Items</button></form></td><td class="align-middle"><form><button type="button" data-toggle="modal" data-target="#modifyStash" class="btn btn-primary text-nowrap" style="min-width: 120px;" onclick="placeValues(${data.id},'${data.name}','${data.location}')"><span class="material-icons float-right ml-1">edit</span>Modify</button></form></td></tr>`;
            });
            document.getElementById('tableResult').innerHTML = result;
        } else {
            document.getElementById('tableResult').innerHTML = 'No matches with your search were found.';
        }
    };
    xhttp.open("GET", "./Controllers/searchStash.php?name="+req, true);
    xhttp.send();
}

function placeValues(id,name,loc){
    document.getElementById('InputChangeStashName').value = name;
    document.getElementById('InputChangeStashLocation').value = loc;
    auxid = id;
}

function sendToUpdate(name,loc) {
    window.location = "./Controllers/updateStash.php?id="+auxid+"&name="+name+"&location="+loc;
}

function sendToCreate(name,loc) {
    window.location = "./Controllers/createStash.php?name="+name+"&location="+loc;
}

function sendToDelete() {
    window.location = "./Controllers/deleteStash.php?id="+auxid;
}

function toStashFilteredCategories(id){
    window.location = "/Inventorizer/fromStash/"+id+"/categories";
}

function toStashFilteredItems(id){
    window.location = "/Inventorizer/fromStash/"+id+"/items";
}

document.addEventListener('DOMContentLoaded', ()=>{
    printStashes('');
});

