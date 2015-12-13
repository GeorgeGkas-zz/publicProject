('#update_profile').click(function() {
        var email = document.getElementById("Pemail");
        var passs = document.getElementById("Ppass");
        var username = document.getElementById("Puser");
        $.ajax({
            url: 'lib/preferences.php',
            type: "POST",
            cache: "false",
            data: {
                email2: email.value,
                passs2: passs.value,
                username2: username.value
            },
            success: function(data){
                    window.location.href = data;
                },
            error: function() { // if error occured
                        alert("Error occured, please try again");
                    },
        });
});
