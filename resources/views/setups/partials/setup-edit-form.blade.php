<div class="modal" id="editModal" aria-labelledby="setupModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit setup</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editForm" data-name="{{ $setup->name }}">
                    <label for="name" class="login-label fw-bold">Setup name:</label>
                    <input id="name" class="form-control mt-3 mb-3" placeholder="Enter name" type="text" name="name" value="{{ $setup->name }}" 
                        required autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <label for="vehicle" class="login-label fw-bold">Vehicle:</label>
                    <input id="vehicle" class="form-control mt-3 mb-3" placeholder="Enter vehicle" type="text" name="vehicle" value="{{ $setup->vehicle }}" 
                        required autofocus autocomplete="vehicle"/>
                    <x-input-error :messages="$errors->get('vehicle')" class="mt-2" />

                    <label for="track" class="login-label fw-bold">Track:</label>
                    <input id="track" class="form-control mt-3 mb-3" placeholder="Enter track" type="text" name="track" value="{{ $setup->track }}" 
                        required autofocus autocomplete="track"/>
                    <x-input-error :messages="$errors->get('track')" class="mt-2" />

                    <button type="submit" class="btn btn-search mt-3">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>