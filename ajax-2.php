<button id="button-1">Get users 1</button>
<button id="button-2">Get users 2</button>
<h2>User 1 </h2><br><br>
<div id="user-1"></div>
<h2>User 2 </h2><br><br>
<div id="user-2"></div>
<script>
    document.getElementById("button-1").addEventListener("click", loadUser1);
    document.getElementById("button-2").addEventListener("click", loadUser2);


    function loadUser1() {
        const xhr1 = new XMLHttpRequest();
        xhr1.open("GET", "user-1.json", true);
        xhr1.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
            }
        }
        xhr1.send();
    }

    function loadUser2() {
        const xhr2 = new XMLHttpRequest();
        xhr2.open("GET", "user-2.json", true);
        xhr2.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
            }
        }
        xhr2.send();
    }
</script>