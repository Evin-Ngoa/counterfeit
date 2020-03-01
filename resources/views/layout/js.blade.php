    <script src="{{ asset ("vendor/jquery/dist/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("vendor/popper.js/dist/umd/popper.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("vendor/moment/moment.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("vendor/chart.js/dist/Chart.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("vendor/select2/dist/js/select2.full.min.js") }}"></script>
    <script src="{{ asset ("vendor/jquery-bar-rating/dist/jquery.barrating.min.js") }}"></script>
    <script src="{{ asset ("vendor/ckeditor/ckeditor.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap-validator/dist/validator.min.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap-daterangepicker/daterangepicker.js") }}"></script>
    <script src="{{ asset ("vendor/ion.rangeSlider/js/ion.rangeSlider.min.js") }}"></script>
    <script src="{{ asset ("vendor/dropzone/dist/dropzone.js") }}"></script>
    <script src="{{ asset ("vendor/editable-table/mindmup-editabletable.js") }}"></script>
    <script src="{{ asset ("vendor/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("vendor/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset ("vendor/fullcalendar/dist/fullcalendar.min.js") }}"></script>
    <script src="{{ asset ("vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js") }}"></script>
    <script src="{{ asset ("vendor/tether/dist/js/tether.min.js") }}"></script>
    <script src="{{ asset ("vendor/slick-carousel/slick/slick.min.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/util.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/alert.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/button.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/carousel.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/collapse.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/dropdown.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/modal.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/tab.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/tooltip.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/popover.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js") }}"></script>
    <script src="{{ asset ("js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset ("js/demo_customizer5739.js") }}"></script>
    <script src="{{ asset ("js/main5739.js") }}"></script>
    <script src="{{ asset ("js/api.js") }}"></script>
    <script src="{{ asset ("js/helper-api.js") }}"></script>

    <script>
        Api.init();

        $(document).ready(function() {
            $("#selectDistributor").select2({
                width: '100%',
                ajax: {
                    url: function(params) {
                        console.log("params url " + JSON.stringify(params));
                        return 'http://localhost:3000/api/Distributor?filter={\"where\":{\"email\":\"' + params.term + '\"},\"include\":\"resolve\"}';
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

        // Always check token 
        var authToken = localStorage.getItem('auth_token');
        var authTokenParsedData = JSON.parse(authToken);

        // check if token is set
        if (authTokenParsedData == undefined && authTokenParsedData == null) {
            window.location.assign('/auth/login');
        }else{
            console.log("Token -> " + JSON.stringify(authToken));
            console.log("Parsed Token -> " + authTokenParsedData.token);
        }
    </script>