// KANBOARD PLUGIN - JS FILE

// SELECT INPUT ON MOUSOVER
$(document).ready(function() {
    const input = document.getElementById("form-username");
    if (input !== null) {
        input.addEventListener('mouseover', () => {
            input.select();
        })
    }
});

// SELECT INPUT ON MOUSOVER
$(document).ready(function() {
    const input = document.getElementById("form-password");
    if (input !== null) {
        input.addEventListener('mouseover', () => {
            input.select();
        })
    }
});

// SELECT INPUT ON MOUSOVER
$(document).ready(function() {
    const input = document.getElementById("form-captcha");
    if (input !== null) {
        input.addEventListener('mouseover', () => {
            input.select();
        })
    }
});

// SELECT INPUT ON MOUSOVER
$(document).ready(function() {
    const input = document.getElementById("form-code");
    if (input !== null) {
        input.addEventListener('mouseover', () => {
            input.select();
        })
    }
});
