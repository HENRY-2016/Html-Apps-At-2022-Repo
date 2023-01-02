

function OpenDropDown() 
    {
        var x = document.getElementById("demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }

// ==================================== what we do page 

// disabling key board keys .........................
// To disable right click
window.oncontextmenu = function () {return false;}

$(document).keydown(function (event) 
{
    if (event.keyCode == 83) {return false;} // s
    else if (event.keyCode == 85) {return false;} // u
    else if (event.keyCode == 162) {return false;} // left Ctrl
    else if (event.keyCode == 163) {return false;} // right Ctrl
});




// 8 - Backspace
// 9 - Tab
// 12 - 5 in the numeric keypad when Num Lock is off
// 13 - Enter
// 16 - Shift
// 17 - Ctrl
// 18 - Alt
// 19 - Pause/Break
// 20 - Caps Lock
// 27 - Esc
// 32 - Space
// 33 - Page Up
// 34 - Page Down
// 35 - End
// 36 - Home
// 37 - Left arrow
// 38 - Up arrow
// 39 - Right arrow
// 40 - Down arrow
// 44 - Print Screen
// 45 - Insert
// 46 - Delete

// 48 - 0
// 49 - 1
// 50 - 2
// 51 - 3
// 52 - 4
// 53 - 5
// 54 - 6
// 55 - 7
// 56 - 8
// 57 - 9

// 65 - A
// 66 - B
// 67 - C
// 68 - D
// 69 - E
// 70 - F
// 71 - G
// 72 - H
// 73 - I
// 74 - J
// 75 - K
// 76 - L
// 77 - M
// 78 - N
// 79 - O
// 80 - P
// 81 - Q
// 82 - R
// 83 - S
// 84 - T
// 85 - U
// 86 - V
// 87 - W
// 88 - X
// 89 - Y
// 90 - Z

// 91 - left Win
// 92 - right Win
// 93 - Popup

// 96 - 0 in the numeric keypad
// 97 - 1 in the numeric keypad
// 98 - 2 in the numeric keypad
// 99 - 3 in the numeric keypad
// 100 - 4 in the numeric keypad
// 101 - 5 in the numeric keypad
// 102 - 6 in the numeric keypad
// 103 - 7 in the numeric keypad
// 104 - 8 in the numeric keypad
// 105 - 9 in the numeric keypad
// 106 - * in the numeric keypad
// 107 - + in the numeric keypad
// 109 - - in the numeric keypad
// 110 - . in the numeric keypad
// 111 - / in the numeric keypad

// 112 - F1
// 113 - F2
// 114 - F3
// 115 - F4
// 116 - F5
// 117 - F6
// 118 - F7
// 119 - F8
// 120 - F9
// 121 - F10
// 122 - F11
// 123 - F12

// 144 - Num Lock
// 145 - Scroll Lock
// 160 - left Shift
// 161 - right Shift
// 162 - left Ctrl
// 163 - right Ctrl











