document.addEventListener('DOMContentLoaded', () => {
    var currentThumbnail = document.querySelector('.mod-thumbnail').src
    var thumbnail = document.querySelector('.mod-thumbnail')
    var thumbnailInput = document.getElementById("thumbnail")

    thumbnailInput.addEventListener('change', displayThumbnail)

    function displayThumbnail() {
        if (thumbnailInput.files[0] && thumbnailInput.files[0].type.startsWith('image/')) {
            const reader = new FileReader()
            reader.onload = (f) => {
                thumbnail.src = f.target.result
            }
            thumbnail.src = reader.readAsDataURL(thumbnailInput.files[0])
        } else {
            thumbnail.src = currentThumbnail
        }
    }
})
