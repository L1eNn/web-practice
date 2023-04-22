document.querySelector("#showAddPhoto").addEventListener("click", function() {
    document.querySelector("#addNewPhoto").classList.add("open")
})

document.querySelector("#cancel").addEventListener("click", function(e) {
    e.preventDefault()
    document.querySelector("#addNewPhoto").classList.remove("open")
})