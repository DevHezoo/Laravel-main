<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Call</title>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="{{ asset('frontend/chat/chat.css') }}">
    <script defer src="https://www.gstatic.com/firebasejs/7.1.0/firebase-app.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/7.1.0/firebase-database.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/simple-peer@9.11.1/simplepeer.min.js"></script>
    <script defer src="{{ asset('frontend/chat/chat.js') }}"></script>
</head>
<body>

      
           <textarea style="cursor: default; user-select: none; padding-bottom: 15px;" readonly id="output" class="form-control bg-white" name="message" rows="5" ></textarea>
     
 

    <!-- <input id="input" placeholder="message"> -->

    <input style="position: absolute; "id="input" class="form-control bg-white"
           placeholder="Insert Message"
    />


@auth
    <input hidden id="username" placeholder="username" value="{{ session('User')->firstname }} {{ session('User')->lastname }}">
@else
    <input hidden id="username" placeholder="username" value="">
    <script type="text/javascript">
        // Get the input element
        var usernameInput = document.getElementById("username");

        // Generate a random number between 10000 and 99999
        var randomNumber = Math.floor(Math.random() * (99999 - 10000 + 1)) + 10000;

        // Concatenate the random number with the existing value
        usernameInput.value += 'Anonymouse #' + randomNumber;
    </script>
@endauth

</body>
</html>
