<x-app-layout>
    <head>
        <title>Setups</title>
    </head>
    
    <script>
        document.getElementById("setups-nav").classList.add("active");
    </script>
    
    <div class="container">
        <div class="row main-content">
            <div class="container mt-3">
                <h1>List of setups, number of entries: {{ count($setups) }}</h1>
                <div class="input-group">
                    <input type="text" id="search" class="form-control search-bar" placeholder="Search...">
                </div>
                <table class="table table-hover setup-table mt-4">
                    <thead>
                     <tr>
                      <th>Name</th>
                      <th>Vehicle</th>
                      <th>Track</th>
                      <th>Author</th>
                      <th>Likes</th>
                      <th>Downloads</th>
                      <th>Actions</th>
                     </tr>
                    </thead>

                    <tbody id="setupsTableBody">
                        
                    </tbody>
                </table> 
                <div id="loadingLabel">
                    <div class="spinner-border"></div>
                    <strong role="status" id="loadingText">Loading setups...</strong>
                </div>
            </div>
        </div>
    </div>

    <script>
         $(document).ready(function () {
            function loadSetups (search_input) {
                $.ajax({
                    url: '/setups/search',
                    type: 'GET',
                    data: { search_input: search_input },
                    beforeSend: function () {
                        $('#loadingLabel').show();
                        $('.spinner-border').show();
                    },
                    success: function (response) {
                        $('#setupsTableBody').html(response.setups_table_content);
                    },
                    error: function () {
                        $('#setupsTableBody').html('<h1>Error while loading setups.</h1>');
                    },
                    complete: function () {
                        $('#loadingLabel').hide();
                    }
                });
            }
            let initial = "";
            loadSetups(initial);

            $('#search').on('keyup', function() {
                let search_input = $(this).val();
                loadSetups(search_input);
            });
        });
    </script>
</x-app-layout>