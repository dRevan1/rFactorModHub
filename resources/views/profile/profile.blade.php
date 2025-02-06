<x-app-layout>
<div class="container">
    <div class="card bg-dark text-white p-4 my-5">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <img src="/images/bmw_1.jpg" class="rounded-circle img-fluid border" alt="Profile Picture">
            </div>
            
            <div class="col-md-6">
                <h2 class="fw-bold">{{ $user->name }}</h2>
                <p>{{ $user->description }}</p>
                
                <div class="d-flex flex-column gap-3 mt-2">
                    <span><i class="bi bi-download"></i> {{ $user->downloads }} Downloads</span>
                    <span><i class="bi bi-hand-thumbs-up-fill"></i> {{ $user->likes }} Likes</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <button class="nav-link collection-tab active" data-type="collection">Collections</button>
        </li>
    </ul>

    <div class="collections mt-3 mb-5">
        <div class="spinner-border"></div>
        <strong role="status">Loading collections...</strong>
    </div>
</div>

<div class="container mt-4">
    <ul class="nav nav-tabs" id="profileTabs">
        <li class="nav-item">
            <button class="nav-link profile-tab active" data-type="track">Tracks</button>
        </li>
        <li class="nav-item">
            <button class="nav-link profile-tab" data-type="vehicle">Vehicles</button>
        </li>
        <li class="nav-item">
            <button class="nav-link profile-tab" data-type="other">Other</button>
        </li>
        <li class="nav-item">
            <button class="nav-link profile-tab" data-type="setup">Setups</button>
        </li>
    </ul>

    <div class="mods mt-3">
        <div class="spinner-border"></div>
        <strong role="status">Loading mods...</strong>
    </div>

</div>


<script>
        $(document).ready(function () {
            function loadCollections (username) {
                $.ajax({
                    url: '/collections/' + username,
                    type: 'GET',
                    beforeSend: function () {
                        $('.spinner-border').show();
                    },
                    success: function (response) {
                        $('.collections').html(response.collections_list);
                    },
                    error: function () {
                        $('.collections').html('<h1>Error while loading collections list.</h1>');
                    }
                });
            }
            loadCollections('{{ $user->name }}');

            $('.collection-tab').click(function (e) {
                e.preventDefault();
                loadCollections('{{ $user->name }}');
            });

            function loadCollectionMods (username, collection) {
                $.ajax({
                    url: '/collections/' + collection + '/' + username,
                    type: 'GET',
                    beforeSend: function () {
                        $('.spinner-border').show();
                    },
                    success: function (response) {
                        $('.collections').html(response.collection_mods);
                    },
                    error: function () {
                        $('.collections').html('<h1>Error while loading collection mods.</h1>');
                    }
                });
            }

            $(document).on('click', '.collection-card', function (e) {
                e.preventDefault();
                var collection_name = $(this).find('.collection-name').text();
                loadCollectionMods ('{{ $user->name }}', collection_name);
            });
        });
</script>


<script>
        $(document).ready(function () {
            function loadMods (username, type) {
                $.ajax({
                    url: '/mods/' + username + '/' + type,
                    type: 'GET',
                    beforeSend: function () {
                        $('.spinner-border').show();
                    },
                    success: function (response) {
                        $('.mods').html(response.mods_list);
                    },
                    error: function () {
                        $('.mods').html('<h1>Error while loading mod list.</h1>');
                    }
                });
            }
            loadMods('{{ $user->name }}', 'track');

            $('.profile-tab').click(function (e) {
                e.preventDefault(); //aby nebol refresh
                $('.profile-tab').removeClass('active');
                $(this).addClass('active');
                loadMods('{{ $user->name }}', $(this).data('type'));
            });
        });
</script>

</x-app-layout>