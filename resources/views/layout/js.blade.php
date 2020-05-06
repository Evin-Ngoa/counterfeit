    
    <script src="{{ asset ("js/app-bc.js") }}"></script>

    <script>
        Api.init();

        // Always check token 
        var authToken = localStorage.getItem('logged_in_user');
        var authTokenParsedData = JSON.parse(authToken);

        // check if token is set
        if (authTokenParsedData == undefined && authTokenParsedData == null) {
            window.location.assign('/auth/login');
        } else {
            console.log("Token -> " + JSON.stringify(authToken));
            console.log("Parsed Token -> " + authTokenParsedData.$class);
            if (authTokenParsedData.$class == "org.evin.book.track.Publisher") {
                var pubID = authTokenParsedData.$class + "#" +authTokenParsedData.email;
                // update Names & Role in dashboard 
                $(".logged-user-name").text(authTokenParsedData.name);
                $(".logged-user-role").text(getRoleFromClass(authTokenParsedData.$class));
                $("#addedByAddBookForm").val(pubID);
            } else if (authTokenParsedData.$class == "org.evin.book.track.Distributor" || authTokenParsedData.$class == "org.evin.book.track.Admin") {
                // update Names & Role in dashboard 
                $(".logged-user-name").text(authTokenParsedData.name);
                $(".logged-user-role").text(getRoleFromClass(authTokenParsedData.$class));

            } else {
                $(".logged-user-name").text(authTokenParsedData.firstName + " " + authTokenParsedData.lastName);
                $(".logged-user-role").text(getRoleFromClass(authTokenParsedData.$class));
            }

        }

        $(document).ready(function() {
            var domainUrl = 'http://localhost:3001/api';
            $("#selectDistributor").select2({
                width: '100%',
                ajax: {
                    url: function(params) {
                        console.log("params url " + JSON.stringify(params));
                        return domainUrl + '/Distributor?filter={\"where\":{\"email\":\"' + params.term + '\"},\"include\":\"resolve\"}';
                    },
                    type: "GET",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        // console.log("params " + JSON.stringify(params));
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        // console.log("response " + JSON.stringify(response));
                        // console.log("response email" + JSON.stringify(response[0].email));
                        var rearranged = [{
                            "id": response[0].email,
                            "text": response[0].name
                        }];
                        // console.log("rearranged --> " + JSON.stringify(rearranged));
                        return {
                            results: rearranged
                        };
                    },
                    cache: true
                }
            });
        });
    </script>