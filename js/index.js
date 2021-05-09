const divs = document.getElementsByClassName("arrow");

const colors = ["red", "green", "blue", "cyan"];
let keyPressCounter = 0;

function coloringLogic(boxNumber) {
    currentColor = keyPressCounter % 4;
    divs[boxNumber].style.background = colors[currentColor];
    keyPressCounter += 1;
}

$(document).keydown((e) => {
    if (e.key == "ArrowLeft") {
        alert(e.key);
        coloringLogic(0);
        return false;
    } else if (e.key == "ArrowUp") {
        alert(e.key);
        coloringLogic(1);
        return false;
    } else if (e.key == "ArrowRight") {
        alert(e.key);
        coloringLogic(2);
        return false;
    } else if (e.key == "ArrowDown") {
        alert(e.key);
        coloringLogic(3);
        return false;
    }
});
