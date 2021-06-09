var auxid = 0;

function printCategories(req,stid) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && (this.status == 200)) {
            var obj = JSON.parse(this.responseText);
            var result = '';
            obj.forEach((data) => {
                var auxname = data.name.toString();
                var auxloc = data.location.toString();
                result += `<tr>
                            <td class="align-middle">${data.id}</td>
                            <td class="align-middle">${data.name}</td>
                            <td class="align-middle">${data.stash}</td>
                            <td class="align-middle">
                                <form>
                                    <button type="submit" class="btn btn-primary text-nowrap" style="min-width: 120px;">
                                        <span class="material-icons float-right ml-1">
                                            view_in_ar
                                        </span>
                                        Items
                                    </button>
                                </form>
                            </td>
                            <td class="align-middle">
                                <form>
                                    <button type="button" data-toggle="modal" data-target="#modifyCategory" onclick="" 
                                        class="btn btn-primary text-nowrap" style="min-width: 120px;">
                                        <span class="material-icons float-right ml-1">
                                            edit
                                        </span>
                                        Modify
                                    </button>
                                </form>
                            </td>
                        </tr>`;
            });
            document.getElementById('tableResultFC').innerHTML = result;
        } else {
            document.getElementById('tableResultFC').innerHTML = 'No matches with your search were found.';
        }
    };
    xhttp.open("GET", "./Controllers/filterCategory.php?name="+req+"&stash="+stid, true);
    xhttp.send();
}

function placeValues(id,name,stash){
    document.getElementById('InputChangeCategoryName').value = name;
    document.getElementById('InputChangeCategoryStash').value = stash;
    auxid = id;
}

function sendToUpdate(name,stash) {
    window.location = "./Controllers/updateCategory.php?id="+auxid+"&name="+name+"&stash="+stash;
}

function sendToCreate(name,stash) {
    window.location = "./Controllers/createCategory.php?name="+name+"&stash="+stash;
}

function sendToDelete() {
    window.location = "./Controllers/deleteCategory.php?id="+auxid;
}

function toCategoryFilteredItems(id){
    window.location = "/Inventorizer/fromCategory/"+id+"/items";
}

document.addEventListener('DOMContentLoaded', ()=>{
    printStashes('');
});
