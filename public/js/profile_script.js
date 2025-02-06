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