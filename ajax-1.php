<?php
// var_dump($_POST);
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button']) && $_POST['button'] === 'ajaxButton') {
//     $name = $_POST ?? '';
// }
?>
<!-- <form method="POST" id="formAjax">

    <div class="form-group">
        <label for="">Cho xin cái tên</label>
        <input type="text" class="form-control" name="myName" id="" aria-describedby="helpId" placeholder="">
        <input type="text" class="form-control" name="myClass" id="" aria-describedby="helpId" placeholder="">
    </div> -->

<!-- </form>
<div id="ajax" style="border: 1px solid blue;">
    Hello
</div> -->


<div id="text" style="border: 1px solid blue;"></div>
<button type="submit" id="ajaxButton" name="button" value="ajaxButton" class="btn btn-primary">Get text file</button>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById("ajaxButton").addEventListener("click", loadText);

    function loadText() {
        // 1. INIT - create Object XMLHttpRequest
        const xhr = new XMLHttpRequest();
        console.log("READYSTATE: ", xhr.readyState);
        // 2. OPEN - type, url/file, async boolean
        xhr.open('GET', 'sample.txt', true);

        console.log("READYSTATE: ", xhr.readyState);
        // 3.0 OPTIONAL
        xhr.onprogress = function() {
            console.log("READYSTATE - onprogress: ", xhr.readyState);
            document.getElementById('text').textContent = this.responseText;
        }

        // 3.1. USE - onload (method 1)
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
                console.log("READYSTATE: ", this.readyState);
            } else if (this.status == 404) {
                console.log("Request error: NOT FOUND");
            }
        }
        // 3.2. USE - onload (method 1)
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                console.log("READYSTATE: ", this.readyState);
            }
        }

        // ERROR CASE
        xhr.onerror = function() {
            console.log("Request error...");
        }
        // 4. SEND - send request
        xhr.send();

        // readyState Values
        // 0: request not initialized
        // 1: server connection established
        // 2: request received
        // 3: processing request
        // 4: request finished and response is ready

        // HTTP STATUES
        // 200: "OK"
        // 403: "Forbidden"
        // 404: "Not found"

    }
</script>