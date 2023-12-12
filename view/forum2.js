const form = document.querySelector('form');

        form.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent the form from submitting normally
            const usernameInput = document.querySelector('input[name="user"]');
            const postInput = document.querySelector('input[name="post"]');

            // Get the values from the form
            const userValue = usernameInput.value;
            const postValue = postInput.value;

            // Append the values to the URL
            const redirectUrl = `forum.php?user=${userValue}&post=${postValue}`;

            // Redirect to the verification.php page with the appended values
            window.location.href = redirectUrl;
        });
        function saisie(i){
            reply=document.getElementsByName("reply");
            username=document.getElementsByName("username");
            userid=document.getElementsByName("userid");
            if(reply[i].value==""){
                alert("donner un commentaire");
                return false;
            }
            if(username[i].value==""){
                alert("donner un username");
                return false;
            }
            if(userid[i].value==""){
                alert("donner un userid");
                return false;
            }
        }