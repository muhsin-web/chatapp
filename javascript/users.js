const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.addEventListener('click', function(){
    searchBar.classList.toggle("active");
    searchBar.value = "";
    // searchBar.focus();
    // searchBar.classList.toggle("active");
});

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add('active')
    }else{
        searchBar.classList.remove('active')
    }
    
    let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/search.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    usersList.innerHTML = data;
                }
            }
        }
        xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
}

setInterval(function(){

        // AJAX REQUESTING TO SUBMIT FORM

        let xhr = new XMLHttpRequest();
        xhr.open("GET", "php/users.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                   if(!searchBar.classList.contains("active")){
                    console.log(data)
                    usersList.innerHTML = data;
                   }
                }
            }
        }
        xhr.send();

}, 400);