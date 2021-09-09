require('./bootstrap');

window.love = function love(id, target) {
    $.ajax({
        url: target + "/" + id,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success(response) {
            document.getElementById('love-' + id).innerText = response.total;
        },
        error() {
            alert("Failed");
        }
    });
}

window.like = function like(id, target) {
    $.ajax({
        url: target + "/" + id,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success(response) {
            document.getElementById('like-' + id).innerText = response.total;
        },
        error() {
            alert("Failed");
        }
    });
}

window.save = function save(id, target) {
    $.ajax({
        url: target + "/" + id,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success(response) {
            document.getElementById('save-' + id).innerText = response.status;
            document.getElementById('save-' + id).style.display = 'inline-block';
            setTimeout(function () {
                document.getElementById('save-' + id).innerText = null;
                document.getElementById('save-' + id).style.display = 'none';
            }, 1000);
        },
        error() {
            alert("Failed");
        }
    });
}
