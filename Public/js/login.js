/**
 * Created by jorten on 16/4/18.
 */
document.querySelector("#mobile input").addEventListener("click", function() {
    document.querySelector("#mobile").style.border = "1px solid #33ADF5";
}, false);
document.querySelector("#mobile input").addEventListener("blur", function() {
    document.querySelector("#mobile").style.border = "1px solid #666";
}, false);
document.querySelector("#pass input").addEventListener("click", function() {
    document.querySelector("#pass").style.border = "1px solid #33ADF5";
}, false);
document.querySelector("#pass input").addEventListener("blur", function() {
    document.querySelector("#pass").style.border = "1px solid #666";
}, false);