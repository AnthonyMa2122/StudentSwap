/**
 * you can access this value with:
 * document.getElementById("categoryFilter").innerHTML = getCategory;
 * */


function getCategory(category) {
    console.log(category[category.selectedIndex].value); //get value
    return category[category.selectedIndex].value;
}