/**
 * Created by jorten on 16/4/18.
 */

var get = document.querySelector("#get");
get.addEventListener("click", function(event) {
    event.preventDefault();
    var phone = document.getElementById("phone").value;
    if(!/^[1][358][0-9]{9}$/i.test(phone)) {
        alert("手机号码格式不正确,请重新输入");
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://127.0.0.1:8080/hugong/index.php/Home/User/ajax", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("phone=" + phone);
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4) {
                if(xhr.status >= 200 && xhr.status <= 300 || xhr.status === 304) {
                    this.disabled = "disabled";
                    var time = 60;
                    var Timer = setInterval(function() {
                        this.textContent = "重新发送(" + time + ")s";
                        if(time == 0) {
                            clearInterval(Timer);
                            this.removeAttribute("disabled");
                            this.textContent = "获取验证码"
                        }
                        time--;
                    }.bind(this), 1000);
                }
            }
        }.bind(this);
    }
}, false);

var verti = document.getElementById("verti");
verti.addEventListener("blur", function(event) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://127.0.0.1:8080/hugong/index.php/Home/User/check?verifyNum=" + verti.value, true);
    xhr.send(null);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4) {
            if(xhr.status >= 200 && xhr.status <= 300 || xhr.status === 304) {
                if(JSON.parse(xhr.responseText).code === 1) {
                    var tips =  "<div class='tips correct'>" +
                        "<i class='iconfont'></i>" +
                        JSON.parse(xhr.responseText).message +
                        "</div>";
                } else {
                    var tips = "<div class='tips error'>" +
                        "<i class='iconfont'></i>" +
                        JSON.parse(xhr.responseText).message +
                        "</div>";
                }
                document.getElementById("verticontainer").innerHTML = tips;
            }
        }
    }
}, false);

var pass = document.getElementById("password");
pass.addEventListener("blur", function() {
    if(pass.value.length < 8 || pass.value.length > 16) {
        var tips =  "<div class='tips error'>" +
            "<i class='iconfont'></i>" +
            "密码格式不正确" +
            "</div>";
        document.getElementById("passcontainer").innerHTML = tips;
    }
}, false);
