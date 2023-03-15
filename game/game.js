var character = document.querySelector(".character");
var map = document.querySelector(".map");

var windowSize = $(window).width();
// console.log(windowSize);

$(window).resize( function() {
    var windowSize = $(window).width();
    location.reload();
    console.log(windowSize);
})

//start in the middle of the map

if (windowSize >= 1500) {
    var x = 224;
    var y = 105;
}
else if (windowSize >= 1100) {
    var x = 228.5;
    var y = 106.5;
}
else if (windowSize >= 815) {
    var x = 168;
    var y = 78.5;
}
else if (windowSize >= 565) {
    var x = 175;
    var y = 81.5;
}
else {
    var x = 112;
    var y = 52;
}

var held_directions = []; //State of which arrow keys we are holding down
var speed = 1; //How fast the character moves in pixels per frame

const placeCharacter = () => {

    var pixelSize = parseInt(
        getComputedStyle(document.documentElement).getPropertyValue('--pixel-size')
    );

    const held_direction = held_directions[0];
    if (held_direction) {
        if (held_direction === directions.right) {
            x += speed;
        }
        if (held_direction === directions.left) {
            x -= speed;
        }
        if (held_direction === directions.down) {
            y += speed;
        }
        if (held_direction === directions.up) {
            y -= speed;
        }
        character.setAttribute("facing", held_direction);
    }
    character.setAttribute("walking", held_direction ? "true" : "false");

    //Limits (gives the illusion of walls)

    if (windowSize >= 1500) {
        var leftLimit = 106;
        var rightLimit = 342;

        var topLimit = 105;
        var bottomLimit = 223;

        var leftStop = 124.5;
        var rightStop = 323;
        var bottomStop = 198;
    }
    else if (windowSize >= 1100) {
        var leftLimit = 108;
        var rightLimit = 349;

        var topLimit = 106.5;
        var bottomLimit = 227.5;

        var leftStop = 127.5;
        var rightStop = 330;
        var bottomStop = 202;
    }
    else if (windowSize >= 815) {
        var leftLimit = 79.5;
        var rightLimit = 256.5;

        var topLimit = 78.5;
        var bottomLimit = 167.5;

        var leftStop = 93.5;
        var rightStop = 242.5;
        var bottomStop = 148.5;
    }
    else if (windowSize >= 565) {
        var leftLimit = 82.5;
        var rightLimit = 267.5;

        var topLimit = 81.5;
        var bottomLimit = 174;

        var leftStop = 97.5;
        var rightStop = 252.5;
        var bottomStop = 155;
    }
    else {
        var leftLimit = 53;
        var rightLimit = 171;

        var topLimit = 52;
        var bottomLimit = 111.5;
        
        var leftStop = 61.5;
        var rightStop = 162.5;
        var bottomStop = 100;
    }

    // QUIZ TRIGGERS
    if (x >= rightStop && y >= bottomStop ){
        window.location.href = "../views/quiz-select.php?subject=science";
        return false;
    }
    if (x <= leftStop && y >= bottomStop ){
        window.location.href = "../views/quiz-select.php?subject=math";
        return false;
    }
    if (y < topLimit) {
        y = topLimit;
    }
    if (y > bottomLimit) {
        y = bottomLimit;
    }
    if (x < leftLimit) {
        x = leftLimit;
    }
    if (x > rightLimit) {
        x = rightLimit;
    }

    var camera_left = pixelSize * 150;
    var camera_top = pixelSize * 50;

    map.style.transform = `translate3d( ${-x*pixelSize+camera_left}px, ${-y*pixelSize+camera_top}px, 0 )`;
    character.style.transform = `translate3d( ${x*pixelSize}px, ${y*pixelSize}px, 0 )`;
        }


//Set up the game loop
const step = () => {
    placeCharacter();
    window.requestAnimationFrame(() => {
        step();
    })
}

//kick off the first step!
step();

/* Direction key state */
const directions = {
    up: "up",
    down: "down",
    left: "left",
    right: "right",
}
const keys = {
    38: directions.up,
    37: directions.left,
    39: directions.right,
    40: directions.down,
}
document.addEventListener("keydown", (e) => {
    var dir = keys[e.which];
    if (dir && held_directions.indexOf(dir) === -1) {
        held_directions.unshift(dir)
    }
})

document.addEventListener("keyup", (e) => {
    var dir = keys[e.which];
    var index = held_directions.indexOf(dir);
    if (index > -1) {
        held_directions.splice(index, 1)
    }
});

/* BONUS! Dpad functionality for mouse and touch */
var isPressed = false;
const removePressedAll = () => {
    document.querySelectorAll(".dpad-button").forEach(d => {
        d.classList.remove("pressed")
    })
}
document.body.addEventListener("mousedown", () => {
    console.log('mouse is down')
    isPressed = true;
})
document.body.addEventListener("mouseup", () => {
    console.log('mouse is up')
    isPressed = false;
    held_directions = [];
    removePressedAll();
})
const handleDpadPress = (direction, click) => {
    if (click) {
        isPressed = true;
    }
    held_directions = (isPressed) ? [direction] : []

    if (isPressed) {
        removePressedAll();
        document.querySelector(".dpad-" + direction).classList.add("pressed");
    }
}


//Bind a ton of events for the dpad
document.querySelector(".dpad-left").addEventListener("touchstart", (e) => handleDpadPress(directions.left, true));
document.querySelector(".dpad-up").addEventListener("touchstart", (e) => handleDpadPress(directions.up, true));
document.querySelector(".dpad-right").addEventListener("touchstart", (e) => handleDpadPress(directions.right, true));
document.querySelector(".dpad-down").addEventListener("touchstart", (e) => handleDpadPress(directions.down, true));
document.querySelector(".dpad-left").addEventListener("mousedown", (e) => handleDpadPress(directions.left, true));
document.querySelector(".dpad-up").addEventListener("mousedown", (e) => handleDpadPress(directions.up, true));
document.querySelector(".dpad-right").addEventListener("mousedown", (e) => handleDpadPress(directions.right, true));
document.querySelector(".dpad-down").addEventListener("mousedown", (e) => handleDpadPress(directions.down, true));
document.querySelector(".dpad-left").addEventListener("mouseover", (e) => handleDpadPress(directions.left));
document.querySelector(".dpad-up").addEventListener("mouseover", (e) => handleDpadPress(directions.up));
document.querySelector(".dpad-right").addEventListener("mouseover", (e) => handleDpadPress(directions.right));
document.querySelector(".dpad-down").addEventListener("mouseover", (e) => handleDpadPress(directions.down));