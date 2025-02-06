<div class="modal" id="createModal" aria-labelledby="collectionModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create a collection</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <label for="name" class="login-label fw-bold">Collection name:</label>
                    <input id="name" class="form-control mt-3 mb-3" placeholder="Enter name" type="text" name="name" :value="old('name')" 
                        required autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <div class="row">
                        <img src="/images/car_thumbnail.jpg" class="mod-thumbnail" alt="Thumbnail showcase">
                    </div>
                    <label for="thumbnail" class="login-label fw-bold mt-3">Thumbnail:</label>
                    <input class="form-control mt-3 mb-3" type="file" id="thumbnail" name="thumbnail">
                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    
                    <label for="description" class="login-label fw-bold mb-3 mt-3">Description:</label>  
                    <textarea class="form-control mt-3" name="description" id="description" placeholder="Write a description here" name="description"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />

                    <button type="submit" class="btn btn-search mt-3">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>